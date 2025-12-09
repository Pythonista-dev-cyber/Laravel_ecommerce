@extends('layouts.backend-master')

@section('contents')


@if(Session::has('save'))
<script>
Swal.fire({
  position: "center",
  icon: "success",
  title: "Your work has been saved",
  showConfirmButton: false,
  timer: 1500
});

</script>
@endif


@if(Session::has('update'))
<script>
Swal.fire({
  position: "center",
  icon: "success",
  title: "Successfully updated...",
  showConfirmButton: false,
  timer: 1500
});

</script>

@endif


@if(Session::has('delete'))

<script>
Swal.fire({
  position: "center",
  icon: "success",
  title: "Successfully Deleted...",
  showConfirmButton: false,
  timer: 1500
});

</script>

@endif




<div class="container my-2 p-2">
   <div class="row">
    <div class="col">
        {{$orders->links()}}
    </div>
    <div class="col">
        <form action="{{route('orders.search')}}" method="get">
            <input type="text" name="search_term" style="width:200px;" placeholder="search by name or category">
            <button class="btn btn-primary" type="submit"><i class="fa fa-search"></i> Search </button>
        </form>
    </div>
   </div>
</div>

<div class="container my-2">
    <table class="table table-striped">
        <tr>
            <td> ID </td>
            <td> Order No </td>
            <td> Order Date </td>
            <td> Order Items </td>
            <td> Total Amount </td>
            <td> Actions </td>
        </tr>

        @foreach($orders as $order)
        <tr>
            <td>{{$order->id}} </td>
            <td> {{$order->order_no}}</td>
            <td>{{$order->order_date}}</td>
            <td>{{$order->order_items}}</td>
            <td>{{$order->grand_total}} </td>
            <td class="d-flex justify-content-start gap-2">
                 <a href="{{route('orders.track',$order->id)}}" class="btn btn-primary"><i class="fa fa-map"></i> Order Track </a>
                <a href="{{route('orders.show',$order->id)}}" class="btn btn-primary"><i class="fa fa-eye"></i> Show </a>
                <form action="{{route('orders.destroy',$order->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete </button>
                </form>


            </td>
        </tr>
        @endforeach


    </table>
</div>


@endsection

