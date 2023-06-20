<?php

namespace App\Http\Controllers;

use App\User;
use PDOException;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('administrator-permission');

        $data = User::where('role', 'customer')->get();

        return view("dashboard.user.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    public function saveData(Request $request)
    {
        $this->authorize('administrator-permission');

        try{
            $validatedData = $request->validate([
                'name' => 'required',
                'email' => 'required'
            ]);

            $updated = User::where('id', $request->get('id'))
                ->update($validatedData);

            $result = $updated ? "User successfuly updated!" : "Failed updating user!";
            $status = $updated ? 200 : 400;

            return response()->json(array(
                'msg'=>$result,
                'status'=>$status
            ),$status);
        }catch(PDOException $e){
            return response()->json(array(
                'e' => $e->getMessage(),
                'msg'=>"Failed updating user!",
                'status'=>400
            ),400);
        }
    }

    public function getEditForm(Request $request){
        $this->authorize('administrator-permission');

        $id = $request -> get('id');

        $data = User::find($id);

        return response()->json(array(
            'msg' => view('dashboard.user.edit', compact('data'))->render()
        ), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deleteData(Request $request) {
        $this->authorize('administrator-permission');

        try{
            $id = $request->get('id');
            $user = User::find($id);
            $user ->delete();
            return response()->json(array(
                'status'=>'oke',
                'msg' => "Data has been deleted successfully!"
            ), 200);
        }catch(\PDOException $e) {
            return response()->json(array(
                'status'=>'error',
                'msg' => "User can't be deleted. It may be used in the transaction!"
            ), 200);
        }
    }
}
