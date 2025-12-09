@extends('layouts.frontend-master')
@section('contents')


                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container"> 
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
            </header>
            <!-- Header Area End Here -->
            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Shopping Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->
            <!--Shopping Cart Area Strat-->
            <div class="Shopping-cart-area pt-60 pb-60">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form action="#">
                                <div class="table-content table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="li-product-remove">remove</th>
                                                <th class="li-product-thumbnail">images</th>
                                                <th class="cart-product-name">Product</th>
                                                <th class="li-product-price">Unit Price</th>
                                                <th class="li-product-quantity">Quantity</th>
                                                <th class="li-product-subtotal">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @php 

                                            $subtotal=0;
                                            $grandtotal=0;

                                        @endphp


                                        @if(count(Session::get('cart'))>0)

                                            @foreach(Session::get('cart') as $id=>$cart)

                                            @php 
                                            $subtotal=$cart['price'] * $cart['qty'];
                                            $grandtotal=$grandtotal+$subtotal;

                                            @endphp 
                                            <tr>
                                                <td class="li-product-remove"><a href="{{route('cart.remove',$id)}}"><i class="fa fa-times"></i></a></td>
                                                <td class="li-product-thumbnail"><a href="#"><img src="{{asset('images')}}/{{$cart['photo']}}" style="width:60px;" alt="Li's Product Image"></a></td>
                                                <td class="li-product-name"><a href="#">{{$cart['name']}}</a></td>
                                                <td class="li-product-price"><span class="amount">$ {{$cart['price']}} </span></td>
                                                <td class="d-flex justify-content-center gap-2">
                                                   
                                                    <div class="d-flex justify-content-center gap-2" style="width:50px;">
                                                        <a href="{{route('cart.decrease',$id)}}" class="btn btn-danger"><i class="fa fa-angle-down"></i></a> 
                                                        <input  style="width:50px;" value="{{$cart['qty']}}" type="text">
                                                        
                                                       <a href="{{route('cart.increase',$id)}}" class="btn btn-primary"><i class="fa fa-angle-up"></i></a> 
                                                    </div>
                                                </td>
                                                <td class="product-subtotal"><span class="amount">$ {{$cart['price'] * $cart['qty']}}  </span></td>
                                            </tr>
                                            @endforeach

                                      @else 


                                        <tr>
                                            <th colspan="6"> <h1> Sorry..Cart is Empty </h1> </th>  
                                        </tr>

                                      @endif 
                                           
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="coupon-all">
                                            <div class="coupon">
                                                <input id="coupon_code" class="input-text" name="coupon_code" value="" placeholder="Coupon code" type="text">
                                                <input class="button" name="apply_coupon" value="Apply coupon" type="submit">
                                            </div>
                                            <div class="coupon2">
                                                <input class="button" name="update_cart" value="Update cart" type="submit">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5 ml-auto">
                                        <div class="cart-page-total">
                                            <h2>Cart totals</h2>
                                            <ul>
                                                <li>Grand Total <span>$ {{$grandtotal}} </span></li>
                                                
                                            </ul>
                                            <a href="{{route('checkout.open')}}">Proceed to checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!--Shopping Cart Area End-->

           
@endsection