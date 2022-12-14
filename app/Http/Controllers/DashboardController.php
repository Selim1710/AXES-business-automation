<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Supplier;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
   public function dashboard5(){

       return view('dashboard.index',[
          'total_customer'=> Customer::all()->count(),
          'total_supplier'=> Supplier::all()->count(),
           'total_purchase' => DB::table("purchase_orders")->sum('total'),
          'total_sales' => DB::table('sales_estimates')->sum('total'),
          'total_expenses' => DB::table('invoices')->sum('totalamount'),
       ]);
   }
}
