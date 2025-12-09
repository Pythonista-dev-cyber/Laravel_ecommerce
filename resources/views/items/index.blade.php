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



<div class="container my-2">
    <a href="{{route('items.create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> Create New </a>

</div>

<div class="container my-2 p-2">
   <div class="row">
    <div class="col">
        {{$items->links()}}
    </div>
    <div class="col">
        <form action="{{route('items.search')}}" method="get">
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
            <td> Category </td>
            <td> Name </td>
            <td> Price </td>
            <td> Photo </td>
            <td> Actions </td>
        </tr>

        @foreach($items as $item)
        <tr>
            <td>{{$item->id}} </td>
            <td> {{$item->category}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->price}}</td>
            <td><img src="{{asset('images')}}/{{$item->photo}}" style="width:60px;" class="img-thumnail"> </td>
            <td class="d-flex justify-content-start gap-2">
                <a href="{{route('items.edit',$item->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a>
                <form action="{{route('items.destroy',$item->id)}}" method="post">
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

