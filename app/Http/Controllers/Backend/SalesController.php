<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Sales\SalesReturnTable;

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
        return view('sales.sales-return-show',[
            'SalesReturn' => SalesReturnTable::all()
        ]);
    }
    public function salesReturnStore(Request $request)
    {
        SalesReturnTable::create([
            'date' => $request->date,
            'customer' => $request->customer,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function salesReturnEdit($id)
    {
        return view('sales.sales-return-edit', [
            'SalesReturnEdit' => SalesReturnTable::find($id),
        ]);
    }
    public function salesReturnUpdate(Request $request, $id)
    {

        $SalesReturnUpdate = SalesReturnTable::find($id);
        $SalesReturnUpdate->update([
            'customer' => $request->customer,
            'note' => $request->note,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function salesReturnDelete(Request $request)
    {
        $SalesReturndelete = SalesReturnTable::find($request->sales_return_delete);
        $SalesReturndelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}
