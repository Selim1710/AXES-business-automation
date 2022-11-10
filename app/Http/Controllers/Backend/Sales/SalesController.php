<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;


use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function SalesEstimate()
    {
        return view('sales.salesestimate.sales_table');
    }

    public function salesEstimateCreate()
    {
        return view('sales.salesestimate.sales-estimate-create');
    }
}
