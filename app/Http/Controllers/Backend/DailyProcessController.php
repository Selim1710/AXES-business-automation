<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use DB;
use Illuminate\Http\Request;
use App\Models\ExpensestypeModel;
use App\Models\Expenseshead;

class DailyProcessController extends Controller
{
    public function PriceList(){
        return view('daily_process.price');
    }
    public function expenseRecord(){
        return view('daily_process.expense-record');
    }
    public function expensesHead(){
        $expenseshead=DB::table('expensesheads')
            ->join('expensestype_models','expensesheads.category_id','expensestype_models.id')

            ->select('expensesheads.*','expensestype_models.category_name')
//            ->where('blogs.status',1)
            ->orderby('id','desc')
            ->get();


        return view('daily_process.expenses-head',[
            'categories'=>ExpensestypeModel::where('status',1)->orderby('id','desc')->get(),
            'categories'=> ExpensestypeModel::all(),
            'expensesheads'=>$expenseshead

        ]);
    }
    public function AddExpensesHead(){
        return view('daily_process.add-expenses-head');
    }
    public function addExpensesCategory(){
        return view('daily_process.add-expenses-category');
    }

    public function saveCategory(Request $request){
        $category =new ExpensestypeModel();
        $category->category_name=$request->category_name;
        $category->save();
        return back();

    }
    public function saveExpenses(Request $request){
        $expenseshead  =new Expenseshead();
        $expenseshead->name = $request->name;
        $expenseshead->category_id = $request->category_id;
        $expenseshead->description = $request->description;
        $expenseshead->save();
        return back();
    }

    public function deleteExpensesHead(Request $request){
        $expenseshead=Expenseshead::find($request->expenseshead_id);
        $expenseshead->delete();
        return back()->with('message','Deleted');

    }
    public function editExpensesHead($id){

        return view('daily_process.edit-expenses-head',[
            'expenseshead' => Expenseshead::find($id),


        ]);
    }
    public function updateExpensesHead(Request $request,$id){
        $expenseshead = Expenseshead::find($id);
        $expenseshead ->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        

        return redirect()->back()->with('message', 'Update Successfully');
    }

    public function createExpense(){
        return view('daily_process.create-expense');
    }
}