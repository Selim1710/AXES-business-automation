<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function SalesEstimate()
    {
        return view('sales.salesestimate.sales_table');
    }

    public function salesEstimateCreate()
    {
        $products = Product::with('stock')->get();
        return view('sales.salesestimate.sales-estimate-create',compact('products'));
    }
    public function salesEstimateInvoiceCreate()
    {
        dd('here');
    }
}
