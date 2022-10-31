@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">Edit supplier</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<!-- add form -->
<form action="{{ route('supplier.update',$supplier->id) }}" method="POST">
    @csrf
    @method('PUT')
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
            <div class="row">
                <div class="col-4">
                    <label class="form-label">supplier Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $supplier->name }}" required>
                </div>
                <div class="col-4">
                    <label class="form-label">Status</label>
                    <select name="status" id="" class="form-control">
                        @if($supplier->status == 'active')
                        <option value="active">Active</option>
                        <option value="inactive">Inactive</option>
                        @else
                        <option value="inactive">Inactive</option>
                        <option value="active">Active</option>
                        @endif
                    </select>
                </div>
            </div>
            <div class="my-3"></div>
            <div class="row">
                <div class="col-4">
                    <label class="form-label">Father name</label>
                    <input type="text" name="father_name" value="{{ $supplier->father_name }}" class="form-control" required>
                </div>
                <div class="col-4">
                    <label class="form-label">Mother name</label>
                    <input type="text" name="mother_name" value="{{ $supplier->mother_name }}" class="form-control" required>
                </div>
                <div class="col-4">
                    <label class="form-label">National ID(NID)</label>
                    <input type="number" name="NID" value="{{ $supplier->NID }}" class="form-control" required>
                </div>
            </div>
            <div class="my-3"></div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Contact</label>
                    <input type="number" name="contact" value="{{ $supplier->contact }}" class="form-control" required>
                </div>
                <div class="col-6">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ $supplier->email }}" class="form-control" required>
                </div>
            </div>
            <div class="my-3"></div>
            <div class="row">
                <div class="col-6">
                    <label class="form-label">Address</label>
                    <textarea class="form-control" name="address" cols="30" rows="4" required>{{ $supplier->address }}</textarea>
                </div>
                <div class="col-6">
                    <label class="form-label">Shipping Address</label>
                    <textarea class="form-control" name="shipping_address" cols="30" rows="4" required>{{ $supplier->shipping_address }}</textarea>
                </div>
            </div>
           
        </div>
    </div>
    <div class="modal-footer">
        <a href="{{ URL::previous() }}" class="btn btn-secondary" >Close</a>
        <button type="submit" class="btn btn-info">Update now</button>
    </div>
</form>
@endsection