<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\employee;
use App\bank;
use DB;

class BankController extends Controller
{
   
   public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('updation')->only('delete','update', 'store');
    }

    public function create(){

        $employee = employee::find(session('employee_id'));
        $bankIds = bank::all()->where('employee_id', session('employee_id'));
        $employees = employee::all();
        return view ('hr.bank.bank',compact('employee','employees','bankIds'));
    }

	public function store(Request $request){
         $request->validate([
         'name' => 'required|max:255',
         ]);

        $data = bank::create($request->all());

        return redirect()->route('bank.create')->with('success', 'Data is saved succesfully');
      // return redirect()->route('bank',['id'=>$data->id])->with('success', 'User is created succesfully');


    }

    public function edit($id){
        $data = bank::find($id);
       session()->put('employee_id', $data->employee_id);
        $employee = employee::find(session('employee_id'));
        $bankIds = bank::all()->where('employee_id', session('employee_id'));
       
        return view ('hr.bank.editBank',compact('data','employee','bankIds'));
    }
    
    public function update(Request $request, $id)
    {
     
    bank::findOrFail($id)->update($request->all());

     return redirect()->route('bank.edit',['id'=>$id])->with('success', 'Bank Detail is updated succesfully');
    
    
    }

    public function destroy($id)
    {
    
    bank::findOrFail($id)->delete(); 
    return redirect()->route('bank.create')->with('success', 'Bank Detail is deleted succesfully');
   
    }
}
