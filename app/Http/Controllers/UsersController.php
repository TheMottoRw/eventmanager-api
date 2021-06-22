<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Crypt;

class UsersController extends Controller
{
    //
    private function create(Request $request){
        $user = new Users();

        $user->save([
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>Crypt::encryptString($request->password),
        ]);
        if($user){
            return response()->json(['status'=>'ok','message'=>"User created successfully"]);
        }
        return response()->json(['status'=>'failed','message'=>'Something went wrong,user not created']);
    }
    private function load($id=0){
       if($id==0)
        return response()->json(['status'=>'ok','data'=>Users::all()]);
       else
           return response()->json(['status'=>'ok','data'=>[Users::find($id)]]);

    }

    private function update(Request $request,$id){
        $users = Users::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->save();
        if($id==0)
            return response()->json(['status'=>'ok','data'=>$users->findAll()]);
        else
            return response()->json(['status'=>'ok','data'=>[$users->find($id)]]);

    }
    private function login(Request $request){
        $user = Users::where("phone",$request->phone)->where("password",Crypt::encryptString($request->password))->get();
        if(count($user)==1){
            return response()->json(['status'=>'ok','message'=>'Logged in successfully','data'=>$user]);
        }else{
            return response()->json(['status'=>'failed','message'=>'Wrong phone number or password','data'=>[]]);
        }
    }
}
