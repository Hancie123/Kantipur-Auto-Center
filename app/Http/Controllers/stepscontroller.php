<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\stepsmodel;

class stepscontroller extends Controller
{
    public function viewcreatestepspage(){
        return view('admin/createsteps');
    }

    public function insertdata(Request $request){
        $request->validate([
            'step'=>'required|unique:steps,step_name',
        ]);

        $steps=new stepsmodel();
        $steps->step_name=$request->input('step');
        $steps->save();
        if($steps){
            return back()->with('success','You have successfully created the new step!');
            
        }
        else {
            return back()->with('fail','Error Occurred');
        }
        
        
    }

    public function showdata(){
        
        $stepstable=stepsmodel::all();
        return response()->json(['data'=>$stepstable]);
    }
}