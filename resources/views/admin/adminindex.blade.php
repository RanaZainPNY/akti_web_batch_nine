@extends('admin.adminmaster')


@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col">
            <a href="{{route('admin-product-create')}}" class='btn btn-primary'>Add New Product</a>
        </div>
    </div>
    <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">View by page title and screen class</h5>
          <div class="table-responsive">
            <table class="table text-nowrap align-middle mb-0">
                <thead>
                    <tr class="border-2 border-bottom border-primary border-0">
                        <th scope="col" class="text-center">Id</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Brand</th>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">SKU</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Created At</th>
                        <th scope="col" class="text-center">Action</th>
                    </tr>
                </thead>
              <tbody class="table-group-divider">
                @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>
                        <div class='w-100 d-flex justify-content-center align-items-center'>
                            <img class='w-25'
                                src="{{ asset('uploads/products/' . $product->image) }}"
                                alt="prod-img">

                        </div>
                    </td>
                    <td>{{ $product->brand->name }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->sku }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <a href="{{ route('admin-products-edit', $product->id) }}"
                            class="btn btn-success btn-sm">Edit</a>
                        <a href="{{ route('admin-products-delete', $product->id) }}"
                            class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
            @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>


@endsection
