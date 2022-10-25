@extends('layouts.app')
@section('tittle')
    Service Received Create
@endsection
@section('content')
    <div class="row" style=" margin-top: 20px;">
        <div class="col-xl-6 mx-auto">
    <div class="card">
        <div class="card-body">
            <div class="border p-3 rounded">
                <h6 class="mb-0 text-uppercase"style="text-align: center">Service Received Create</h6>
                <hr>
                <!-- message -->
                @if(session()->has('message'))
                        <p class="alert alert-success text-center mt-4">{{ session()->get('message') }}</p>
                    @elseif(session()->has('error'))
                        <p class="alert alert-danger text-center mt-4">{{ session()->get('error') }}</p>
                    @endif

                <form class="row g-3" action="{{route('service-received-store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="col-6">
                        <label class="form-label"><b>Customer Name</b></label>
                        <input type="text" name="cname" maxlength="45" value="" id="cname" class="form-control" placeholder="e.g. Md.Sani"/>
                    </div>
                    @error('cname')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-6">
                        <label class="form-label"><b>Invoice No</b></label>
                        <input type="text" name="invoice_no" maxlength="15" value="" id="invoice_no" class="form-control" placeholder="e.g. ABA/CU/001" />
                    </div>
                    <div class="col-6">
                        <label class="form-label"><b> Date</b></label>
                        <input type="date" name="deli_date" maxlength="45" id="currentDate" class="form-control datetimepicker"/>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><b>Phone</b></label>
                        <input type="text" name="cphone" maxlength="45" value="" id="cphone" class="form-control" placeholder="e.g.017XXXXXXXXXX"/>
                    </div>
                    @error('cphone')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="col-12">
                        <label class="form-label"><b>Product Model</b></label>
                        <input type="text" name="pmodel" maxlength="45" value="" id="pmodel" class="form-control" placeholder="e.g. SN487"/>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><b>Address</b></label>
                        <textarea class="form-control" name="caddress" id="caddress" maxlength="200" rows="4" placeholder="Address"></textarea>
                    </div>
                    <div class="col-6">
                        <label class="form-label"><b>Product Description/Problem</b></label>
                        <textarea class="form-control" name="pdescription" id="pdescription" maxlength="200" rows="4" placeholder="Description"></textarea>
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
    </div>
    <script>
        var date = new Date();
        var currentDate = date.toISOString().slice(0,10);

        document.getElementById('currentDate').value = currentDate;
    </script>
@endsection
