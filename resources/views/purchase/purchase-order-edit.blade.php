@extends('layouts.app')
@section('content')
    <div class="mb-4"></div>
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="text-center">
                        Update Service Received
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
                    <form action="{{ route ('purchase-order-update',$PurchaseOrderEdit->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="col-12">
                            <label class="form-label"><b>Product</b> </label>
                            <input type="text" class="form-control" name="product" value="{{$PurchaseOrderEdit->product}}">
                        </div>
                        <div class="col-12">
                            <label class="form-label"><b>Total</b> </label>
                            <input type="text" class="form-control" name="total" value="{{$PurchaseOrderEdit->total}}">
                        </div>
                        <div class="col-12">
                            <label class="form-label"><b>Note</b> </label>
                            <input type="text" class="form-control" name="note" value="{{$PurchaseOrderEdit->note}}">
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
