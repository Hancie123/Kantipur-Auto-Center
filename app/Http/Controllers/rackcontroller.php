<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\rackmodel;

class rackcontroller extends Controller
{
    public function viewcreaterackpage(){
        
        return view('admin/createracks');
    }

    public function viewdata(){
        $racktable=rackmodel::all();

        return response()->json(['data'=>$racktable]);
    }

    public function insertdata(Request $request){
        $request->validate([
            'rack'=>'required|unique:racks,rack_name',
        ]);

        $rack=new rackmodel;
        $rack->rack_name=$request['rack'];
        $rack->save();
        if($rack){
            return back()->with('success','You have successfully created the new rack');
        }
        else {
            return back()->with('fail','Error Occurred!');
        }
        
    }

   
}