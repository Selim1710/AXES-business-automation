@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">Edit Sales Invoice</h2>

<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<!-- end-message -->

<!-- add form -->
<form action="{{ route('admin.update.salesinvoice',$SalesInvoice->id) }}" method="POST">
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
                <label class="form-label">Date</label>
                <input type="date" class="form-control" name="date" value="{{ $SalesInvoice->date }}" required>
            </div>
            <div class="col-12">
                <label class="form-label">Invoice</label>
                <input type="text" class="form-control" name="invoice" value="{{ $SalesInvoice->invoice }}" required>
            </div>
            <div class="col-12">
                <label class="form-label">Total</label>
                <input type="number" class="form-control" name="total" value="{{ $SalesInvoice->total }}" required>
            </div>
            <div class="col-12">
                <label class="form-label">Note</label>
                <input type="text" class="form-control" name="note" value="{{ $SalesInvoice->note }}" required>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <a href="{{ URL::previous() }}" class="btn btn-secondary">Close</a>
        <button type="submit" class="btn btn-info">Update now</button>
    </div>
</form>
@endsection
