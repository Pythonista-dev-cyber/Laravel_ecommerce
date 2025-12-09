<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders=Order::paginate(10);
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function checkout(){
        return view('checkout');
    }

    public function checkoutsuccess(){

        return view('checkoutsuccess');
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs=$request->all();
        $payment_file_name1="";
        $payment_file_name2="";
        $payment_file_name3="";

        $payment_screenshot1=$request->file('payment_receipt1');

        if($payment_screenshot1){
            $payment_file_name1="receipt_".rand(100,999).".".$payment_screenshot1->extension();
            $payment_screenshot1->move(public_path('images'),$payment_file_name1);
        }


         $payment_screenshot2=$request->file('payment_receipt2');

        if($payment_screenshot2){
            $payment_file_name2="receipt_".rand(100,999).".".$payment_screenshot2->extension();
            $payment_screenshot2->move(public_path('images'),$payment_file_name2);
        }

        if($payment_file_name1=="" || $payment_file_name2==""){
                $inputs['payment_type']="cash";
                $inputs['payment_receipt']="none";
        }
        else if($payment_file_name1!="" && $payment_file_name2==""){
            $inputs['payment_type']="kpay";
             $inputs['payment_receipt']=$payment_file_name1;
        }
        else if($payment_file_name1=="" && $payment_file_name2!=""){
            $inputs['payment_type']="wavepay";
             $inputs['payment_receipt']=$payment_file_name2;
        }
        else{
            $inputs['payment_type']="none";
             $inputs['payment_receipt']="";
        }


        $order_date=date('d/m/Y');
        $order_no="order_no:".rand(1000,9999);

        $inputs['order_date']=$order_date;
        $inputs['order_no']=$order_no;
        $inputs['order_items']=$request->order_items;
        $inputs['grand_total']=$request->grand_total;
        $inputs['payment_status']="unpaid";
        $inputs['order_status']="none";



        Order::create($inputs);

        //session clear

        $carts=session()->get('cart');

        session()->forget('cart');



        return view('checkoutsuccess',compact('carts'))->with('payment_success','Checked out Successfully...');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order=Order::find($id);
        return view('orders.show',compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $order=Order::find($id);
        $order->delete();

        return redirect()->back()->with('delete','Delete Success');
    }


      public function search(Request $request){

        $str=$request->search_term;

        $orders=Order::where('order_no','LIKE','%'.$str.'%')
                    ->orWhere('order_date','LIKE','%'.$str.'%')
                    ->paginate(5);

        $orders->appends(['search_term'=>$str]);

        return view('orders.index',compact('orders'));


    }


    public function ordertracking($id){
        $order=Order::find($id);
        return view('orders.ordertracking',compact('order'));
    }

}
