<?php

namespace App\Http\Controllers;

use App\Models\Businesses;
use Illuminate\Http\Request;
use App\Models\Users;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    //
    public function defaultUser(){
        $user = new Users();

        $admins = $user::where('user_type','Admin')->get();
        if(count($admins) ==0){
        $user->name = 'Emera';
        $user->email = 'emera@gmail.com';
        $user->phone = '0780000001';
        $user->user_type = 'Admin';
        $user->password = Hash::make(12345678);
        $user->save();

        }
        if($user){
            return response()->json(['status'=>'ok','message'=>"User created successfully"]);
        }
        return response()->json(['status'=>'failed','message'=>'Something went wrong,user not created']);
    }
    public function create(Request $request){
//        return response()->json(['request'=>$request->input()]);
        $this->defaultUser();
        $user = new Users();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->user_type = 'Standard';
        $user->password = Hash::make($request->password);
        $user->save();
        if($user){
            return response()->json(['status'=>'ok','message'=>"User created successfully",'data'=>DB::table('users')->orderBy('created_at','desc')->first()]);
        }
        return response()->json(['status'=>'failed','message'=>'Something went wrong,user not created']);
    }
    public function load(Request $request,$id=0){
       if($id==0)
        return response()->json(['status'=>'ok','data'=>Users::all()]);
       else
           return response()->json(['status'=>'ok','data'=>Users::find($id)]);

    }

    public function update(Request $request,$id){
        $users = Users::find($id);
        $users->name = $request->name;
        $users->email = $request->email;
        $users->phone = $request->phone;
        $users->save();
        if($users)
            return response()->json(['status'=>'ok','data'=>[$users->find($id)]]);
        else
            return response()->json(['status'=>'fail','data'=>[$users->find($id)]]);

    }
    public function login(Request $request){
        $this->defaultUser();
       $user = Users::where("phone",$request->phone)->get();
        if(count($user)==1){
            if(Hash::check($request->password,$user[0]['password'])) {
                return response()->json(['status' => 'ok', 'message' => 'Logged in successfully', 'data' => $user]);
            }
        }else{
            //check is a business login
            $user = Businesses::where("contact_number",$request->phone)->get();
            if(count($user) == 1){
                if(Hash::check($request->password,$user[0]['password'])) {
                    $user[0]['user_type'] = 'Business';
                    return response()->json(['status'=>'ok','message'=>'Logged in successfully','data'=>$user]);
                }else{
                    return response()->json(['status'=>'failed','message'=>'Wrong phone number or password','data'=>[]]);
                }
            }else{
            return response()->json(['status'=>'failed','message'=>'Wrong phone number or password','data'=>[]]);
            }
        }
        return response()->json(['status'=>'failed','message'=>'Wrong phone number or password','data'=>[]]);
    }
}
