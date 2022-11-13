<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class PurchaseOrderController extends Controller
{
    public function purchaseOrder()
    {
        return view('purchase.purchaseorder.purchase-order');
    }

    public function purchaseOrderCreate()
    {
        $products = Product::with('stock')->get();
        return view('purchase.purchaseorder.purchase-order-create',compact('products'));
    }
}
