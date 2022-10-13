<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DailyProcess extends Controller
{
    public function PriceList(){
        return view('daily_process.price');
    }
}
