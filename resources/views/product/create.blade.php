@extends('layouts.app')

@section('content')

<form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
  <h1>Artists Lists</h1>
  @csrf
  <div class="form-group">
        <label>Name</label>
        <input type="text" name="oname" class="form-control">
      </div>
      <div class="form-group">
        <label>Logo</label>
        <input type="file" name="image">
      </div>
      <div class="form-group">
            <label>Category</label>
            <select class="form-control" name="category">
              <option>Choose Category</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}
                </option>
                @endforeach
            </select>
          </div>

      <div class="form-group">
        <input type="submit" name="submit" class="btn btn-success" value="save">
      </div>

</form>



@endsection
