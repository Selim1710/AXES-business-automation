<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use App\Models\Service\ServiceCreate;
use App\Models\Service\ServiceList;

use Illuminate\Http\Request;

class ServiceController extends Controller
    {
    public function CustomerReceivedCreate(){
        return view('Service.Service-received-create.Service-received-add');

    }
    public function CustomerReceivedstore(Request $request){
//        dd($request);

        $this->validate($request,[
            'cname' => 'required',
            'invoice_no' => 'unique:service_creates,invoice_no',
            'cphone' => 'required',
            'pmodel' => 'nullable',
            'caddress' => 'nullable',
            'pdescription' => 'nullable',
        ]);

        $servicestore=new ServiceCreate();
        $servicestore->cname = $request->cname;
        $servicestore->deli_date = $request->deli_date;
        $servicestore->invoice_no = $request->invoice_no;
        $servicestore->cphone = $request->cphone;
        $servicestore->pmodel = $request->pmodel;
        $servicestore->caddress = $request->caddress;
        $servicestore->pdescription = $request->pdescription;
        $servicestore->save();

        return redirect()->route('service-received-show')->with('message', 'Service Create Successfully');

    }
    public function CustomerReceivedshow(){
        return view('service.service-received-list.service-received-show',[
                'servicestore'=>ServiceCreate::all()
            ]);
    }
    public function CustomerReceivedEdit($id){
        return view('service.service-received-list.service-received-edit',[
            'servicestore' => ServiceCreate::find($id),
        ]);

    }
    public function CustomerReceivedUpdate(Request $request,$id){
        $servicestore = ServiceCreate::find($id);
        $servicestore ->update([
            'cname' => $request->cname,
            'cphone' => $request->cphone,
            'pmodel' => $request->pmodel,
            'pdescription' => $request->pdescription,

        ]);
        return redirect()->route('service-received-show')->with('message', 'Update Successfully');

    }
    public function CustomerReceivedDelete(Request $request){
        $servicestore=ServiceCreate::find($request->servicestoredelete_id);
        $servicestore->delete();
        return back()->with('message','Deleted Successfully');

    }
    public function serviceListShow(){
        return view('service.service-list.service-list',[
            'liststores'=>ServiceList::all()
        ]);

    }
    public function serviceListStore(Request $request){
;
        $liststores= new ServiceList();
        $liststores->name = $request->name;
        $liststores->category = $request->category;
        $liststores->cost = $request->cost;
        $liststores->price = $request->price;
        $liststores->description = $request->description;
        $liststores->save();

        return redirect()->route('service-list-show')->with('message', 'Create Successfully');
    }
}


