@extends('layouts.app')
@section('content')

<div class="container-fluid">
    <div class="card shadow mb-4">
    <div class="card-header">
        <h4 class="card-title">Edit Category</h4>

    </div>
    <div class="card-body">
        <form action="{{route('category.update',$categories->id)}}" method="post">
        <h1>Category Form</h1>
            @csrf
            @method('PATCH')
        <div class="form-group">
            <label>Name</label>
            <input type="text" name="cname" class="form-control" value="{{$categories->name}}">
        </div>
        <div class="form-group">
            <input type="submit" name="submit" class="btn btn-success" value="update">
        </div>

</form>
    </div>
    </div>

</div>


@endsection
