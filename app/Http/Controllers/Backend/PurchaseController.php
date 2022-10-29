<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PurchaseController extends Controller
{
    //Purchase Order
    public function purchaseOrderShow(){
        return view('purchase.purchase-order-show');

    }
}
