@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Sales Return</h2>
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
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">Sales Return Create</button>
        <!-- Modal -->
        <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <form action="{{ route('admin.store.sales-return') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">

                                <div class="col-12">
                                    <label class="form-label"><b>Date</b></label>
                                    <input type="date" class="form-control" id="currentDate" name="date" placeholder="e.g  10/11/2022" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label"><b>Customer</b></label>
                                    <select name="customer" class="form-control" required>
                                        <option value=""> -- SELECT -- </option>
                                        @foreach ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->cc_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <br>
                                <div class="col-12">
                                    @php $i=1 @endphp
                                    <div class="input-group">
                                        <span class="input-group-addon"><b>Invoice No:</b></span>
                                        <input type="text" class="form-control ms-2" maxlength="15"
                                               name="invoice" id="invno3"
                                               autocomplete="off">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Against</b></label>
                                    <input type="text" class="form-control" name="against"  required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Total</b></label>
                                    <input type="text" class="form-control" name="total" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Note</b></label>
                                    <input type="text" class="form-control" name="note"  required>
                                </div>


                                <div class="alert alert-danger mt-2" id="name_error" style="display: none"></div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <input type="submit" class="btn btn-primary" value="save" required>
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
                    <th>Against</th>
                    <th>Total</th>
                    <th>Note</th>
                    <th>Action</th>

                </tr>
            </thead>
            @forelse ($salesreturndbs as $key=>$salesreturn)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $salesreturn->date }}</td>
                    <td>{{ $salesreturn->cc_name }}</td>
                    <td>{{ $salesreturn->invoice }}</td>
                    <td>{{ $salesreturn->against }}</td>
                    <td>{{ $salesreturn->total }}</td>
                    <td>{{ $salesreturn->note }}</td>

                    <td>
                        <a class="btn btn-success" href="{{ route('admin.edit.sales-return', $salesreturn->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('admin.delete.sales-return', $salesreturn->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No return available</p>
                @endforelse
            </tbody>

        </table>
    </div>

    <input type="hidden" id="total-invoices"  value="{{ count($salesreturns) }}"/>
    <script>
        var i = 0 + parseInt(document.getElementById('total-invoices').value);
        // console.log(typeof i);
        var date = new Date();
        var currentDate = date.toISOString().slice(0, 10);
        document.getElementById('currentDate').value = currentDate;

        var defaultExpense =
            `SALRTNINV:${date.getDate()}${date.getMonth() + 1}${date.getUTCFullYear().toString().slice(2,4)}${++i}`;
        document.getElementById('invno3').value = defaultExpense;
    </script>

    @endsection
