@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header"> Admin Dashboard  <span style="float:right"><a href="{{url('admin/product/create')}}" type="button" class="btn btn-primary btn-sm">Add Product</a><span></div>

        <div class="card-body">
          <form>
            <input type="text" name="search" class="form-control" placeholder="Search by name">

          </form>
          <table class="table">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Price</th>
                <th scope="col">Discount</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            @foreach ($products as $key => $item)
            <tbody>
              <tr>
                <th scope="row">{{$key +1}}</th>
                <td><img src="{{url('storage/'.$item->image)}}" width="60px"/></td>
                <td>{{$item->name}}</td>
                <td>{{$item->price}}</td>
                <td>{{$item->discount}}</td>
                <td><a href="{{url('admin/product/'.$item->id.'/edit')}}" class="btn btn-info btn-sm">Edit</a></td>
                <td>
                    <form id="logout-form" action="{{ route('product.delete', $item->id) }}" method="POST">
                        @csrf
                        <button class="btn btn-danger btn-sm">Delete</button>
                    </form>
                  
                </td>
              </tr>

            </tbody>
            @endforeach
          </table>
          {{ $products->links('admin.pagination') }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection