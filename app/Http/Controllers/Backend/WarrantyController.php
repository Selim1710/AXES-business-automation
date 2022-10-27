<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\ServiceOffice;
use Validator;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    public function serviceCenterShow(){
        return view('warranty-management.service-center-show',[
            'servicecenter'=>ServiceOffice::all()
        ]);

    }

    public function serviceCenterStore(Request $request){

        $this->validate($request,[
            'name' => 'required',
            'contact' => 'required',
            'address' => 'required',
            'description' => 'nullable',

        ]);
        ;
        $servicecenter= new ServiceOffice();
        $servicecenter->name = $request->name;
        $servicecenter->contact = $request->contact;
        $servicecenter->address = $request->address;
        $servicecenter->description = $request->description;
        $servicecenter->save();

        return back()->with('message', 'Create Successfully');
    }
}
