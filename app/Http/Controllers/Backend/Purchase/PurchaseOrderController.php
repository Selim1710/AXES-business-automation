<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function purchaseOrder()
    {
        return view('purchase.purchaseorder.purchase-order');

    }

    public function purchaseOrderCreate()
    {
        return view('purchase.purchaseorder.purchase-order-create');
    }
}
