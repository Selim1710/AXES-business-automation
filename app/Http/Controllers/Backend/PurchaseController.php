<?php

namespace App\Http\Controllers\Backend;

use App\Models\ProductSetup\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use App\Models\Inventory\Branch;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Purchase\PurchaseOrder;
use App\Models\Purchase\PurchaseReturn;
use App\Models\Purchase\PurchaseInvoice;


class PurchaseController extends Controller
{
    //Purchase Order
    public function purchaseOrderShow(){


        return view('purchase.purchase-order-show',[
            'PurchaseOrder' => PurchaseOrder::all(),

        ]);

    }
    public function purchaseOrderStore(Request $request)
    {
        PurchaseOrder::create([
            'date' => $request->date,
            'product' => $request->product,
            'serial' => $request->serial,
            'total' => $request->total,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function purchaseOrderEdit($id)
    {
        return view('purchase.purchase-order-edit',[
            'PurchaseOrderEdit' => PurchaseOrder::find($id),
        ]);
    }
    public function purchaseOrderUpdate(Request $request, $id)
    {

        $PurchaseOrderUpdate = PurchaseOrder::find($id);
        $PurchaseOrderUpdate->update([
            'product' => $request->product,
            'total' => $request->total,
            'note' => $request->note,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function purchaseOrderDelete(Request $request)
    {
        $PurchaseOrderdelete = PurchaseOrder::find($request->purchase_order_delete);
        $PurchaseOrderdelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }
    //Purchase Invoice

    public function PurchaseInvoice()
    {
        $PurchaseInvoices=DB::table('purchase_invoices')
            ->join('branches','purchase_invoices.b_name','branches.id')
            ->join('suppliers','purchase_invoices.s_name','suppliers.id')
            ->join('products','purchase_invoices.pro_name','products.id')
            ->select('purchase_invoices.*','suppliers.ss_name','products.name')
            ->orderby('id','desc')
            ->get();

        $branches = Branch::with('product')->orderBy('id', 'desc')->get();

        $purchaseinvoices = PurchaseInvoice::all()->sortByDesc('id')->values();
        return view('purchase.purchaseinvoice.table', compact('purchaseinvoices','branches'),[
            'PurchaseInvoicesss'=>$PurchaseInvoices,
            'suppliers'=> Supplier::where('status',1)->orderby('id','desc')->get(),
            'Products'=> Product::where('status',1)->orderby('id','desc')->get(),
        ]);
    }

    public function storePurchaseInvoice(Request $request)
    {
        $request->validate([
            'date' => 'required',
            'b_name' => 'required',
            's_name' => 'required',
            'invoice' => 'required',
            'total' => 'required',
            'note' => 'required',
        ]);

        PurchaseInvoice::create([
            'date' => $request->date,
            'pro_name' => $request->pro_name,
            'b_name' => $request->b_name,
            's_name' => $request->s_name,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'note' => $request->note,
            'imei' => $request->imei,

        ]);
        return redirect()->route('admin.purchase.invoice')->with('message', 'PurchaseInvoice Added Successfully');
    }
    public function editPurchaseInvoice($id)
    {
        $PurchaseInvoice = PurchaseInvoice::find($id);
        return view('purchase.purchaseinvoice.edit', compact('PurchaseInvoice'));
    }
    public function updatePurchaseInvoice(Request $request, $id)
    {
        $PurchaseInvoice = PurchaseInvoice::find($id);
        $PurchaseInvoice->update([
            'date' => $request->date,
//            'b_name' => $request->b_name,
//            's_name' => $request->s_name,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin.purchase.invoice')->with('message', 'PurchaseInvoice Updated');
    }

    public function deletePurchaseInvoice($id)
    {
        $PurchaseInvoice = PurchaseInvoice::find($id);
        $PurchaseInvoice->delete();
        return redirect()->route('admin.purchase.invoice')->with('error', 'PurchaseInvoice deleted');
    }



    //Purchase Return
    public function purchaseReturnShow(){
        return view('purchase.purchase-return-show',[
            'PurchaseReturn' => PurchaseReturn::all()
        ]);
    }
    public function purchaseReturnStore(Request $request)
    {
        PurchaseReturn::create([
            'date' => $request->date,
            'vendor' => $request->vendor,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'note' => $request->note,
        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function purchaseReturnEdit($id)
    {
        return view('purchase.purchase-return-edit',[
            'PurchaseReturnEdit' => PurchaseReturn::find($id),
        ]);
    }
    public function purchaseReturnUpdate(Request $request, $id)
    {

        $PurchaseReturnUpdate = PurchaseReturn::find($id);
        $PurchaseReturnUpdate->update([
            'vendor' => $request->vendor,
            'total' => $request->total,
            'note' => $request->note,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function purchaseReturnDelete(Request $request)
    {
        $PurchaseReturndelete = PurchaseReturn::find($request->purchase_return_delete);
        $PurchaseReturndelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}

