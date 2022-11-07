<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SalesReturnController extends Controller
{
    public function salesReturnShow()
    {
        return view('sales.salesreturn.sales-return-show');
    }
}
