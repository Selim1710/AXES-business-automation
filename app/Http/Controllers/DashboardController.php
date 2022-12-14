<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
   public function dashboard5(){
       return view('dashboard.index',[
          'total_customer'=> Customer::all()->count(),
       ]);
   }
}
