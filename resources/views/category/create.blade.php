@extends('layouts.backend-master')

@section('contents')


<div class="container my-4">
    <a href="{{route('category.index')}}"><i class="fa fa-home"></i> Home </a> / Create New Category 
</div>

<div class="container my-4">
    <div class="row">
        <div class="col text-center p-5">
            <i class="fa fa-list" style="font-size:100px;"></i>
        </div>
        <div class="col">
            <form action="{{route('category.store')}}" method="post">
                @csrf
                <label> Category Name </label>
                <input type="text" name="name" placeholder="Coffee" class="form-control mb-3">
                <button type="submit" name="submit"><i class="fa fa-save"></i> Save </button>
            </form>
        </div>
    </div>
</div>
    
@endsection 
