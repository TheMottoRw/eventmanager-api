<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Businesses;
use Illuminate\Support\Facades\Crypt;

class BusinessesController extends Controller
{
    //
    private function create(Request $request){
        $user = new Businesses();

        $user->save([
            'name'=>$request->name,
            'business_type'=>$request->business_type,
            'tin'=>$request->tin,
            'contact_number'=>$request->phone,
            'address'=>$request->address,
            'password'=>Crypt::encryptString($request->password),
        ]);
        if($user){
            return response()->json(['status'=>'ok','message'=>"Business created successfully"]);
        }
        return response()->json(['status'=>'failed','message'=>'Something went wrong,business not created']);
    }
    private function load($id=0){
        if($id==0)
            return response()->json(['status'=>'ok','data'=>Businesses::all()]);
        else
            return response()->json(['status'=>'ok','data'=>[Businesses::find($id)]]);

    }

    private function update(Request $request,$id){
        $users = Businesses::find($id);
        $users->name = $request->name;
        $users->business_type = $request->business_type;
        $users->address = $request->address;
        $users->contact_number = $request->phone;
        $users->tin = $request->tin;
        $users->save();
       return response()->json(['status'=>'ok','message'=>"Business has been updated successfully"]);
    }
}
