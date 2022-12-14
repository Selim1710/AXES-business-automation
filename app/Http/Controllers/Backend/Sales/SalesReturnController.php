<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Sales\SalesReturn;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesReturnController extends Controller
{
    public function salesReturn()
    {
        $salesreturndb=DB::table('sales_returns')

            ->join('customers','sales_returns.customer','customers.id')
            ->select('sales_returns.*','customers.cc_name')
            ->orderby('id','desc')
            ->get();

        $salesreturns = SalesReturn::all()->sortByDesc('id')->values();
        return view('sales.salesreturn.sales-return',compact('salesreturns'),[
            'customers'=>Customer::where('status',1)->orderby('id','desc')->get(),
            'salesreturndbs'=>$salesreturndb,
        ]);
    }
    public function salesReturnCreate(){
        return view('sales.salesreturn.sales-return-create',[
            'salesreturns' => count(SalesReturn::all()),

        ]);
    }
    public function storeSalesReturn(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'customer' => 'required',
            'invoice' => 'required',
            'against' => 'required',
            'total' => 'required',
            'note' => 'required',
        ]);

        SalesReturn::create([
            'date' => $request->date,
            'customer' => $request->customer,
            'invoice' => $request->invoice,
            'against' => $request->against,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin.sales-return')->with('message', 'SalesReturn Added Successfully');
    }
    public function editSalesReturn($id)
    {
        $salesreturn = SalesReturn::find($id);
        return view('sales.salesreturn.sales-return-edit',compact('salesreturn'));
    }
    public function updateSalesReturn(Request $request, $id)
    {
        $salesreturn = SalesReturn::find($id);
        $salesreturn->update([
            'date' => $request->date,
            'customer' => $request->customer,
            'invoice' => $request->invoice,
            'against' => $request->against,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin.sales-return')->with('message', 'SalesReturn Updated');
    }

    public function deleteSalesReturn($id)
    {
        $salesreturn = SalesReturn::find($id);
        $salesreturn->delete();
        return redirect()->route('admin.sales-return')->with('error', 'SalesReturn deleted');
    }
}
