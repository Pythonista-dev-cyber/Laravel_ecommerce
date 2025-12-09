<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;


class OrdertrackingController extends Controller
{
    public function update(Request $request,$id){

        //dd('calling from Order tracking controller...');

        $order_status=$request->order_status;

        $order=Order::find($id);

        $order->order_status=$order_status;
        $order->save();

        return redirect()->back()->with('update','Successfully updated...');
    }
}
