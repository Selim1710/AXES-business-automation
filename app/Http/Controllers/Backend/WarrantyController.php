<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

use App\Models\Warranty\ServiceOffice;
use App\Models\Warranty\WarrantyDetails;
use Validator;
use Illuminate\Http\Request;

class WarrantyController extends Controller
{
    //service center
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
    public function serviceCenterEdit($id){
        return view('warranty-management.service-center-edit',[
            'serviceCenterEdit' => ServiceOffice::find($id),
        ]);

    }
    public function serviceCenterUpdate(Request $request,$id){

        $serviceCenteredit = ServiceOffice::find($id);
        $serviceCenteredit ->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'address' => $request->address,
            'description' => $request->description,


        ]);
        return back()->with('message', 'Update Successfully');

    }
    public function serviceCenterDelete(Request $request){
        $serviceCenterdelete = ServiceOffice::find($request->service_delete_id);
        $serviceCenterdelete->delete();
        return back()->with('message','Deleted Successfully');

    }


//warranty
    public function warrantyShow(){
        return view('warranty-management.warranty-claim-show',[
            'warrantyStore'=>WarrantyDetails::all()
        ]);

    }


    public function warrantyStore(Request $request){



        $this->validate($request,[
            'name' => 'required',
            'contact' => 'required',
            'product' => 'required',
            's_date' => 'required',
            'w_date' => 'required',


        ]);

        $warrantyStore= new WarrantyDetails();

        $warrantyStore->name = $request->name;
        $warrantyStore->contact = $request->contact;
        $warrantyStore->product = $request->product;
        $warrantyStore->s_date = $request->s_date;
        $warrantyStore->w_date = $request->w_date;

        $warrantyStore->save();

        return redirect()->back()->with('message', 'Create Successfully');
    }
    public function warrantyShowEdit($id){
        return view('warranty-management.warranty-show-edit',[
            'warrantyshowedit' => WarrantyDetails::find($id),
        ]);

    }
    public function warrantyShowUpdate(Request $request,$id){

        $warrantyshowedit = WarrantyDetails::find($id);
        $warrantyshowedit ->update([
            'name' => $request->name,
            'contact' => $request->contact,
            'product' => $request->product,
            's_date' => $request->s_date,
            'w_date' => $request->w_date,

        ]);
        return back()->with('message', 'Update Successfully');

    }
    public function warrantyShowDelete(Request $request){
        $warrantyshowedelete = WarrantyDetails::find($request->warranty_delete);
        $warrantyshowedelete->delete();
        return back()->with('message','Deleted Successfully');

    }

}
