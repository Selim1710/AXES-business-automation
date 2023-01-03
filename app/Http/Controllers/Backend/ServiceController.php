<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Service\ServiceCreate;
use App\Models\Service\ServiceList;
use App\Models\Service\ServiceSales;
use Validator;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function CustomerReceivedCreate()
    {
        return view('Service.Service-received-create.Service-received-add',[

            'servecesInvoice' => count( ServiceCreate::all()),
        ]);
    }
    public function CustomerReceivedstore(Request $request)
    {
        //        dd($request);

        $this->validate($request, [
            'cname' => 'required',
            'invoice_no' => 'unique:service_creates,invoice_no',
            'cphone' => 'required',
            'p_name' => 'nullable',
            'p_code' => 'nullable',
            'caddress' => 'nullable',
            'pdescription' => 'nullable',
        ]);

        $servicestore = new ServiceCreate();
        $servicestore->cname = $request->cname;
        $servicestore->deli_date = $request->deli_date;
        $servicestore->invoice_no = $request->invoice_no;
        $servicestore->cphone = $request->cphone;
        $servicestore->p_name = $request->p_name;
        $servicestore->p_code = $request->p_code;
        $servicestore->caddress = $request->caddress;
        $servicestore->pdescription = $request->pdescription;
        $servicestore->save();

        return redirect()->route('service-received-show')->with('message', 'Service Create Successfully');
    }
    public function CustomerReceivedshow()
    {
        return view('service.service-received-list.service-received-show', [
            'servicestore' => ServiceCreate::all()
        ]);
    }
    public function CustomerReceivedEdit($id)
    {
        return view('service.service-received-list.service-received-edit', [
            'servicestore' => ServiceCreate::find($id),
        ]);
    }
    public function CustomerReceivedUpdate(Request $request, $id)
    {
        $servicestore = ServiceCreate::find($id);
        $servicestore->update([
            'cname' => $request->cname,
            'cphone' => $request->cphone,
            'p_name' => $request->p_name,
            'p_code' => $request->p_code,
            'pdescription' => $request->pdescription,

        ]);
        return redirect()->route('service-received-show')->with('message', 'Update Successfully');
    }
    public function CustomerReceivedDelete(Request $request)
    {
        $servicestore = ServiceCreate::find($request->servicestoredelete_id);
        $servicestore->delete();
        return back()->with('message', 'Deleted Successfully');
    }

    //service list
    public function serviceListShow()
    {
        return view('service.service-list.service-list', [
            'liststores' => ServiceList::all()
        ]);
    }
    public function serviceListStore(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'category' => 'required',
            'cost' => 'required',
            'price' => 'required',
            'description' => 'nullable',

        ]);;
        $liststores = new ServiceList();
        $liststores->name = $request->name;
        $liststores->category = $request->category;
        $liststores->cost = $request->cost;
        $liststores->price = $request->price;
        $liststores->description = $request->description;
        $liststores->save();

        return redirect()->route('service-list-show')->with('message', 'Create Successfully');
    }
    public function serviceListEdit($id)
    {
        return view('service.service-list.service-edit', [
            'liststores' => ServiceList::find($id),
        ]);
    }
    public function serviceListUpdate(Request $request, $id)
    {

        $liststores = ServiceList::find($id);
        $liststores->update([
            'name' => $request->name,
            'category' => $request->category,
            'cost' => $request->cost,
            'price' => $request->price,
            'description' => $request->description,

        ]);
        return redirect()->route('service-list-show')->with('message', 'Service Sales Updated');
    }
    public function serviceListDelete(Request $request)
    {
        $liststores = ServiceList::find($request->liststore_id);
        $liststores->delete();
        return back()->with('message', 'Deleted Successfully');
    }

    //service sales
    public function serviceSalesShow()
    {
        return view('service.service-sales.service_sales-list', [
            'salestores' => ServiceSales::all()
        ]);
    }
    public function serviceSalesStore(Request $request)
    {
        $this->validate($request, [
            'customer' => 'required',
            'invoice' => 'required',
            'phone' => 'required',
            'product' => 'required',
            'description' => 'nullable',

        ]);;
        $salestores = new ServiceSales();
        $salestores->date = $request->date;
        $salestores->customer = $request->customer;
        $salestores->invoice = $request->invoice;
        $salestores->phone = $request->phone;
        $salestores->product = $request->product;
        $salestores->description = $request->description;
        $salestores->save();

        return redirect()->route('service-sales-show')->with('message', 'Create Successfully');
    }
    public function serviceSalesEdit($id)
    {
        return view('service.service-sales.service_sales-edit', [
            'salestores' => ServiceSales::find($id),
        ]);
    }
    public function serviceSalesUpdate(Request $request, $id)
    {

        $salestores = ServiceSales::find($id);
        $salestores->update([
            'customer' => $request->customer,
            'invoice' => $request->invoice,
            'phone' => $request->phone,
            'product' => $request->product,
            'description' => $request->description,

        ]);
        return redirect()->route('service-sales-show')->with('message', 'Service Sales Updated');
    }
    public function serviceSalesDelete(Request $request)
    {
        $salestores = ServiceSales::find($request->salestores_id);
        $salestores->delete();
        return back()->with('message', 'Deleted Successfully');
    }
}
