<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Laravel\Nova\Nova;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    //Sales Return
    public function salesReturnShow()
    {
        return view('sales.sales-return-show');
    }
}