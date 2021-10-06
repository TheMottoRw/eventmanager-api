<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Reviews;
use Illuminate\Support\Facades\Crypt;

class ReviewsController extends Controller
{
    //
    public function create(Request $request)
    {
        $review = new Reviews();
        $review->event_id = $request->event_id;
        $review->user_id = $request->user_id;
        $review->review = $request->review;
        $review->rate = $request->rate;
        $review->images = $request->images;
        $review->save();
        if ($review) {
            return response()->json(['status' => 'ok', 'message' => "Reviews created successfully"]);
        } else {
            return response()->json(['status' => 'failed', 'message' => 'Something went wrong,user not created']);
        }

    }

    public function load(Request $request,$id = 0){
        $data = Reviews::join("evenements","evenements.id",'=',"reviews.event_id")
            ->join("users","users.id",'=',"reviews.user_id")
            ->selectRaw("reviews.*,users.name as reviewer_name,users.email as reviewer_email,users.phone as reviewer_phone,evenements.event_name,evenements.event_type,evenements.event_kikoff,evenements.event_close,evenements.brief_description");

        if($request->business_id){
            return response()->json(['status'=>'ok','data'=>$data->where('evenements.business_id',$request->business_id)->get()]);
        }
        if($request->user_id){
            return response()->json(['status'=>'ok','data'=>$data->where('reviews.user_id',$request->user_id)->get()]);
        }
        if($request->event_id){
            return response()->json(['status'=>'ok','data'=>$data->where('reviews.event_id',$request->event_id)->get()]);
        }
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => $data->get()]);
        else
            return response()->json(['status' => 'ok', 'data' => [Reviews::find($id)]]);

    }

    public function update(Request $request, $id)
    {
        $users = Reviews::find($id);
        $users->business_id = $request->business_id;
        $users->event_id = $request->event_id;
        $users->user_id = $request->user_id;
        $users->save();
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => $users->findAll()]);
        else
            return response()->json(['status' => 'ok', 'data' => [$users->find($id)]]);

    }

    public function checkAvailableReviews($eventid)
    {
        $review_allowed = Events::find($eventid)->review_allowed;
        $reserved = Reviews::where("event_id", $eventid)->get();
        return $review_allowed - count($reserved);
    }

    public function isUserAllowed($eventid, $userId)
    {
        $review_allowed = Events::find($eventid)->review_allowed;
        $reserved = Reviews::where("event_id", $eventid)->where("user_id", $userId)->get();
        return count($reserved) == 0 ? true : false;
    }

}
