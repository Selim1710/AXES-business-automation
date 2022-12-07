<?php

namespace App\Http\Controllers\Backend\Sales;

use Illuminate\Http\Request;
use App\Models\Inventory\Branch;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ProductSetup\Product;

class SalesInvoiceController extends Controller
{
    public function SalesInvoice()
    {   
        $branches = Branch::with('product')->orderBy('id', 'desc')->get();
        return view('sales.salesinvoice.salesinvoice_table',compact('branches'));
    }

    public function salesInvoiceCreate()
    {
        $products = Product::with('stock')->get();
        return view('sales.salesinvoice.sales-invoice-create',compact('products'));
    }
}
