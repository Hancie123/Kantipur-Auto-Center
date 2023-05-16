<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\customermodel;

class customercontroller extends Controller
{
    public function viewcustomerform(){

        $customerdata1=customermodel::all();
        return view('admin/createcustomers',compact('customerdata1'));
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

    public function editCustomer(Request $request)
{
    $customerId = $request->input('id');
    $customer = CustomerModel::find($customerId);
    $customer->name = $request->input('name');
    $customer->email = $request->input('email');
    $customer->address = $request->input('address');
    $customer->mobile = $request->input('mobile');
    $customer->vat_no = $request->input('vat');
    $customer->save();

    return redirect()->back()->with('success', 'Customer Details is Updated Successfully');
}

    public function getStudentById($id)
    {
        $customerdata1 = customermodel::find($id);
        
        return response()->json($customerdata1);
    }

    public function viewcustomerpage()
    {
        return view('admin.view_all_customers');
    }
}