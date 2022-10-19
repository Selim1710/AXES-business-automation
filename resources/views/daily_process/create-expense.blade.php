@extends('layouts.app')
@section('tittle')
    create-expense
@endsection
@section('content')
    <section class="content">

        <div class="row ">
            <div class="col-md-8 ">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title" style="margin-top: 17px;">Add Expenses</h3>
                    </div>
                    <div class="box-body">
                        <div class="card">
                            <div class="card-body">
                        <form action="dai_expensescreate.php" onsubmit="return validate()" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                            <div class="col-md-12 popup_details_div">
                                <div class="row">
                                    <center>
                                        <h3 class="page-title">EXPENSES VOUCHER</h3><br><br>
                                    </center>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">

                                            <center>
                                                <a id="addcash" style="cursor: pointer;font-size: 16px;margin-right: 4px;color: red;"><span class="fa fa-plus"></span></a>
                                                <span style="font-size: 20px;font-weight: bold;">Balance: </span><span style="font-size: 20px;font-weight: bold;color:red;" id="cbal">-2,066.00</span>
                                            </center>
                                        </div>
                                    </div>
                                    <div class="col-md-4"></div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <span class="input-group-addon"><b>Expenses No:</b></span>
                                                <input type="text" class="form-control" maxlength="15" name="invno" id="invno" value="EXP181022102" placeholder="e.g. AXE121119101" autocomplete="off">
                                            </div>
                                        </div>
                                        <br>
                                        <div class="form-group" >
                                            <div class="input-group">
                                                <span class="input-group-addon"><b>Date:</b></span>
                                                <input type="text" class="form-control datetimepicker" name="apdate" id="apdate" value="2022-10-11" placeholder="Date:" autocomplete="off" readonly>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group" >
                                            <label>Expenses Head</label>
                                            <div class="input-group">
                                                <select class="form-control" name="expid" id="expid">
                                                    <option value="">-Select-</option>
                                                    <option value="15">900032 - Telephones &amp; Mobile Bill</option>
                                                    <option value="16">900022 - Electricity Bills</option>
                                                    <option value="19">900019 - Conveyances</option>
                                                    <option value="20">900027 - Office Stationeries</option>
                                                    <option value="21">900020 - Internet &amp; IT Expenses</option>
                                                    <option value="22">900034 - Sundry Expenses</option>
                                                    <option value="23">900025 - Licences &amp; Renewals</option>
                                                    <option value="24">900029 - Sales Commission</option>
                                                    <option value="25">900056 - VAT On Purchase</option>
                                                    <option value="26">900055 - Tax On Purchase</option>
                                                    <option value="28">900033 - Tips &amp; Donations</option>
                                                    <option value="31">900026 - Office Rent</option>
                                                    <option value="35">900031 - Water Bill</option>
                                                    <option value="53">900037 - Vehicle  Bill</option>

                                                </select>



                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group" >
                                            <label>Ref</label>
                                            <input type="text" maxlength="25" class="form-control" name="ref" id="ref" placeholder="e.g. Sumon" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label>Amount</label>
                                            <input type="text" maxlength="6" class="form-control" name="amount" id="amount"  onkeypress="return isNumberKey(event)" placeholder="e.g. 500" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="col-md-1">
                                        <div class="form-group">
                                            <label>&nbsp;</label>
                                            <input type="button" id="addexp" class="btn btn-flat bg-red" style="background-color: red;
                                              color: white;" value="Add"/>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-bordered table-striped"style="background-color: #babebf;">
                                            <thead>
                                            <th style="width:40px; text-align:center">SN</th>
                                            <th>Expenses Head</th>
                                            <th>Amount</th>
                                            <th>Ref</th>
                                            <th style="width:40px; text-align:center"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a></th>
                                            </thead>
                                            <tbody id="itemdata">

                                            </tbody>
                                            <tfoot id="itemfoot">

                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Note</label>
                                            <textarea class="form-control" name="note" id="note" maxlength="250" rows="3" placeholder="e.g. Note"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix" ></div>
                            <div class="col-md-12 nopadding widgets_area"></div>
                            <div class="row"style="margin-top: 15px" >
                                <div class="col-md-8"></div>
                                <div class="col-md-4 text-right" >
                                    <input type="button" id="expreset" class="btn btn-flat bg-red btn-sm " style="background-color: red;
                                              color: white;" value="Reset"/>
                                    <input type="submit" name="save_expenses" id="submit" class="btn btn-flat bg-purple btn-sm" value="Save"/>
                                    <a href="dai_expenlist.php" class="btn btn-flat bg-gray  " style="background-color: #babebf;
                                              color: white;">Close</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                    </div>
                </div>
            </div>
@endsection
