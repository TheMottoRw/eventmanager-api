<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\Crypt;

class EventsController extends Controller
{
    //
    private function create(Request $request){
        $user = new Events();

        $user->save([
            'business_id'=>$request->business_id,
            'event_name'=>$request->event_name,
            'event_type'=>$request->event_type,
            'brief_description'=>$request->brief_description,
            'full_description'=>$request->full_description,
            'images'=>$request->images,
            'event_kikoff'=>$request->event_kikoff,
            'event_close'=>$request->event_close,
            'reservation_allowed'=>$request->reservation_allowed,
        ]);
        if($user){
            return response()->json(['status'=>'ok','message'=>"Event created successfully"]);
        }
        return response()->json(['status'=>'failed','message'=>'Something went wrong,event not created']);
    }
    private function load($id=0){
        if($id==0)
            return response()->json(['status'=>'ok','data'=>Events::all()]);
        else
            return response()->json(['status'=>'ok','data'=>[Events::find($id)]]);

    }

    private function update(Request $request,$id){
        $users = Events::find($id);
        $users->business_id = $request->business_id;
        $users->event_name = $request->event_name;
        $users->event_type = $request->event_type;
        $users->brief_description = $request->brief_description;
        $users->full_description = $request->full_description;
        $users->images = $request->images;
        $users->event_kikoff = $request->event_kikoff;
        $users->event_close = $request->event_close;
        $users->reservation_allowed = $request->reservation_allowed;
        $users->save();
        return response()->json(['status'=>'ok','message'=>'Event has been updated successfully']);
    }
}
