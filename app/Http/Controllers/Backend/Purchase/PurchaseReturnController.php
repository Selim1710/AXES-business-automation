<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseReturnController extends Controller
{
    public function purchaseReturn(){
        return view('purchase.purchasereturn.purchase-return');
    }

    public function purchaseReturnCreate(){
        return view('purchase.purchasereturn.purchase-return-create');
    }
}
