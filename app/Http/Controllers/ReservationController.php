<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Crypt;

class ReservationController extends Controller
{
    //
    private function create(Request $request){
        $user = new Reservation();

        if($this->checkAvailableReservation($request->event_id)>0){
        $user->save([
            'business_id'=>$request->business_id,
            'event_id'=>$request->event_id,
            'user_id'=>$request->user_id,
            'user_type'=>$request->user_type,
        ]);
        if($user){
            return response()->json(['status'=>'ok','message'=>"Reservation created successfully"]);
        }
        return response()->json(['status'=>'failed','message'=>'Something went wrong,user not created']);
        }else{
            return response()->json(['status'=>'failed','message'=>"No seat available"]);
        }
    }
    private function load($id=0){
        if($id==0)
            return response()->json(['status'=>'ok','data'=>Reservation::all()]);
        else
            return response()->json(['status'=>'ok','data'=>[Reservation::find($id)]]);

    }

    private function update(Request $request,$id){
        $users = Reservation::find($id);
        $users->business_id = $request->business_id;
        $users->event_id = $request->event_id;
        $users->user_id = $request->user_id;
        $users->save();
        if($id==0)
            return response()->json(['status'=>'ok','data'=>$users->findAll()]);
        else
            return response()->json(['status'=>'ok','data'=>[$users->find($id)]]);

    }
    private function checkAvailableReservation($eventid){
        $reservation_allowed = Events::find($eventid)->reservation_allowed;
        $reserved = Reservation::where("event_id",$eventid)->get();
        return $reservation_allowed - $reserved;

    }

}
