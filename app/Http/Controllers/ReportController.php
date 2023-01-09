<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function inventorySummery()
    {
        return view('TableReport.inventorySummer');
    }
}
