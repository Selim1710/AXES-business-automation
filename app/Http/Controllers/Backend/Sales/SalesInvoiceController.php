<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Inventory\Branch;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\ProductSetup\Product;
use App\Models\Sales\SalesInvoice;

class SalesInvoiceController extends Controller
{
    public function SalesInvoice()
    {
        $SalesInvoices=DB::table('sales_invoices')
            ->join('branches','sales_invoices.b_name','branches.id')
            ->join('customers','sales_invoices.c_name','customers.id')
            ->select('sales_invoices.*','branches.name','customers.cc_name')
            ->orderby('id','desc')
            ->get();
        $branches = Branch::with('product')->orderBy('id', 'desc')->get();

        return view('sales.salesinvoice.salesinvoice_table',compact('branches','SalesInvoices'),[

        'customers'=>Customer::where('status',1)->orderby('id','desc')->get(),
            'SalesInvoicessss'=>$SalesInvoices,
        ]);


        
    }

    public function salesInvoiceCreate()
    {
        $products = Product::with('stock')->get();
        return view('sales.salesinvoice.sales-invoice-create',compact('products'));
    }

    public function storeSalesInvoice(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'b_name' => 'required',
            'c_name' => 'required',
            'invoice' => 'required',
            'total' => 'required',
            'note' => 'required',
        ]);

        SalesInvoice::create([
            'date' => $request->date,
            'b_name' => $request->b_name,
            'c_name' => $request->c_name,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin-sales-invoice-manage')->with('message', 'SalesInvoice Added Successfully');
    }
}
