<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Estimates;
use App\Models\EstimatesAdd;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use App\Models\Expense;

use DB;

class SalesController extends Controller
{
    public function Payments()
    {
        return view('daily_process.payments');
    }
    /** expenses page index */
    public function Expenses()
    {
        /** get data show data on table page expenses */
        $data = DB::table('expenses')->get();
        return view('daily_process.expense',compact('data'));
    }

    // save record
    public function saveRecord(Request $request)
    {
        $request->validate([
            'item_name'    => 'required|string|max:255',
            'purchase_from'=> 'required|string|max:255',
            'purchase_date'=> 'required|string|max:255',
            'purchased_by' => 'required|string|max:255',
            'amount'       => 'required|string|max:255',
            'paid_by'      => 'required|string|max:255',
            'status'       => 'required|string|max:255',
            'attachments'  => 'required',
        ]);

        DB::beginTransaction();
        try {

            $attachments = time().'.'.$request->attachments->extension();
            $request->attachments->move(public_path('assets/images'), $attachments);

            $expense = new Expense;
            $expense->item_name  = $request->item_name;
            $expense->purchase_from = $request->purchase_from;
            $expense->purchase_date = $request->purchase_date;
            $expense->purchased_by  = $request->purchased_by;
            $expense->amount  = $request->amount;
            $expense->paid_by = $request->paid_by;
            $expense->status  = $request->status;
            $expense->attachments  = $attachments;
            $expense->save();

            DB::commit();
            Toastr::success('Create new Expense successfully :)','Success');
            return redirect()->back();
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Expense fail :)','Error');
            return redirect()->back();
        }
    }

    // update
    public function updateRecord( Request $request)
    {
        DB::beginTransaction();
        try{

            $attachments = $request->hidden_attachments;
            $attachment  = $request->file('attachments');
            if($attachment != '')
            {
                unlink('assets/images/'.$attachments);
                $attachments = time().'.'.$attachment->getClientOriginalExtension();
                $attachment->move(public_path('assets/images'), $attachments);
            } else {
                $attachments;
            }

            $update = [

                'id'           => $request->id,
                'item_name'    => $request->item_name,
                'purchase_from'=> $request->purchase_from,
                'purchase_date'=> $request->purchase_date,
                'purchased_by' => $request->purchased_by,
                'amount'       => $request->amount,
                'paid_by'      => $request->paid_by,
                'status'       => $request->status,
                'attachments'  => $attachments,
            ];

            Expense::where('id',$request->id)->update($update);
            DB::commit();
            Toastr::success('Expense updated successfully :)','Success');
            return redirect()->back();

        }catch(\Exception $e){
            DB::rollback();
            Toastr::error('Expense update fail :)','Error');
            return redirect()->back();
        }
    }

    // delete
    public function deleteRecord(Request $request)
    {
        DB::beginTransaction();
        try{

            Expense::destroy($request->id);
            unlink('assets/images/'.$request->attachments);
            DB::commit();
            Toastr::success('Expense deleted successfully :)','Success');
            return redirect()->back();

        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Expense deleted fail :)','Error');
            return redirect()->back();
        }
    }

    /** search record */
    public function searchRecord(Request $request)
    {
        $data = DB::table('expenses')->get();

        // search by item name
        if(!empty($request->item_name) && empty($request->from_date) && empty($request->to_data))
        {
            $data = Expense::where('item_name','LIKE','%'.$request->item_name.'%')->get();
        }

        // search by from_date to_data
        if(empty($request->item_name) && !empty($request->from_date) && !empty($request->to_date))
        {
            $data = Expense::whereBetween('purchase_date',[$request->from_date, $request->to_date])->get();
        }

        // search by item name and from_date to_data
        if(!empty($request->item_name) && !empty($request->from_date) && !empty($request->to_date))
        {
            $data = Expense::where('item_name','LIKE','%'.$request->item_name.'%')
                ->whereBetween('purchase_date',[$request->from_date, $request->to_date])
                ->get();
        }

        return view('daily_process.expense',compact('data'));
    }
}
