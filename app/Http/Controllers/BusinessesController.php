<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Businesses;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class BusinessesController extends Controller
{
    //
    public function create(Request $request){
        $business = new Businesses();

        $business->name = $request->name;
        $business->business_type = $request->business_type;
        $business->tin = $request->tin;
        $business->contact_number = $request->phone;
        $business->address = $request->address;
        $business->status = 'Pending';
        $business->password = Hash::make($request->password);
        $business->save();
        if($business){
            $data = DB::table('businesses')->orderBy('created_at','desc')->first();
            $data->user_type = 'Business';
            return response()->json(['status'=>'ok','message'=>"Business created successfully",'data'=>$data]);
        }
        return response()->json(['status'=>'failed','message'=>'Something went wrong,business not created']);
    }
    public function load($id=0){
        if($id==0)
            return response()->json(['status'=>'ok','data'=>Businesses::all()]);
        else
            return response()->json(['status'=>'ok','data'=>Businesses::find($id)]);

    }

    public function update(Request $request,$id){
        $users = Businesses::find($id);
        $users->name = $request->name;
        $users->business_type = $request->business_type;
        $users->address = $request->address;
        $users->contact_number = $request->contact_number;
        $users->tin = $request->tin;
        $users->save();
       return response()->json(['status'=>'ok','message'=>"Business has been updated successfully"]);
    }
}
