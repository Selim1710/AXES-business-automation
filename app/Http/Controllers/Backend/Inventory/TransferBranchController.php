<?php

namespace App\Http\Controllers\Backend\Inventory;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class TransferBranchController extends Controller
{
    
    public function index()
    {
        $branchProducts = Branch::all();
        return view('inventory.transfer_branch_table', compact('branchProducts'));
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
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
