@extends('layouts.app')
@section('tittle')
   price list
@endsection


@section('content')
    <h1 class="mb-0 text-uppercase"style="font-size: 24px; font-weight: bold;padding-top: 17px;">price list</h1>
   <div class="btn-primary ">
       <h6 class="mb-0 text-uppercase"style="font-size: 20px;
    height: 38px;
    padding-top: 8px;
    margin-top: 16px;">price list</h6>
   </div>
    <hr/>
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example2" class="table table-striped table-bordered">
                    <thead>
                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Barcode</th>
                        <th>Available qty</th>
                        <th>Old Price </th>
                        <th>Current Price </th>
                        <th>Last Update </th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                        <td>$320,800</td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
@endsection
