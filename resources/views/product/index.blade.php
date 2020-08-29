@extends('layouts.app')
@section('content')
<h1 class="text-center"><strong>Artists Lists</strong></h1>
<a href="/product/create" class="btn btn-info" class="form-control">Add New Product</a>
<a href="/category" class="btn btn-success" class="form-control">Add New Category</a>
<table class="table mt-5">
            <thead class="thead-dark">
              <tr>
                <th>No</th>
      <th>Name</th>
      <th>Logo</th>
      <th>Category_id</th>
      <th colspan="2">Action</th>
              </tr>
            </thead>
            <tbody>
              @php $i=1;
              @endphp
              @foreach($organizers as $organizer)
              <tr>
                <td>{{$i}}</td>
      <td>{{$organizer->name}}</td>
      <td><img src="{{asset($organizer->image)}}" width="50px" height="50px"></td>
      <td>{{$organizer->category->name}}</td>

                <td>
                  <p class="d-inline">
                  <a href="{{route('product.edit',$organizer->id)}}" class="edit btn btn-warning">Edit</a>
                  <form action="{{route('product.destroy',$organizer->id)}}" method="post" style="display: inline;">
                  @method('DELETE')
                  @csrf
                  <input type="submit" name="btnsubmit" value="Delete" class="btn btn-danger" onclick="return confirm('Are You Sure?');">
                </form>
                  </p>
                </td>



               @php $i++;
              @endphp
              </tr>
              @endforeach
            </tbody>
          </table>

@endsection
