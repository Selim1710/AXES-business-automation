<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseInvoiceController extends Controller
{
    public function purchaseInvoice(){
        return view('purchase.purchaseinvoice.purchase-invoice');
    }

    public function purchaseInvoiceCreate(){
        return view('purchase.purchaseinvoice.purchase-invoice-create');
    }
}
