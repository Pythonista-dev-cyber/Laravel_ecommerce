<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class FrontendController extends Controller
{
    public function welcome(Request $request){

         $carts=$request->session('cart');

        $items=Item::all();
        return view('welcome',compact('items'));
    }
}
