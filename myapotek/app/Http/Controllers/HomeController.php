<?php

namespace App\Http\Controllers;

use App\Medicine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Medicine::select("medicines.id", "image", "generic_name","form","price","name as category_name","sold")
        ->join('categories', 'categories.id', '=', 'category_id')
        ->joinSub(
            DB::table("medicine_transaction")->select("medicine_id", DB::raw("SUM(quantity) AS sold"))
        ->groupBy('medicine_id'),"med_trans", function($join){
            $join->on("med_trans.medicine_id","=","medicines.id");
        })->orderBy('sold','desc')->take(5)->get();
        
        return view('customer.index', compact("data"));
        
    }

    public function thanks()
    {
        $this->authorize('customer-permission');
        
        if(session()->has('cart')) {
            session()->forget('cart');
            return view('customer.thankyou');
        } else {
            return redirect()->route('catalogs');
        }
    }
}
