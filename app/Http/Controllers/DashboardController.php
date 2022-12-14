<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   public function dashboard5(){
       return view('dashboard.index',[
          'total_customer'=> Customer::all()->count(),
           'total_purchase' => DB::table("purchase_orders")->sum('total'),
       ]);
   }
}
