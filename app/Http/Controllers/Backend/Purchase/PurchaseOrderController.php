<?php

namespace App\Http\Controllers\Backend\Purchase;

use App\Http\Controllers\Controller;
use App\Models\ProductSetup\Product;
use App\Models\Purchase\PurchaseOrder;
use App\Models\Purchase\PurchaseOrderNew;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function purchaseOrder()
    {
        $PurchaseOrder=DB::table('purchase_orders')

            ->join('suppliers','purchase_orders.c_supplier','suppliers.id')
            ->join('products','purchase_orders.pd_name','products.id')
            ->select('purchase_orders.*','suppliers.ss_name','products.name')
            ->orderby('id','desc')
            ->get();


        return view('purchase.purchaseorder.purchase-order',[
            'suppliers'=> Supplier::where('status',1)->orderby('id','desc')->get(),
            'products'=> Product::where('status',1)->orderby('id','desc')->get(),
            'PurchaseOrders'=>$PurchaseOrder,
        ]);
    }


    public function purchaseStore(Request $request)
    {
        PurchaseOrder::create([
            'date' => $request->date,
            'pd_name' => $request->pd_name,
            'c_supplier' => $request->c_supplier,
            'o_no' => $request->o_no,
            'total' => $request->total,
            'note' => $request->note,

        ]);
        return back()->with('message', 'create Successfully');

    }

    public function purchaseOrderCreate()
    {
        $products = Product::all();
        return view('purchase.purchaseorder.purchase-order-create',compact('products'));
    }

    public function view()
    {
        $previewDeliveries = session()->get('purOrderCreate');
        return view('purchase.purchaseorder.view',compact('previewDeliveries'));
    }



    public function purchaseOrderEdit($id)
    {
        $purchaseorder = PurchaseOrder::find($id);
        return view('purchase.purchaseorder.parchase_edit',compact('purchaseorder'));
    }
    public function purchaseOrderUpdate(Request $request, $id)
    {
        $purchaseorder = PurchaseOrder::find($id);
        $purchaseorder->update([
            'date' => $request->date,
            'o_no' => $request->o_no,
            'total' => $request->total,
            'note' => $request->note,
        ]);
        return redirect()->route('admin.purchase-order')->with('message', 'Purchase orderUpdated');
    }

    public function purchaseOrderDelete($id)
    {
        $purchaseorder = PurchaseOrder::find($id);
        $purchaseorder->delete();
        return redirect()->route('admin.purchase-order')->with('error', 'Purchase Order deleted');
    }

    // add Product

    public function addProduct($id)
    {
        $product = Product::with('stock')->find($id);
        if (!$product) {
            return back()->with('message', 'No product available');
        } else {
            $purOrderCreateExist = session()->get('purOrderCreate');
            if (!$purOrderCreateExist) {
                // case-1: first time adding
                $purOrderCreate = [$id => [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'qty' => 1,
                ]];
                session()->put('purOrderCreate', $purOrderCreate);
                return redirect()->route('admin.purchase-order.create')->with('message', 'product added');
            }

            if (!isset($purOrderCreateExist[$id])) {

                // case-2: different product adding
                $purOrderCreateExist[$id] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'qty' => 1,
                ];
                session()->put('purOrderCreate', $purOrderCreateExist);
                return redirect()->route('admin.purchase-order.create')->with('message', 'another product added');
            }
            // case-3: same product adding into the cart
            $purOrderCreateExist[$id]['qty'] = $purOrderCreateExist[$id]['qty'] + 1;
            session()->put('purOrderCreate', $purOrderCreateExist);
            return redirect()->route('admin.purchase-order.create')->with('message', 'Same product added');
        }
    }

    public function clear()
    {
        session()->forget('purOrderCreate');
        return redirect()->route('admin.purchase-order.create')->with('error', 'Transfer Cleared');
    }
    public function destroy()
    {
        // dd('delete');
        return redirect()->route('admin.purchase-order.create')->with('error', 'Branch Transfer Cleared');
    }
}
