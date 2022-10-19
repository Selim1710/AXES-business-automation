@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">Edit warehouse</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<!-- add form -->
<form action="{{ route('inventory.warehouse.update',$warehouse->id) }}" method="POST">
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
                <input type="text" class="form-control" name="name" value="{{ $warehouse->name }}" required>
            </div>

            <div class="col-12">
                <label class="form-label">Email Address</label>
                <input type="email" class="form-control" name="email" value="{{ $warehouse->email }}" required>
            </div>

            <div class="col-12">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone" value="{{ $warehouse->phone }}" required>
            </div>

            <div class="col-12">
                <label class="form-label">Address</label>
                <textarea class="form-control" name="address" cols="30" rows="4" required>{{ $warehouse->address }}</textarea>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit now</button>
    </div>
</form>
@endsection