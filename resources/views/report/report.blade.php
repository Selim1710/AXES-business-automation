@extends('layouts.app')
@section('content')
<h2 class="mt-4 mb-4">Report</h2>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #C7D2DC;font-size: 15px;"><i class="fas fa-exchange"></i> DAILY REPORT</h5>
                <tr>
                    <td> <a href="#" style="text-decoration: none"> PURCHASE</a></td><br>
                    <td> <a href="#" style="text-decoration: none">SALES</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> EXPENSES DETAILS</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> DAILY CASH STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> PROFIT & LOSS (INVOICE)</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> PROFIT & LOSS (ITEM)</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> OVERVIEW</a></td><br>
                </tr>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #C7D2DC;font-size: 15px;"><i class="fas fa-exchange"></i> PURCHASE</h5>
                <tr>
                    <td> <a href="#" style="text-decoration: none"> PURCHASE RECORD (INVOICE)</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> RETRUN RECORD (INVOICE)</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> SUPPLIER WISE (INVOICE)</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> ITEM WISE</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> ITEM STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> PERIODIC PURCHASE RECORD</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> OVERVIEW</a></td><br>
                </tr>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #C7D2DC;font-size: 15px;"><i class="fas fa-exchange"></i> INVENTORY</h5>
                <tr>
                    <td> <a href="#" style="text-decoration: none">PRODUCT LIST</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> SERIAL RECORD</a></td><br>
                    <td> <a href="{{route('inventory-summery')}}" style="text-decoration: none"> INVENTORY SUMMARY</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> PERIODIC INVENTORY COUNT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> INVENTORY VALUATION</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> PERIODIC INVENTORY VALUATION</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> OVERVIEW</a></td><br>
                </tr>
            </div>
        </div>
    </div>

</div>
<br>
<div class="row">
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #C7D2DC;font-size: 15px;"><i class="fas fa-exchange"></i> SALES</h5>
                <tr>
                    <td> <a href="#" style="text-decoration: none"> SALES RECORD (INVOICE)</a></td><br>
                    <td> <a href="#" style="text-decoration: none">RETURN REORD (INVOICE)</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> CUSTOMER WISE (INVOCE)</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> ITEM WISE</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> ITEM STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none">PERIODIC SALES RECORD</a></td><br>
                    <td> <a href="#" style="text-decoration: none">OVERVIEW</a></td><br>
                </tr>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #C7D2DC;font-size: 15px;"><i class="fas fa-exchange"></i> RECEIVABLES</h5>
                <tr>
                    <td> <a href="#" style="text-decoration: none"> CUSTOMER LIST</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> CUSTOMER BALANCE</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> CUSTOMER STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> CUSTOMER STATEMENT (ITEM)</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> CUSTOMER DUE COLLECTION</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> BALANCE OVERVIEW</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> OVERVIEW</a></td><br>
                </tr>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #C7D2DC;font-size: 15px;"><i class="fas fa-exchange"></i>ACCOUNT</h5>
                <tr>
                    <td> <a href="#" style="text-decoration: none"> LEDGER STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> CASH STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> BANK STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> MOBILE STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> JOURNAL HISTORY</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> TRIAL BALANCE </a></td><br>
                    <td> <a href="#" style="text-decoration: none"> BALANCE SHEET</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> PROFIT & LOSS</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> OVERVIEW</a></td><br>
                </tr>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #C7D2DC;font-size: 15px;"><i class="fas fa-exchange"></i>VOUCHER</h5>
                <tr>
                    <td> <a href="#" style="text-decoration: none"> PAYMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> RECEIPT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> JOURNAL</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> PAYMENT & RECEIPT STATEMENT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> INTERNAL TRANSACTION</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> OVERVIEW</a></td><br>
                </tr>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title" style="background-color: #C7D2DC;font-size: 15px;"><i class="fas fa-exchange"></i>PAYROLL</h5>
                <tr>
                    <td> <a href="#" style="text-decoration: none"> EMPLOYEE LIST</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> ATTENDANCE</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> LEAVE RECORD</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> SUPPLIER BALANCE</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> COMMISSION REPORT</a></td><br>
                    <td> <a href="#" style="text-decoration: none"> OVERVIEW</a></td><br>
                </tr>
            </div>
        </div>
    </div>

</div>



@endsection
