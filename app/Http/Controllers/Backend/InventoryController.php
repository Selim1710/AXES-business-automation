<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\Warehouse;
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
        $warehouses = Warehouse::all();
        return view('inventory.warehouse_table', compact('warehouses'));
    }

    public function addWarehouse(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);
        Warehouse::create([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return back()->with('message', 'Warehouse added successfully');
    }

    public function editWarehouse($id)
    {
        $warehouse = Warehouse::find($id);
        return view('inventory.edit_warehouse', compact('warehouse'));
    }

    public function updateWarehouse(Request $request, $id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->update([
            'name' => $request->name,
            'email'  => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
        ]);
        return redirect()->route('inventory.warehouse.table')->with('message', 'Warehouse updated successfully');
    }

    public function destroyWarehouse($id)
    {
        $warehouse = Warehouse::find($id);
        $warehouse->delete();
        return back()->with('error', 'warehouse deleted');
    }

    ////////////////// product delivery ////////////////

}
