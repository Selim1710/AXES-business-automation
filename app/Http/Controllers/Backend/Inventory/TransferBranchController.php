<?php

namespace App\Http\Controllers\Backend\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Inventory\Branch;
use App\Models\ProductSetup\Product;
use Illuminate\Http\Request;

class TransferBranchController extends Controller
{

    public function index()
    {
        $branches = Branch::with('warehouse')->get();
        $transferedBranches = Branch::all();
        return view('inventory.transfer_branch_table', compact('branches','transferedBranches'));
    }


    public function create()
    {
        dd('create');
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $branchProducts = Product::where('branch_id', $request->branch_id)->get();
        // dd($branchProducts);
        return view('inventory.create_branch_transfer', compact('branchProducts'));
    }


    public function show($id)
    {
        dd($id);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
