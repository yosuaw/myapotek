<?php

namespace App\Http\Controllers;

use App\Category;
use PDOException;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('administrator-permission');

        $data = Category::all();
        $getTotalData = $data->count();

        return view("dashboard.category.index", compact("data","getTotalData"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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

        try
        {
            $validatedData = $request->validate([
                "name" => "required",
            ]);
            $validatedData['description'] = $request->get('description');

            $new = Category::create($validatedData);
            $result = $new->id ? "New category successfully added!" : "Failed adding new category!";
            $status = $new->id ? 200 : 400;

            return response()->json(array(
                'msg'=>$result,
                'status'=>$status,
                'id'=> $new->id,
            ),$status);
        }catch(PDOException $e){
            return response()->json(array(
                'msg'=>"Failed adding new category!",
                'status'=>400
            ),200);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {

    }

    /**{{  }}
     * Show the form for editing the specified resource.
     *
     * @param  \App\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $data)
    {

    }

    /**
     * Update the specified resource in storage.{{  }}
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
       //
    }

    public function saveData(Request $request)
    {
        $this->authorize('administrator-permission');

        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'nullable'
        ]);

        $updated = Category::where('id', $request->get('id'))
            ->update($validatedData);

        $result = $updated ? "Category successfuly updated!" : "Failed updating category!";
        $status = $updated ? 200 : 400;

        return response()->json(array(
            'msg'=>$result,
            'status'=>$status
        ),$status);
    }

    public function getEditForm(Request $request){
        $this->authorize('administrator-permission');

        $data = Category::find($request->get('id'));

        return view("dashboard.category.edit",compact("data"));
    }

    public function deleteData(Request $request) {
        $this->authorize('administrator-permission');

        try {
            $id = $request->get("id");
            $category=Category::find($id);
            $category->delete();
            return response()->json(array(
                'status'=>'oke',
                'msg'=>'Category data deleted'
            ),200);

        } catch(\PDOException $e) {
            return response()->json(array(
                'status'=>'error',
                'msg'=>'Category is not deleted. It may be used in medicine'
            ));
        }
    }

    public function deleted()
    {
        $this->authorize('administrator-permission');

        return view('dashboard.category.deleted', [
            'data' => Category::onlyTrashed()->get()
        ]);
    }

    public function restore($id)
    {
        $this->authorize('administrator-permission');

        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->route('categories.index')->with('status', 'Category data is restored');
    }
}
