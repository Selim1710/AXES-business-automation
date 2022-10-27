<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Warranty\ServiceCenter;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function serviceCenterShow(){
        return view('warranty-management.service-center-show');

    }

    public function serviceCenterStore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'description' => 'nullable',

        ]);
        ;
        $servicecenter= new ServiceCenter();
        $servicecenter->name = $request->name;
        $servicecenter->contact = $request->contact;
        $servicecenter->address = $request->address;
        $servicecenter->description = $request->description;
        $servicecenter->save();

        return back()->with('message', 'Create Successfully');
    }
}
