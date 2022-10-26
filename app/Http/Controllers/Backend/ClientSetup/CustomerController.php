<?php

namespace App\Http\Controllers\Backend\ClientSetup;

use App\Http\Controllers\Controller;
use App\Models\ClientGroup;
use App\Models\User;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {

        $groups = ClientGroup::with('customer')->orderBy('id', 'desc')->get();
        // dd($groups);
        $customers = User::where('role', 'customer')->orderBy('id', 'desc')->get();
        // dd($customers);

        return view('client_setup.customer.table', compact('groups', 'customers'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            "client_group_id" => "required",
            "name" => "required",
            "status" => "required",
            "father_name" => "required",
            "mother_name" => "required",
            "NID" => "required",
            "contact" => "required",
            "email" => "required",
            "address" => "required",
            "shipping_address" => "required",
            "role" => "required",
        ]);
        // dd($request->all());
        // dd($request->client_group_id);
        User::create([
            "client_group_id" => $request->client_group_id,
            "name" => $request->name,
            "status" => $request->status,
            "father_name" => $request->father_name,
            "mother_name" => $request->mother_name,
            "NID" => $request->NID,
            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
            "shipping_address" => $request->shipping_address,
            "role" => $request->role,
        ]);
        return back()->with('message', 'Customer Added Successfully');
    }


    public function show($id)
    {
        //
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
