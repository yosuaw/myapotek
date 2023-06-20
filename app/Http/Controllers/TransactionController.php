<?php

namespace App\Http\Controllers;

use App\User;
use App\Medicine;
use App\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('administrator-permission');

        return view('dashboard.transaction.index', [
            'data' => Transaction::all()
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $this->authorize('customer-permission');

        return view('transaction.historyTransaction', [
            'data' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function showDetail(Request $request) {
        $this->authorize('administrator-permission');

        $id = $request->get('id');
        $data = Transaction::find($id);
        $medicines = $data->medicines;

        return response()->json(array(
            'msg' => view('dashboard.transaction.showDetailModal', compact('data', 'medicines'))->render()
        ), 200);
    }

    public function topFiveBestSeller(){
        $this->authorize('administrator-permission');

        $data = Medicine::select("medicines.id","generic_name","form","price","name as category_name","sold")
        ->join('categories', 'categories.id', '=', 'category_id')
        ->joinSub(
            DB::table("medicine_transaction")->select("medicine_id", DB::raw("SUM(quantity) AS sold"))
        ->groupBy('medicine_id'),"med_trans", function($join){
            $join->on("med_trans.medicine_id","=","medicines.id");
        })->orderBy('sold','desc')->take(5)->get();

        return view('dashboard.report.topFiveBestSeller', compact("data"));
    }

    public function topThreeCustomer(){
        $this->authorize('administrator-permission');

        $data = User::select("users.id","name","email","spent")
        ->joinSub(
            DB::table("transactions")->select("user_id", DB::raw("SUM(grandtotal) AS spent"))
        ->groupBy('user_id'),"trans", function($join){
            $join->on("trans.user_id","=","users.id");
        })->orderBy('spent','desc')->take(3)->get();

        return view('dashboard.report.topThreeCustomer', compact("data"));
    }

    public function insertMedicine($cart, $transaction) {
        $this->authorize('customer-permission');

        $total = 0;
        foreach($cart as $id => $detail) {
            $total += $detail['price'] * $detail['quantity'];
            $transaction->medicines()->attach($id, ['quantity' => $detail['quantity'], 'subtotal' => $detail['price'] * $detail['quantity']]);
        }

        return $total;
    }

    public function checkout() {
        $this->authorize('customer-permission');

        $cart = session()->get('cart');

        if(!isset($cart)) {
            return redirect()->back()->with('status', 'Cart is empty!');
        }
        $user = Auth::user();
        $t = new Transaction;
        $t->user_id = $user->id;
        $t->transaction_date = Carbon::now()->toDateTimeString();
        $t->save();
        $trans = Transaction::find($t->id);

        $totalPrice = $this->insertMedicine($cart, $trans);
        $t->grandtotal = $totalPrice;
        $t->save();

        return redirect('thankyou');
    }

    public function historyTransaction() {
        $this->authorize('customer-permission');

        $user = Auth::user();
        $data = Transaction::where('user_id', $user->id)->get();

        return view('customer.historyTransaction', compact('data'));
    }

    public function showDetailTransactionUser(Request $request) {
        $this->authorize('customer-permission');

        $id = $request->get('id');
        $data = Transaction::find($id);
        $medicines = $data->medicines;

        return response()->json(array(
            'msg' => view('customer.showDetailTransaction', compact('data', 'medicines'))->render()
        ), 200);
    }
}
