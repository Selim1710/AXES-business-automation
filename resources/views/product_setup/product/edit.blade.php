@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">Edit product</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<!-- add form -->
<form action="{{ route('admin.update.product',$product->id) }}" method="POST">
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
                <label class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $product->name }}" required>
            </div>

            <div class="col-12">
                <label class="form-label">price</label>
                <input type="text" class="form-control" name="price" value="{{ $product->price }}" required>
            </div>

            <div class="col-12">
                <label class="form-label">offer</label>
                <input type="text" class="form-control" name="offer" value="{{ $product->offer }}" required>
            </div>
            <div class="col-12">
                <label class="form-label">Warranty</label>
                <input type="text" class="form-control" name="warranty" value="{{ $product->warranty }}" required>
            </div>

            <div class="col-12">
                <label class="form-label">description</label>
                <textarea class="form-control" name="description" cols="30" rows="4" required>{{ $product->description }}</textarea>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-info">Update now</button>
    </div>
</form>
@endsection