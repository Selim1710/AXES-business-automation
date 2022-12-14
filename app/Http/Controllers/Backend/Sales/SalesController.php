<?php

namespace App\Http\Controllers\Backend\Sales;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\ProductSetup\Product;
use App\Models\SalesEstimate;
use App\Models\Warranty\ManageProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalesController extends Controller
{
    public function SalesEstimate()
    {
        $SalesEstimate=DB::table('sales_estimates')

            ->join('customers','sales_estimates.customer','customers.id')
            ->select('sales_estimates.*','customers.cc_name')
            ->orderby('id','desc')
            ->get();

        return view('sales.salesestimate.sales_table',[
            'SalesEstimate' => SalesEstimate::all(),
            'customers'=>Customer::where('status',1)->orderby('id','desc')->get(),
            'SalesEstimatess'=>$SalesEstimate,
        ]);
    }

    public function salesEstimateCreate()
    {
        $products = Product::with('stock')->get();
        return view('sales.salesestimate.sales-estimate-create',compact('products'));
    }


    public function salesEstimateStore(Request $request)

    {
        SalesEstimate::create([
            'date' => $request->date,
            'customer' => $request->customer,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'note' => $request->note,

        ]);

        return redirect()->back()->with('message', 'Create Successfully');
    }



    public function salesEstimateEdit($id)
    {
        return view('sales.salesestimate.sales-estimate-edit', [
            'SalesEstimateEdit' => SalesEstimate::find($id),
        ]);
    }

    public function salesEstimateUpdate(Request $request, $id)
    {

        $SalesEstimateUpdate = SalesEstimate::find($id);
        $SalesEstimateUpdate->update([
            'date' => $request->date,
            'customer' => $request->customer,
            'invoice' => $request->invoice,
            'total' => $request->total,
            'note' => $request->note,

        ]);
        return back()->with('message', 'Update Successfully');
    }
    public function salesEstimateDelete(Request $request)
    {
        $SalesEstimateDelete = SalesEstimate::find($request->sales_estimate_delete);
        $SalesEstimateDelete->delete();
        return back()->with('message', 'Deleted Successfully');
    }
    public function view()
    {
        $previewDeliveries = session()->get('salesCreate');
        return view('sales.salesestimate.view',compact('previewDeliveries'));
    }

    public function addProduct($id)
    {
        // dd('here');
        $product = Product::with('stock')->find($id);
        if (!$product) {
            return back()->with('message', 'No product available');
        } else {
            $salesCreateExist = session()->get('salesCreate');
            if (!$salesCreateExist) {
                // case-1: first time adding
                $salesCreate = [$id => [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'qty' => 1,
                ]];
                session()->put('salesCreate', $salesCreate);
                return redirect()->route('sales-estimate-create')->with('message', 'product added');
            }

            if (!isset($salesCreateExist[$id])) {

                // case-2: different product adding
                $salesCreateExist[$id] = [
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'product_price' => $product->price,
                    'qty' => 1,
                ];
                session()->put('salesCreate', $salesCreateExist);
                return redirect()->route('sales-estimate-create')->with('message', 'another product added');
            }
            // case-3: same product adding into the cart
            $salesCreateExist[$id]['qty'] = $salesCreateExist[$id]['qty'] + 1;
            session()->put('salesCreate', $salesCreateExist);
            return redirect()->route('sales-estimate-create')->with('message', 'Same product added');
        }
    }

    public function clear()
    {
        session()->forget('salesCreate');
        return redirect()->route('sales-estimate-create')->with('error', 'Transfer Cleared');
    }
    public function destroy()
    {
        dd('delete');
        return redirect()->route('sales-estimate-create')->with('error', 'Branch Transfer Cleared');
    }
}
