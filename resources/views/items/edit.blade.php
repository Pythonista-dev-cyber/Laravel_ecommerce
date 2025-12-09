@extends('layouts.backend-master')

@section('contents')


<div class="container my-4">
    <a href="{{route('items.index')}}"><i class="fa fa-home"></i> Home </a> /Edit Item 
</div>

<div class="container my-4">
        <div class="row">
             
        <div class="col">
            <form action="{{route('items.update',$item->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                
                <label> Current Category </lable>
                <input type="curr_category" value="{{$item->category}}" class="form-control mb-3">

                <label>New Category</lable>

                <select name="new_category" class="form-control mb-3">
                    
                    @foreach($categories as $cat)
                        <option name="select"> {{ $cat->name }} </option>
                    @endforeach
                </select>
                <input type="text" name="name" value="{{$item->name}}" class="form-control mb-3">
                <input type="text" name="price" value="{{$item->price}}" class="form-control mb-3">
                <label class="form-control mb-3">Current Photo </label>
                <input type="hidden" name="curr_photo" value="{{$item->photo}}">
                <ul>
                    <li><img src="{{asset('images')}}/{{$item->photo}}" style="width:50px;" class="img-fluid"> </li>
                </ul>
                <input type="file" name="new_photo"  class="form-control mb-3">
              
                <button type="submit" name="submit"><i class="fa fa-save"></i> Update </button>
            </form>
        </div>
        <div class="col"></div>
</div>
</div>
    
@endsection 
