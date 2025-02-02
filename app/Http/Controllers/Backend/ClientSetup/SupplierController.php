<?php

namespace App\Http\Controllers\Backend\ClientSetup;

use App\Http\Controllers\Controller;
use App\Models\ClientGroup;
use App\Models\Supplier;
// use App\Models\User;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all()->sortByDesc('id')->values();
        $groups = ClientGroup::with('supplier')->orderBy('id', 'desc')->get();
        // $suppliers = User::where('role', 'supplier')->orderBy('id', 'desc')->get();
        return view('client_setup.supplier.table', compact('groups', 'suppliers'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {

        // dd($request->all());
        // dd($request->client_group_id);
        Supplier::create([
//            "client_group_id" => $request->client_group_id,
            "ss_name" => $request->ss_name,
            // "status" => $request->status,

            "contact" => $request->contact,

            "address" => $request->address,

        ]);
        return back()->with('message', 'supplier Added Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $supplier = Supplier::find($id);
        return view('client_setup.supplier.edit', compact('supplier'));
    }


    public function update(Request $request, $id)
    {


        $supplier = Supplier::find($id);
        $supplier->update([
            "ss_name" => $request->ss_name,
            // "status" => $request->status,

            "contact" => $request->contact,

            "address" => $request->address,

        ]);
        return back()->with('message', 'supplier updated');
    }


    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();
        return back()->with('error', 'supplier deleted');
    }
}
