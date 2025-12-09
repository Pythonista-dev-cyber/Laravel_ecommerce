
@extends('layouts.frontend-master')
@section('contents')

            <!-- Begin Li's Breadcrumb Area -->
            <div class="breadcrumb-area">
                <div class="container">
                    <div class="breadcrumb-content">
                        <ul>
                            <li><a href="index.html">Home</a></li>
                            <li class="active">Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Li's Breadcrumb Area End Here -->

            <!--Checkout Area Strat-->
            <div class="checkout-area pt-60 pb-30">
                <div class="container">

                  <div class="row">
                    <h1> Checkout Success </h1>
                  </div>
                  <div class="row">
                    <h3> Ordered List </h3>
                    <table class="table table-striped">
                        <tr>
                        <td> Image </td>
                        <td> Name </td>
                        <td> Price </td>
                        <td> Qty </td>
                        <td> Subtotal </td>
                        </tr>

                        @if(isset($carts))

                        @php
                            $sub=0;
                            $grand=0;

                        @endphp
                        @foreach($carts as $id=>$cart)

                        @php

                        $sub=$cart['price'] * $cart['qty'];
                        $grand=$grand+$sub;

                        @endphp

                        <tr>
                            <td><img src="{{asset('images')}}/{{$cart['photo']}}" style="width:60px;" class="img-fluid"> </td>
                            <td>{{$cart['name']}}</td>
                            <td>{{$cart['price']}}</td>
                            <td>{{$cart['qty']}}</td>
                            <td>{{$cart['price'] * $cart['qty']}} </td>
                        </tr>

                        @endforeach

                        <tr>
                            <td colspan="4">Grand Total </td> <td> {{$grand}}</td>
                        </tr>

                        @else
                            <tr><td colspan="5"><h1> No item available </h1> </td></tr>
                        @endif
                    </table>
                  </div>
                </div>
            </div>
            <!--Checkout Area End-->

@endsection
