<?php

namespace App\Http\Controllers\Backend\ClientSetup;

use App\Http\Controllers\Controller;
use App\Models\ClientGroup;
use App\Models\User;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{

    public function index()
    {
        $groups = ClientGroup::with('customer')->orderBy('id', 'desc')->get();
//        $customers = User::where('role', 'customer')->orderBy('id', 'desc')->get();
        return view('client_setup.customer.table',[
            'customers' => Customer::all()
        ]);


    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([


        ]);

        Customer::create([
//            "client_group_id" => $request->client_group_id,
            "cc_name" => $request->cc_name,
//            "status" => $request->status,
            "father_name" => $request->father_name,

            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
//            "role" => $request->role,
        ]);
        return back()->with('message', 'Customer Added Successfully');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $customer = Customer::find($id);
        return view('client_setup.customer.edit', compact('customer'));
    }


    public function update(Request $request, $id)
    {


        $customer = Customer::find($id);
        $customer->update([
            "cc_name" => $request->cc_name,
            "status" => $request->status,
            "father_name" => $request->father_name,

            "contact" => $request->contact,
            "email" => $request->email,
            "address" => $request->address,
        ]);
        return back()->with('message', 'Customer updated');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->delete();
        return back()->with('error', 'customer deleted');
    }
}
