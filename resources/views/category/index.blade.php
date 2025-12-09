@extends('layouts.backend-master')

@section('contents')


<div class="container my-2">
    <a href="{{route('category.create')}}" class="btn btn-primary"> <i class="fa fa-plus"></i> Create New </a>

</div>

<div class="container my-2">
    <table class="table table-striped">
        <tr>
            <td> ID </td>
            <td> Name </td>
            <td> Actions </td>
        </tr>

        @foreach($categories as $category)
        <tr>
            <td>{{$category->id}} </td>
            <td>{{$category->name}}</td>
            <td class="d-flex justify-content-start gap-2">
                <a href="{{route('category.edit',$category->id)}}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit </a>
                <form action="{{route('category.destroy',$category->id)}}" method="POST">
                    @csrf 
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit"><i class="fa fa-trash"></i> Delete</button>
                </form>

                
            </td>
        </tr>
        @endforeach 


    </table>
</div>


@endsection 