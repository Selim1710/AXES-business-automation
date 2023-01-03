@extends('layouts.app')
@section('content')
<div class="mb-4"></div>
<div class="row mb-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="text-center">
                    Update Service Sales
                </h3>
                <!-- message -->
                @if(session()->has('message'))
                <p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
                @elseif(session()->has('error'))
                <p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-center">
    <div class="card" style="width: 500px">
        <div class="card-body">
            <div class="border p-3 rounded">
                <form action="{{ route ('service-sales-update',$salestores->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="col-12">
                        <label class="form-label"><b>Date</b> </label>
                        <input type="date" class="form-control" name="date" value="{{$salestores->date}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Customer</b> </label>
                        <input type="text" class="form-control" name="customer" value="{{$salestores->customer}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Invoice</b> </label>
                        <input type="text" class="form-control" name="invoice" value="{{$salestores->invoice}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Phone</b> </label>
                        <input type="text" class="form-control" name="phone" value="{{$salestores->phone}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Product</b> </label>
                        <input type="text" class="form-control" name="product" value="{{$salestores->product}}">
                    </div>
                    <div class="col-12">
                        <label class="form-label"><b>Description</b> </label>
                        <textarea class="form-control" maxlength="250" rows="6" name="description">value="{{$salestores->description}}"</textarea>
                    </div>

                    <div class="col-12">
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection