<?php

namespace App\Http\Controllers;

use App\Category;
use App\Medicine;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use PDOException;

class MedicineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('administrator-permission');
        $data = Medicine::all();
        $category = Category::all();
        $catWithThrased = Category::withTrashed()->get();

        return view("dashboard.medicine.index", compact("data","category","catWithThrased"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('administrator-permission');

        $category = Category::all();

        return view("dashboard.medicine.create", compact("category"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('administrator-permission');
        try {
            $validatedData = $request->validate([
                "generic_name" => "required",
                "form" => "required",
                "restriction_formula" => "nullable",
                "price" => "required|numeric|gte:0",
                "image" => "nullable|image",
                "description" => "nullable",
            ]);

            $imgFile = "";

            if($request->file('image')) {
                $file = $request->file('image');
                $imgFolder = 'img/medicine-images';
                $imgFile = time().'_'.$file->getClientOriginalName();
                $file->move($imgFolder, $imgFile);

                $validatedData['image'] = $imgFile;
            }

            $medicine = Medicine::create($validatedData + [
                'category_id' => $request->get('category'),
                'faskes1' => $request->get('faskes1')? true : false,
                'faskes2' => $request->get('faskes2')? true : false,
                'faskes3' => $request->get('faskes3')? true : false,
            ]);

            return response()->json(array(
                'status'=>200,
                'msg'=>'New medicine successfully added!',
                'id'=> $medicine->id,
                'image'=>$imgFile,
                'category'=> $medicine->category->name
            ),200);
        }catch(PDOException $e){
            return response()->json(array(
                'e' => $e->getMessage(),
                'msg'=>"Failed adding new medicine!",
                'status'=>400
            ),200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        $this->authorize('administrator-permission');

        $data = $medicine;
        return view("dashboard.medicine.show", compact("data"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    public function saveData(Request $request)
    {
        $this->authorize('administrator-permission');
        try {
            $validatedData = $request->validate([
                "generic_name" => "required",
                "form" => "required",
                "restriction_formula" => "nullable",
                "price" => "required|numeric|gte:0",
                "category_id" => "required",
                "description" => "nullable",
            ]);

            $updated = Medicine::where('id', $request->get('id'))
            ->update($validatedData + [
                'faskes1' => $request->get('faskes1')? true : false,
                'faskes2' => $request->get('faskes2')? true : false,
                'faskes3' => $request->get('faskes3')? true : false,
            ]);

            $result = $updated ? "Medicine successfully updated!" : "Failed updating medicine!";
            $status = $updated ? 200 : 400;

            return response()->json(array(
                'status'=>$status,
                'msg'=>$result
            ),200);
        }catch(PDOException $e){
            return response()->json(array(
                'e' => $e->getMessage(),
                'msg'=>"Failed updating medicine!",
                'status'=> 400
            ),200);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Medicine  $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }

    public function getEditForm(Request $request){
        $this->authorize('administrator-permission');

        $id = $request -> get('id');

        $data = Medicine::find($id);
        $category = Category::all();

        return response()->json(array(
            'msg' => view('dashboard.medicine.edit', compact('data', 'category'))->render()
        ), 200);
    }

    public function deleteData(Request $request) {
        $this->authorize('administrator-permission');

        try {
            $medicine = Medicine::find($request->get('id'));
            $image = $medicine->image;
            $medicine->delete();

            if($image) {
                $path = 'img/medicine-images/' . $image;
                File::delete($path);
            }

            return response()->json(array(
                'status'=>'oke',
                'msg'=>'Data deleted successfully!'
            ),200);
        } catch(\Exception $e) {
            return response()->json(array(
                'status'=>'error',
                'msg'=>"Can't delete medicine. Data Medicine maybe used in transaction data!"
            ),200);
        }
    }

    // public function deleted()
    // {
    //     $this->authorize('administrator-permission');

    //     return view('dashboard.medicine.deleted', [
    //         'data' => Medicine::onlyTrashed()->get(),
    //         'catWithThrased' => Category::withTrashed()->get()
    //     ]);
    // }

    // public function restore($id)
    // {
    //     $this->authorize('administrator-permission');

    //     Medicine::withTrashed()->where('id', $id)->restore();
    //     return redirect()->route('medicines.index')->with('status', 'Medicine data '.$id.' is restored');
    // }

    public function changeImage(Request $request)
    {
        $this->authorize('administrator-permission');

        try
        {
            $validatedData = $request->validate([
                "image" => "required|image"
            ]);

            if($request->oldImage) {
                $path = 'img/medicine-images/' . $request->oldImage;
                File::delete($path);
            }
            $file = $request->file('image');
            $imgFolder = 'img/medicine-images';
            $imgFile = time().'_'.$file->getClientOriginalName();
            $file->move($imgFolder, $imgFile);
            $validatedData['image'] = $imgFile;

            $updated = Medicine::where('id', $request->get('id'))->update($validatedData);

            $result = $updated ? "Medicine image is changed!" : "Medicine image is failed change!";
            $status = $updated ? 200 : 400;

            return response()->json(array(
                'status'=>$status,
                'msg'=>$result,
                'image'=>$imgFile
            ),200);
        }catch(PDOException $e){
            return response()->json(array(
                'e' => $e->getMessage(),
                'msg'=>"Failed updating medicine!",
                'status'=> 400
            ),200);
        }
    }

    public function catalog() {
        $data = Medicine::paginate(6);
        return view('customer.catalog', compact('data'));
    }

    public function catalogDetail($id) {
        $data = Medicine::find($id);
        return view('customer.catalogDetail', compact('data'));
    }

    public function addToCart($id) {
        $this->authorize('customer-permission');

        $med = Medicine::find($id);
        $cart = session()->get('cart');

        if(!isset($cart[$id])) {
            $cart[$id]=[
            "name" => $med->generic_name,
            "quantity" => 1,
            "price" => $med->price,
            "photo" => $med->image
            ];
        } else {
            $cart[$id]['quantity']++;
        }
        session()->put('cart', $cart);

        return redirect()->route('catalogs')->with('status', 'Medicine added to cart successfully!');
    }

    public function removeFromCart(Request $request) {
        $this->authorize('customer-permission');

        $cart = session()->get('cart');

        if(isset($cart[$request->get('id')])) {
            session()->forget('cart.' . $request->get('id'));
        } else {
            return response()->json(array(
                'status'=>400,
                'msg' => "Failed to remove medicine from cart!"
            ), 200);
        }

        return response()->json(array(
            'status'=>200,
            'msg' => "Medicine removed from cart successfully!"
        ), 200);
    }

    public function cart() {
        $this->authorize('customer-permission');

        return view('customer.cart');
    }
}
