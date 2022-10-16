<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class InventoryController extends Controller
{

    //////////////// branch ////////////////
    public function branchTable()
    {
        $branches = Branch::all();
        return view('inventory.branch_table', compact('branches'));
    }

    public function addBranch(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Branch::create([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return back()->with('message', 'Branch added successfully');
    }

    public function editBranch($id)
    {
        $branch = Branch::find($id);
        return view('inventory.edit_branch', compact('branch'));
    }


    public function updateBranch(Request $request, $id)
    {
        $branch = Branch::find($id);
        $branch->update([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('inventory.branch.table')->with('message', 'Branch updated successfully');
    }

    public function destroyBranch($id)
    {
        $branch = Branch::find($id);
        $branch->delete();
        return back()->with('error', 'Branch deleted');
    }

    ////////////////// warehouse ////////////////
    public function warehouseTable()
    {
        return view('inventory.warehouse_table');
    }

    public function addWarehouse(Request $request)
    {
        //
    }


    public function show($id)
    {
        //
    }


    public function editWarehouse($id)
    {
        //
    }


    public function updateWarehouse(Request $request, $id)
    {
        //
    }

    public function destroyWarehouse($id)
    {
        //
    }
}
