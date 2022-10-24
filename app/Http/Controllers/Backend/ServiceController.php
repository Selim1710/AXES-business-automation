<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ServiceController extends Controller
    {
    public function storeReceivedCreate(){
        return view('service.service-received-create.service-received-add');

    }
    }
