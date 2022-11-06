<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Laravel\Nova\Nova;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    //Sales Estimate
    public function salesEstimateShow()
    {
        return view('sales.sales-estimate-show');
    }
    //Sales Estimate create
    public function salesEstimateCreateShow()
    {
        return view('sales.sales-estimate-create-show');
    }

    //Sales Return
    public function salesReturnShow()
    {
        return view('sales.sales-return-show');
    }
}
