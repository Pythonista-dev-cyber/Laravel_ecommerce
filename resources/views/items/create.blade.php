@extends('layouts.backend-master')

@section('contents')


<div class="container my-4">
    <a href="{{route('items.index')}}"><i class="fa fa-home"></i> Home </a> / Create New Item 
</div>

<div class="container my-4">
        <div class="col">
            <form action="{{route('items.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                
                <select name="category" class="form-control mb-3">
                    
                    @foreach($categories as $cat)
                        <option name="select"> {{ $cat->name }} </option>
                    @endforeach
                </select>
                <input type="text" name="name" placeholder="Coffee Latte" class="form-control mb-3">
                <input type="text" name="price" placeholder="4000" class="form-control mb-3">
                <input type="file" name="photo"  class="form-control mb-3">
              
                <button type="submit" name="submit"><i class="fa fa-save"></i> Save </button>
            </form>
        </div>
</div>
    
@endsection

