@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">Sales Estimate</h2>

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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#brand">Create New Sales</button>
        <!-- Modal -->
        <div class="modal fade" id="brand" tabindex="-1" aria-labelledby="brandLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="brandLabel">Create New Sales</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <!-- add form -->
                    <form action="{{route('sales-estimate-store')}}" method="POST">
                        @csrf
                        <div class="modal-body">
                            {{-- <div class="message">
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div> --}}

                            <div class="border p-3 rounded">
                                <div class="col-12">
                                    <label class="form-label">Date</label>
                                    <input type="date" class="form-control" id="currentDate" name="date" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Customer</label>
                                    <input type="text" class="form-control" name="customer" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Invoice</label>
                                    <input type="text" class="form-control" id="invno4" name="invoice" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Total</label>
                                    <input type="text" class="form-control" name="total" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label">Note</label>
                                    <input type="text" class="form-control" name="note" required>
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
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Invoice</th>
                    <th>Total</th>
                    <th>Note</th>


                    <th>Action</th>
                </tr>
            </thead>

            <tbody>

            @php $i=1; @endphp
            @foreach($SalesEstimate as $SalesEstimates)

                <tr>
                    <td>{{$i++}}</td>

                    <td>{{$SalesEstimates->date}} </td>
                    <td>{{$SalesEstimates->customer}} </td>
                    <td>{{$SalesEstimates->invoice}} </td>
                    <td>{{$SalesEstimates->total}} </td>
                    <td>{{$SalesEstimates->note}} </td>

                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('sales-estimate-edit',['id'=>$SalesEstimates->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('sales-estimate-delete')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="sales_estimate_delete" value="{{$SalesEstimates->id}}">
                                <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>
<input type="hidden" id="total-invoices"  value="{{ count($SalesEstimate) }}"/>
    <script>
        var i = 100 + parseInt(document.getElementById('total-invoices').value);
        // console.log(typeof i);
        var date = new Date();
        var currentDate = date.toISOString().slice(0, 10);
        document.getElementById('currentDate').value = currentDate;

        var defaultExpense =
            `INV:${date.getDate()}${date.getMonth() + 1}${date.getUTCFullYear().toString().slice(2,4)}${++i}`;
        document.getElementById('invno4').value = defaultExpense;
    </script>

@endsection
