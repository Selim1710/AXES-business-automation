<?php

namespace App\Http\Controllers\Backend\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Branch;
use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class TransferBranchController extends Controller
{

    public function table()
    {
        $transferedBranches = Branch::all();
        return view('inventory.transfer_branch_table', compact('transferedBranches'));
    }

    public function createBranch()
    {
        $branchProducts = Product::with('branch')->get();
        $branches = Branch::with('product')->get();
        return view('inventory.create_branch_transfer', compact('branchProducts', 'branches'));
    }

    public function branchProduct($id)
    {
        $branchProducts = Product::with('branch')->where('branch_id', $id)->get();
        $branches = Branch::with('product')->get();
        return view('inventory.create_branch_transfer', compact('branchProducts', 'branches'));
    }

    public function view()
    {
        $previewDeliveries = session()->get('transBrData');
        // dd($previewDeliveries);
        return view('inventory.branch_product_transfered', compact('previewDeliveries'));
    }
    public function delete($id)
    {
        $cart = session()->get('transBrData');
        unset($cart[$id]);
        session()->put('transBrData',$cart);

        return back()->with('error','product removed');
    }


    public function addProduct($id)
    {
        $product = Product::with('branch')->find($id);

        if (!$product) {
            return back()->with('message', 'No product available');
        } else {
            $transBrDataExist = session()->get('transBrData');
            if (!$transBrDataExist) {
                // case-1: first time adding
                $transBrData = [$id => [
                    'branch_id' => $product->branch_id,
                    'branch_name' => $product->branch->name,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'qty' => 1,
                ]];
                session()->put('transBrData', $transBrData);
                return redirect()->route('create.branch.transfer')->with('message', 'product added');
            }

            if (!isset($transBrDataExist[$id])) {

                // case-2: different product adding
                $transBrDataExist[$id] = [
                    'branch_id' => $product->branch_id,
                    'branch_name' => $product->branch->name,
                    'product_id' => $product->id,
                    'product_name' => $product->name,
                    'qty' => 1,
                ];
                session()->put('transBrData', $transBrDataExist);
                return redirect()->route('create.branch.transfer')->with('message', 'another product added');
            }
            // case-3: same product adding into the cart
            $transBrDataExist[$id]['qty'] = $transBrDataExist[$id]['qty'] + 1;
            session()->put('transBrData', $transBrDataExist);
            return redirect()->route('create.branch.transfer')->with('message', 'Same product added');
        }
    }

    public function clear()
    {
        session()->forget('transBrData');
        return redirect()->route('create.branch.transfer')->with('error', 'Branch Transfer Cleared');
    }

    public function destroy($id)
    {
        dd('delete');
    }
}
