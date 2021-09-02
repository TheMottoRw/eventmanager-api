<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Savedforlater;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;

class SavedforlaterController extends Controller
{
    //
    public function create(Request $request)
    {
        $savedforlater = new Savedforlater();

        if ($this->checkHasSaved($request->user_id,$request->event_id) == 0) {
            $savedforlater->event_id = $request->event_id;
            $savedforlater->user_id = $request->user_id;
            $savedforlater->save();
            if ($savedforlater) {
                return response()->json(['status' => 'ok', 'message' => "Saved event for later successfully"]);
            } else {
                return response()->json(['status' => 'failed', 'message' => 'Something went wrong,failed to save event']);
            }
        } else {
            return response()->json(['status' => 'failed', 'message' => "You have already saved this event"]);
        }
    }

    public function load(Request $request,$id = 0){
        DB::query("SET sql_mode=''");
        $data = Savedforlater::join('evenements',"evenements.id","=","savedforlater.event_id")
            ->join("users","users.id",'=',"savedforlater.user_id")
            ->join("businesses","businesses.id","=","evenements.business_id")
            ->leftJoin("reservation", "reservation.event_id", "=", "evenements.id")
            ->selectRaw("savedforlater.*,users.name as saver_name,users.email as saver_email,users.phone as saver_phone,evenements.event_name,evenements.event_type,evenements.brief_description,evenements.images,evenements.reservation_allowed,evenements.event_kikoff,evenements.event_close,evenements.address,evenements.created_at,businesses.name as business_name,businesses.business_type,(evenements.reservation_allowed - count(reservation.id)) as available_seat,count(reservation.id) as reserved_seat")
            ->groupBy("savedforlater.id");
        if($request->event_id){
            return response()->json(['status'=>'ok','data'=>$data->where('savedforlater.event_id',$request->event_id)->get()]);
        }
        if($request->user_id){
            return response()->json(['status'=>'ok','data'=>$data->where('savedforlater.user_id',$request->user_id)->get()]);
        }
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => $data->get()]);
        else
            return response()->json(['status' => 'ok', 'data' => [Savedforlater::find($id)]]);

    }

    public function update(Request $request, $id)
    {
        $users = Savedforlater::find($id);
        $users->event_id = $request->event_id;
        $users->user_id = $request->user_id;
        $users->save();
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => $users->findAll()]);
        else
            return response()->json(['status' => 'ok', 'data' => [$users->find($id)]]);

    }

    public function checkHasSaved($userid,$eventid)
    {
        $followings = Savedforlater::where('event_id',$eventid)->where('user_id',$userid)->get();
        return count($followings);
    }

    public function remove(Request $request, $id)
    {
        $watchlater = Savedforlater::find($id);
        $watchlater->delete();
        if ($watchlater)
            return response()->json(['status' => 'ok','message'=>'Event removed from review later', 'data' => []]);
        else
            return response()->json(['status' => 'ok', 'message'=>'Failed to remove event from review later,something went wrong','data' => [$watchlater->find($id)]]);
    }
}
