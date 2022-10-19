@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">All product</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#product">Create New product</button>
        <!-- Modal -->
        <div class="modal fade" id="product" tabindex="-1" aria-labelledby="productLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="productLabel">Create New product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="{{ route('admin.store.product') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="message">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>

                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <label class="form-label">Sub-Category Name</label>
                                    <select name="sub_category_id" class="form-control">
                                        <option value="">-- SELECT --</option>
                                        @foreach ($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">image</label>
                                    <input type="file" accept="image/*"  class="form-control" name="image" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">price</label>
                                    <input type="text" class="form-control" name="price" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">offer</label>
                                    <input type="text" class="form-control" name="offer" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label">description</label>
                                    <textarea class="form-control" name="description" cols="30" rows="4" required></textarea>
                                </div>

                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- table -->
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>SN</th>
                    <th>Name</th>
                    <th>image</th>
                    <th>price</th>
                    <th>offer</th>
                    <th>description</th>

                    <th>Action</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($products as $key=>$product)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $product->name }}</td>
                    <td><img src=" {{ asset('/uploads/products/'.$product->image) }}" alt="" style="height:80px;width:80px;"></td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->offer }}</td>
                    <td>{{ $product->description }}</td>

                    <td>
                        <a class="btn btn-primary" href="{{ route('admin.view.product', $product->id) }}" style="font-size:13px"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <a class="btn btn-success" href="{{ route('admin.edit.product', $product->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('admin.delete.product', $product->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No product available</p>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection