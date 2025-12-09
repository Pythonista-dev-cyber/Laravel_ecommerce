
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

                <form action="{{route('checkout.store')}}" method="post" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-12">
                            <div class="coupon-accordion">
                                <!--Accordion Start-->
                                <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                                <div id="checkout-login" class="coupon-content">
                                    <div class="coupon-info">
                                        <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>

                                            <p class="form-row-first">
                                                <label>Username or email <span class="required">*</span></label>
                                                <input type="text">
                                            </p>
                                            <p class="form-row-last">
                                                <label>Password  <span class="required">*</span></label>
                                                <input type="text">
                                            </p>
                                            <p class="form-row">
                                                <input value="Login" type="submit">
                                                <label>
                                                    <input type="checkbox">
                                                     Remember me
                                                </label>
                                            </p>
                                            <p class="lost-password"><a href="#">Lost your password?</a></p>

                                    </div>
                                </div>
                                <!--Accordion End-->
                                <!--Accordion Start-->
                                <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                                <div id="checkout_coupon" class="coupon-checkout-content">
                                    <div class="coupon-info">

                                            <p class="checkout-coupon">
                                                <input placeholder="Coupon code" type="text">
                                                <input value="Apply Coupon" type="submit">
                                            </p>

                                    </div>
                                </div>
                                <!--Accordion End-->
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-12">

                                <div class="checkbox-form">
                                    <h3>Billing Details</h3>
                                    <div class="row">


                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label> Customer Name <span class="required">*</span></label>
                                                <input name="customer_name" placeholder="" type="text">
                                            </div>
                                        </div>
                                         <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Email Address <span class="required">*</span></label>
                                                <input name="customer_email" placeholder="" type="email">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkout-form-list">
                                                <label>Phone  <span class="required">*</span></label>
                                                <input name="customer_phone" type="text">
                                            </div>
                                        </div>


                                        <div class="col-md-12">
                                            <div class="checkout-form-list">
                                                <label>Shipping Address <span class="required">*</span></label>
                                                <input name="shipping_address" placeholder="Street address" type="text">
                                            </div>
                                        </div>



                                    </div>

                                </div>

                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th class="cart-product-name">Product</th>
                                                <th class="cart-product-total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        @php

                                            $sub=0;
                                            $grand=0;
                                            $order_items="";

                                        @endphp

                                        @foreach(Session::get('cart') as $id=>$cart)

                                        @php

                                        $sub=$cart['price'] * $cart['qty'];
                                        $grand=$grand+$sub;

                                        $order_items.= $cart['category'].",".$cart['name'].",".$cart['price'].",".$cart['qty'].",".$cart['photo'].",".$sub."#";

                                        @endphp


                                            <tr class="cart_item">
                                              <td class="cart-product-name"> {{$cart['name']}} <strong class="product-quantity"> ×  {{$cart['qty']}} </strong></td>
                                              <td class="cart-product-total"><span class="amount">£ {{$cart['price'] * $cart['qty']}} </span></td>
                                            </tr>
                                        @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr class="cart-subtotal">
                                                <th>Cart Subtotal</th>
                                                <td><span class="amount">$ {{$grand}}</span></td>
                                            </tr>
                                            <tr class="order-total">
                                                <th>Order Total</th>
                                                <td><strong><span class="amount">$ {{$grand}} </span></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment-method">
                                    <div class="payment-accordion">
                                        <div id="accordion">
                                          <div class="card">
                                            <div class="card-header" id="#payment-1">
                                              <h5 class="panel-title">
                                                <a class="" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                  KPay
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseOne" class="collapse show" data-parent="#accordion">
                                              <div class="card-body">
                                                <p>QR Scan</p>
                                                <br>
                                                <img src="{{asset('images/qr.png')}}" style="width:50px;"><br><br>
                                                <input type="file" name="payment_receipt1" class="form-control mb-3">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-2">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                  Wave Pay
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseTwo" class="collapse" data-parent="#accordion">
                                              <div class="card-body">
                                               <p>QR Scan</p><br>
                                                <img src="{{asset('images/qr.png')}}" style="width:50px;"> <br><br>
                                                <input type="file" name="payment_receipt2" class="form-control mb-3">
                                              </div>
                                            </div>
                                          </div>
                                          <div class="card">
                                            <div class="card-header" id="#payment-3">
                                              <h5 class="panel-title">
                                                <a class="collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                  Cash on Delivery
                                                </a>
                                              </h5>
                                            </div>
                                            <div id="collapseThree" class="collapse" data-parent="#accordion">
                                              <div class="card-body">

                                                <h1> Cash on Deli </h1>
                                                 <input type="text" name="payment_receipt3" value="cash" class="form-control mb-3">
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="order-button-payment">
                                            <input type="hidden" name="order_items" value="{{$order_items}}">
                                            <input type="hidden" name="grand_total" value="{{$grand}}">
                                            <input value="Place order" type="submit">
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                     </form>
                </div>
            </div>
            <!--Checkout Area End-->

@endsection
