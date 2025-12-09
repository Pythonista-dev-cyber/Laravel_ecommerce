<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;


class CartController extends Controller
{
    public function list(Request $request){

       $carts=$request->session('cart');

    

       return view('cartlist',compact('carts'));

    }

    public function add(Request $request,$id){


       $item = Item::find($id);

        if(!$item) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first item
        if(!$cart) {

            $cart = [
                    $id => [
                        "category"=>$item->category,
                        "name" => $item->name,
                        "qty" => 1,
                        "price" => $item->price,
                        "photo" => $item->photo
                    ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('add-cart', 'Item added to cart successfully!');

    }


    // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['qty']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('add-cart', 'Item added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "category"=>$item->category,
            "name" => $item->name,
            "qty" => 1,
            "price" => $item->price,
            "photo" => $item->photo
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('add-cart', 'Item added to cart successfully!');




    }


    public function increase(Request $request,$id){

        $cart=$request->session()->get('cart');

        $cart[$id]['qty']++;

        session()->put('cart', $cart);

        return redirect()->back()->with('cart-increase', 'Cart Qty updated successfully!');

    }


    
    public function decrease(Request $request,$id){

        $cart=$request->session()->get('cart');

        if($cart[$id]['qty']<=1){
            unset($cart[$id]);
        }
        else{
               $cart[$id]['qty']--;

        }

     

        session()->put('cart', $cart);

        return redirect()->back()->with('cart-decrease', 'Cart Qty updated successfully!');

    }


       
     public function remove(Request $request,$id){

        $cart=$request->session()->get('cart');

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()->back()->with('cart-remove', 'Cart Qty updated successfully!');

    }



}
