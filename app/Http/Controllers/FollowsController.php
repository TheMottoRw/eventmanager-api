<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\Follows;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class FollowsController extends Controller
{
    //
    public function create(Request $request)
    {
        $follows = new Follows();

        if ($this->checkHasFollowed($request->user_id,$request->business_id) == 0) {
                $follows->business_id = $request->business_id;
                $follows->user_id = $request->user_id;
                $follows->save();
                if ($follows) {
                    return response()->json(['status' => 'ok', 'message' => "Following event organizer done successfully"]);
                } else {
                    return response()->json(['status' => 'failed', 'message' => 'Something went wrong,failed to follow event organizer']);
                }
        } else {
            return response()->json(['status' => 'failed', 'message' => "You have already followed event organizer"]);
        }
    }

    public function load(Request $request,$id = 0){
        $data = Follows::join('businesses',"businesses.id","=","follows.business_id")
            ->join("users","users.id",'=',"follows.user_id")
            ->selectRaw("follows.*,users.name as follower_name,users.email as follower_email,users.phone as follower_phone,businesses.name as business_name,businesses.name as business_contact_number,businesses.business_type");

        if($request->business_id){
            return response()->json(['status'=>'ok','data'=>$data->where('follows.business_id',$request->business_id)->get()]);
        }
        if($request->user_id){
            return response()->json(['status'=>'ok','data'=>$data->where('follows.user_id',$request->user_id)->get()]);
        }
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => $data->get()]);
        else
            return response()->json(['status' => 'ok', 'data' => Follows::find($id)]);

    }

    public function update(Request $request, $id)
    {
        $users = Follows::find($id);
        $users->business_id = $request->business_id;
        $users->user_id = $request->user_id;
        $users->save();
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => $users->findAll()]);
        else
            return response()->json(['status' => 'ok', 'data' => [$users->find($id)]]);

    }

    public function checkHasFollowed($userid,$businessid)
    {
        $followings = Follows::where('business_id',$businessid)->where('user_id',$userid)->get();
        return count($followings);
    }

}
