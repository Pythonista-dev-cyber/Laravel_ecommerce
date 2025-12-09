
@extends('layouts.backend-master')

@section('contents')

<div class="container px-4">
    <a href="{{ route('orders.index') }}" class="btn btn-primary"><i class="fa fa-home"></i> Home </a>

</div>
<div class="container px-1 px-md-4 py-1 mx-auto">
    <div class="card">
        <div class="row d-flex justify-content-between px-3 top">
            <div class="d-flex">
                <h5>ORDER <span class="text-primary font-weight-bold">{{ $order->order_no }}</span></h5>
            </div>
            <div class="d-flex flex-column text-sm-right">
                <p class="mb-0">Expected Arrival <span>01/12/19</span></p>
                <p>USPS <span class="font-weight-bold">234094567242423422898</span></p>
            </div>
        </div>
        <!-- Add class 'active' to progress -->
        @if($order->order_status=='order_confirmed')
        <div class="row d-flex justify-content-center">
            <div class="col-12">
            <ul id="progressbar" class="text-center">
                <li class="active step0"></li>
                <li class="step0"></li>
                <li class="step0"></li>
                <li class="step0"></li>
            </ul>
            </div>
        </div>
        @elseif($order->order_status=='order_shipped')

        <div class="row d-flex justify-content-center">
            <div class="col-12">
            <ul id="progressbar" class="text-center">
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="step0"></li>
                <li class="step0"></li>
            </ul>
            </div>
        </div>

        @elseif($order->order_status=='on_the_way')

        <div class="row d-flex justify-content-center">
            <div class="col-12">
            <ul id="progressbar" class="text-center">
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="step0"></li>
            </ul>
            </div>
        </div>

        @elseif($order->order_status=='order_arrived')

        <div class="row d-flex justify-content-center">
            <div class="col-12">
            <ul id="progressbar" class="text-center">
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="active step0"></li>
                <li class="active step0"></li>
            </ul>
            </div>
        </div>

        @else

         <div class="row d-flex justify-content-center">
            <div class="col-12">
            <ul id="progressbar" class="text-center">
                <li class="step0 "></li>
                <li class="step0 "></li>
                <li class="step0 "></li>
                <li class="step0 "></li>
            </ul>
            </div>
        </div>




        @endif


        <div class="d-flex flex-row justify-content-between top">
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/9nnc9Et.png" style="width:80px;">
                <div class="d-flex flex-column">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal1"><p class="font-weight-bold">Order<br>Confirmed</p> </a>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/u1AzR7w.png" style="width:80px;">
                <div class="d-flex flex-column">
                    <a href="#" data-bs-toggle="modal" data-bs-target="#myModal2"><p class="font-weight-bold">Order<br>Shipped</p></a>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/TkPm63y.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>En Route</p>
                </div>
            </div>
            <div class="row d-flex icon-content">
                <img class="icon" src="https://i.imgur.com/HdsziHP.png">
                <div class="d-flex flex-column">
                    <p class="font-weight-bold">Order<br>Arrived</p>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- The Modal structure -->
<div class="modal fade" id="myModal1" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Order Confirm </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         Order Confirmed?
      </div>
      <div class="modal-footer">
        <form action="{{ route('ordertrack.update',$order->id) }}" method="get">
            <input type="hidden" name="order_status" value="order_confirmed">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary"> Yes </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end:order confirm -->

<!-- start: Order Shipped-->
<div class="modal fade" id="myModal2" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="myModalLabel">Order Shipped </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
         Order Shipped?
      </div>
      <div class="modal-footer">
        <form action="{{ route('ordertrack.update',$order->id) }}" method="get">
            <input type="hidden" name="order_status" value="order_shipped">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
        <button type="submit" class="btn btn-primary"> Yes </button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- end:order shipped -->






@endsection
