@extends('layouts.app')
@section('content')
    <h2 class="mt-4 mb-4">Sales Create</h2>
    <style>
    

        .quickbox {
            overflow-y: scroll;
            height: 50vh;
        }
        
        img{
            height: 85px;
            width: 200px;
        }
        .quick {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-column-gap: 1fr;
            grid-row-gap: 1fr;
    
        }
        .quickLink{
            width: 150px;
            height: 110px;
            margin: 20px 20px;
            text-align: center;
            background-color: gray;
            border-radius: 4px;
            box-shadow: 0 0 20px 2px rgba(0,0,0,.1);
            transition: 1s;
        }
        .quickLink img {
            display: block;
            width: 100%;
            border-radius: 5px;
           
        }
        .quickLink h6,p{
            color: black;
        }

        .input-group-addon{
            float: left;
            width: 50px;
            height: 50px;
            border: 1px solid gray;
            background: white;
            text-align: center;
            padding-top: 12px;
            border-radius: 4px;
        }
        .quickLink a {
            text-decoration: none;
        }
        .quickLink a span{
            margin-left: 20px;
            color: black;
        }

        #contactForm{
            width: 100%;
            /* z-index: 3; */
        }
        
    </style>

    <section class="content">
        <div class="row">
            <div class="col-md-7">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                            <input type="text" class="form-control" name="search" id="search"
                                                placeholder="e.g. Product Code or Name" autocomplete="off">
                                        </div>
                                    </div>

                                    <div class="quickslide">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4>Products</h4>
                                                <div class="quickbox">
                                                    <div class="quick">
                                                        @forelse ($products as $product)
                                                            <div class="quickLink estimated_product_list">
                                                                <a href="#">
                                                                    <img src="{{ asset('/uploads/products/'.$product->image) }}"
                                                                        alt="Sales">
                                                                        <h6>{{ $product->name }}</h6>
                                                                        <p>{{ $product->stock->total_qty }}</p>
                                                                        <input type="hidden" class="product_price" value="{{ $product->price }}">
                                                                    </a>
                                                            </div>
                                                        @empty
                                                            <p>No product available</p>
                                                        @endforelse
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="box box-solid">
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-user-o"></span></span>
                                            <span class="input-group-addon p-0"><a data-toggle="collapse"
                                                    data-target="#walkcus" class="accordion-toggle" id="walkin"
                                                    style="cursor: pointer; text-decoration:none;">Walk-In</a></span>
                                            <input type="text" class="form-control" id="cusname" value=""
                                                placeholder="Type Customer Code, Name Or Mobile No..." autocomplete="off">
                                            <span class="input-group-addon"><a id="addcus" style="cursor: pointer;"><span
                                                        class="fa fa-plus"></span></a></span>
                                        </div>
                                        <input type="hidden" name="cusid" id="cusid" class="form-control"
                                            value="" readonly="">
                                    </div>
                                </div>
                                <div class="col-md-3"><span style="font-size: 18px;color: red;font-weight: bold;">Bal.:
                                    </span><span style="font-size: 18px;color: blue;font-weight: bold;"
                                        id="cusbal">0.00</span></div>
                            </div>
                           
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-search"></span></span>
                                            <input type="text" class="form-control" id="pcode"
                                                placeholder="e.g. Product Code or Name" autocomplete="off"> <span
                                                class="input-group-addon"><a id="addpro" style="cursor: pointer;"><span
                                                        class="fa fa-plus"></span></a></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group m-1">
                                        <div class="input-group">
                                            <span class="input-group-addon"><span class="fa fa-barcode"></span></span>
                                            <input type="text" class="form-control" id="bcode"
                                                placeholder="e.g. Barcode" autocomplete="off">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- product --}}
                            <div class="cart cart-sm">     
                                <table class="table table-bordered table-striped" style="margin-bottom: 0;">
                                    <thead>
                                        <tr>
                                            <th width="30px">SN</th>
                                            <th width="214px">Item</th>
                                            <th width="72px">Qty</th>
                                            <th width="72px">Price</th>   
                                            <th width="77px">SubTotal</th>
                                            <th width="25px"><a class="empty" style="cursor: pointer;"><i class="fa fa-trash"></i></a>
                                            </th>    
                                        </tr>
                                    </thead>
                                </table>
                            <div class="cart-msg style-3 item" style="padding:0px;" >    
                                <table class="table table-bordered table-striped" id="product_foot_body" style="margin-bottom: 0; opacity: 0">    
                                    <tbody id="product_body">
                                    </tbody>   
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="text-center" width="244px"><strong>-Total-</strong></td>
                                            <td width="72px"></td>
                                            <td colspan="2" width="107px"><strong>1</strong></td>
                                            <td width="77px" class="text-right"><strong>1300</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right"><strong>Discount (%)</strong></td>
                                            <td colspan="2"><input type="text" maxlength="5" min="0" onkeypress="return isNumberKey(event)" class="form-control" id="discount" value="0" size="2" style="height: 24px;"></td>
                                            <td id="disitems" class="text-right"><strong>0</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right"><strong>VAT (%)</strong></td>
                                            <td colspan="2"><input type="text" maxlength="5" min="0" onkeypress="return isNumberKey(event)" class="form-control" id="vatp" value="0" size="2" style="height: 24px;"></td><td id="vatamo" class="text-right"><strong>0</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <td colspan="3" align="right"><strong>AIT (%)</strong></td>
                                            <td colspan="2"><input type="text" maxlength="5" min="0" onkeypress="return isNumberKey(event)" class="form-control" id="aitp" value="0" size="2" style="height: 24px;"></td>
                                            <td id="aitamo" class="text-right"><strong>0</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr></tr>
                                        <tr>
                                            <td colspan="3" align="right">
                                                <div style="display: inline;"><i class="fa fa-angle-right cart-icon" id="icon"></i></div>
                                                <span id="otdname"><strong>Others:</strong></span></td>
                                            <td colspan="2"><input type="text" maxlength="5" min="0" onkeypress="return isNumberKey(event)" class="form-control" id="others" value="0" size="2" style="height: 24px;"></td>
                                            <td id="othersamo" class="text-right"><strong>0</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr class="dshow" style="display: none;">
                                            <td colspan="3" align="right"><strong>Others Name:</strong></td>
                                            <td colspan="3"><input type="text" maxlength="20" min="0" class="form-control" id="otname" value="Others" size="2" style="height: 24px;"></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right"><strong>Freight:</strong></td>
                                            <td colspan="2"><input type="text" maxlength="6" min="0" onkeypress="return isNumberKey(event)" class="form-control" id="freight" value="0" size="2" style="height: 24px;"></td>
                                            <td id="freightd" class="text-right"><strong>0</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right"><strong>Fractional Discount:</strong></td>
                                            <td colspan="2"><input type="text" maxlength="6" min="0" onkeypress="return isNumberKey(event)" class="form-control" id="less" value="0" size="2" style="height: 24px;"></td>
                                            <td id="lessd" class="text-right"><strong>0</strong></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td colspan="3" align="right"><strong>Grand Total:</strong></td>
                                            <td colspan="2"></td>
                                            <td id="grtotal" class="text-right"><strong>1300</strong></td>
                                            <td></td>
                                        </tr>
                                    </tfoot> 
                                </table>
                            </div>
                                {{-- <table class="table table-bordered table-striped" style="margin-bottom: 0;">

                                </table>     --}}
                            </div>
                            {{-- product --}}

                            <div class="row" id="serialpro">


                            </div>

                            <div class="row" id="extra"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
