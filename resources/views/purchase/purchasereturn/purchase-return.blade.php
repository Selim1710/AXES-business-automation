@extends('layouts.app')
@section('content')

<h2 class="mt-4 mb-4">Purchase Return</h2>
<!-- message -->
@if(session()->has('message'))
<p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
@elseif(session()->has('error'))
<p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
@endif
<div class="card mb-4">
    <div class="card-header d-flex justify-content-between">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#userCreateModel">Purchase Return Create</button>
        <!-- Modal -->
        <div class="modal fade" id="userCreateModel" tabindex="-1" aria-labelledby="userCreateModelLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">


                    <form action="{{ route('admin.store.purchase-return') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="border p-3 rounded">

                                <div class="col-12">
                                    <label class="form-label"><b>Date</b></label>
                                    <input type="date" class="form-control" name="date" id="currentDate" placeholder="e.g  10/11/2022" required>
                                </div>

                                <div class="col-12">
                                    <label class="form-label"><b>Vendor</b></label>
                                    <input type="text" class="form-control" name="vendor" placeholder="e.g  hp-12012" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Invoice</b></label>
                                    <input type="text" class="form-control" id="pr_invno" name="invoice" placeholder="PUR:121213" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Against</b></label>
                                    <input type="text" class="form-control" name="against" placeholder="e.g waiting" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Total</b></label>
                                    <input type="text" class="form-control" name="total" placeholder="e.g waiting" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><b>Note</b></label>
                                    <input type="text" class="form-control" name="note" placeholder="e.g waiting" required>
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
                    <th>Vendor</th>
                    <th>Invoice</th>
                    <th>Against</th>
                    <th>Total</th>
                    <th>Note</th>
                    <th>Action</th>

                </tr>
            </thead>
            @forelse ($purchasereturns as $key=>$purchasereturn)
                <tr>
                    <td>{{ $key+1 }} </td>
                    <td>{{ $purchasereturn->date }}</td>
                    <td>{{ $purchasereturn->vendor }}</td>
                    <td>{{ $purchasereturn->invoice }}</td>
                    <td>{{ $purchasereturn->against }}</td>
                    <td>{{ $purchasereturn->total }}</td>
                    <td>{{ $purchasereturn->note }}</td>

                    <td>
                        <a class="btn btn-success" href="{{ route('admin.edit.purchase-return', $purchasereturn->id) }}" style="font-size:13px"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                        <a class="btn btn-danger" href="{{ route('admin.delete.purchase-return', $purchasereturn->id) }}" onclick="return confirm('are you sure !!!')" style="font-size:13px"><i class="fa fa-trash" aria-hidden="true"></i></a>
                    </td>
                </tr>
                @empty
                <p class="text-danger text-center">No return available</p>
                @endforelse
            </tbody>

        </table>
    </div>
    <input type="hidden" id="total-invoices"  value="{{ count($purchasereturns) }}"/>
    <script>
        var i = 100 + parseInt(document.getElementById('total-invoices').value);
        // console.log(typeof i);
        var date = new Date();
        var currentDate = date.toISOString().slice(0, 10);
        document.getElementById('currentDate').value = currentDate;

        var defaultExpense =
            `PUR-RTN:${date.getDate()}${date.getMonth() + 1}${date.getUTCFullYear().toString().slice(2,4)}${++i}`;
        document.getElementById('pr_invno').value = defaultExpense;
    </script>
    @endsection
