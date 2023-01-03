@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Service Sales</h2>
<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <span>
        </span>
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">Service Sales Create</button>
        <!-- Modal -->
        <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">



                    <form action="{{route('service-sales-store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">

                                <div class="col-12">
                                    <label class="form-label"><b>Date</b></label>
                                    <input type="date" class="form-control" id="currentDate" name="date">
                                </div>

                                <div class="col-12">
                                    <label class="form-label"><b>Customer</b></label>
                                    <input type="text" class="form-control" name="customer" placeholder="customer" required>
                                </div>
                                @error('customer')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-12">
                                    <label class="form-label"><b>Invoice</b></label>
                                    <input type="text" class="form-control" id="service_invno" name="invoice">
                                </div>

                                <div class="col-12">
                                    <label class="form-label"><b>Phone</b></label>
                                    <input type="text" class="form-control" name="phone" placeholder="00000000">
                                </div>
                                @error('phone')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-12">
                                    <label class="form-label"><b>Product</b></label>
                                    <input type="text" class="form-control" name="product" placeholder="product">
                                </div>
                                @error('product')
                                <div class="alert alert-danger">{{ $message }}</div>
                                @enderror

                                <div class="col-12">
                                    <label class="form-label"><b>Description</b></label>
                                    <textarea class="form-control" maxlength="250" rows="6" name="description" placeholder="Description"></textarea>
                                </div>
                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>

                            </div>
                        </div>

                        <div class="modal-footer">

                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="save">
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>

                <tr>
                    <th>SN</th>
                    <th>Date</th>
                    <th>Customer</th>
                    <th>Invoice</th>
                    <th>Phone</th>
                    <th>Product</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                @php $i=1; @endphp
                @foreach($salestores as $salestore)

                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$salestore->date}} </td>
                    <td>{{$salestore->customer}}</td>
                    <td>{{$salestore->invoice}}</td>
                    <td>{{$salestore->phone}}</td>
                    <td>{{$salestore->product}}</td>
                    <td>{{$salestore->description}}</td>

                    <td>
                        <div style="min-width: 10rem;">
                            <a class="btn btn-success" style="font-size:13px" href="{{route('service-sales-edit',['id'=>$salestore->id])}}" role="button"><i class="fa fa-pencil" aria-hidden="true"></i> </a>
                            <form action="{{route('service-sales-delete')}}" method="post" style="display:inline">
                                @csrf
                                <input type="hidden" name="salestores_id" value="{{$salestore->id}}">
                                <button class="btn btn-danger" style="font-size:13px " role="button" onclick="return confirm('Are You Sure !!')"><i class="fa fa-trash" aria-hidden="true"></i></button>
                            </form>
                        </div>

                    </td>
                </tr>
                @endforeach

            </tbody>

        </table>
    </div>
    <input type="hidden" id="total-invoices"  value="{{ count($salestores) }}"/>
    <script>
        var i = 0 + parseInt(document.getElementById('total-invoices').value);
        // console.log(typeof i);
        var date = new Date();
        var currentDate = date.toISOString().slice(0, 10);
        document.getElementById('currentDate').value = currentDate;

        var defaultExpense =
            `SERINV:${date.getDate()}${date.getMonth() + 1}${date.getUTCFullYear().toString().slice(2,4)}${++i}`;
        document.getElementById('service_invno').value = defaultExpense;
    </script>

    @endsection