<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customermodel;

class customercontroller extends Controller
{
    public function viewcustomerform(){
        return view('admin/createcustomers');
    }

    public function insertdata(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:customers,email|email',
            'address'=>'required',
            'mobile'=>'required|unique:customers,mobile|numeric'
        ]);
 
        $customers=new customermodel();
        $customers->name=$request['name'];
        $customers->email=$request['email'];
        $customers->address=$request['address'];
        $customers->mobile=$request['mobile'];
        $customers->vat_no=$request['vat'];
        $customers->date=$request['date'];
        $customers->save();
        if($customers){
            return back()->with('success','You have created the customer account successfully!');
        }
        else {
            return back()->with('fail','Error Occurred!');
        }
        
    }

    public function viewcustomerdata(){
        
        $customerdata=customermodel::all();

        return response()->json(['data'=>$customerdata]);
    }

    public function edit($customerId)
    {
        // Fetch the customer record by ID
        $customer = Customer::find($customerId);

        // Pass the customer data to the view or return it as JSON
        return view('customer.edit', compact('customer'));
    }
}