

@extends('layouts.backend-master')

@section('contents')




            <!-- Begin Li's Content Wraper Area -->
            <div class="content-wraper pt-60 pb-60">
                <div class="container">

                    <div class="row border-bottom">
                        <h1> Order Detail</h1>
                    </div>
                    <div class="row">
                        Order NO: {{$order['order_no']}}
                    </div>

                    <div class="row">
                        Order Date : {{$order['order_date']}}
                    </div>
                    <div class="row">
                        Order Items:
                    </div>

                            <!-- shop-products-wrapper start -->


                                                @php

                                                $order_items=explode("#", $order['order_items']);



                                                for($i=0;$i<count($order_items)-1;$i++){


                                                        $col=explode(",",$order_items[$i]);

                                                @endphp




                                                <div class="row">
                                                    <div class="col-lg-3 col-md-5 ">
                                                        <div class="product-image">
                                                            <a href="single-product.html">

                                                                <img src="{{asset('images')}}/{{$col[4]}}" alt="Item Image" style="width:100px;" class="img-fluid">
                                                            </a>

                                                        </div>
                                                    </div>
                                                    <div class="col-lg-9 col-md-7">
                                                        <div class="product_desc">
                                                            <div class="product_desc_info">
                                                                <div class="product-review">
                                                                    <h5 class="manufacturer">
                                                                        {{$col[0]}}
                                                                    </h5>
                                                                    <div class="rating-box">

                                                                    </div>
                                                                </div>
                                                                {{$col[1]}}
                                                                <div class="price-box">
                                                                    <span class="new-price">{{$col[2]}}</span>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>




                                        </div>


                                                @php

                                            }
                                                @endphp


                            <!-- shop-products-wrapper end -->

                            <div class="row">
                                <h3> Total: $ {{$order['grand_total']}} </h3>
                            </div>
                </div>
            </div>
            <!-- Content Wraper Area End Here -->

@endsection

