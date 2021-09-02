<?php

namespace App\Http\Controllers;

use App\Models\Events;
use App\Models\User;
use App\Models\Users;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Crypt;

class ReservationController extends Controller
{
    //
    public function create(Request $request)
    {
        $reservation = new Reservation();

        if ($this->checkAvailableReservation($request->event_id) > 0) {
            if ($this->isUserAllowed($request->event_id, $request->user_id)) {
                $reservation->business_id = $request->business_id;
                $reservation->event_id = $request->event_id;
                $reservation->user_id = $request->user_id;
                $reservation->save();
                if ($reservation) {
                    //check user email for notification
                    $userObj = Users::find($request->user_id);
                    $eventObj = Events::find($request->event_id);
                    if($userObj!=null){
                        $mail = new MailController();
                        $subject = "Event manager - reservation notification";
                        $message = "We are glad to inform you that your reservation for the event ".$eventObj->event_name." has been recorded. Event scheduled to start by ".$eventObj->event_kikoff;
                        $resp = "ok";
//                        $resp = $mail->sendMail($userObj->email,$userObj->name,$subject,$message);
                        if($resp=="ok"){
                            return response()->json(['status' => $resp, 'message' => "Reservation created successfully,we sent you email"]);
                        }else{
                            return response()->json(['status' => 'ok', 'message' => 'Reservation created successfully,Email not delivered']);
                        }
                    }else{
                        return response()->json(['status' => 'ok', 'message' => 'Reservation created,but no user found for notification']);
                    }
                } else {
                    return response()->json(['status' => 'failed', 'message' => 'Something went wrong,user not created']);
                }
            } else {
                return response()->json(['status' => 'failed', 'message' => "You have already reserved a seat"]);
            }
        } else {
            return response()->json(['status' => 'failed', 'message' => "No seat available"]);
        }
    }

    public function load(Request $request,$id = 0){
        $data = Reservation::join('businesses',"businesses.id","=","reservation.business_id")
                            ->join("evenements","evenements.id",'=',"reservation.event_id")
                            ->join("users","users.id",'=',"reservation.user_id")
                            ->selectRaw("reservation.*,users.name as reserver_name,users.email as reserver_email,users.phone as reserver_phone,evenements.event_name,evenements.event_type,evenements.event_kikoff,evenements.event_close,evenements.brief_description,evenements.images,businesses.name as business_name,businesses.business_type,'' as available_seat");

        if($request->business_id){
            return response()->json(['status'=>'ok','data'=>$data->where('reservation.business_id',$request->business_id)->get()]);
        }
        if($request->user_id){
            return response()->json(['status'=>'ok','data'=>$data->where('reservation.user_id',$request->user_id)->get()]);
        }
        if($request->event_id){
            return response()->json(['status'=>'ok','data'=>$data->where('reservation.event_id',$request->event_id)->get()]);
        }
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => $data->get()]);
        else
            return response()->json(['status' => 'ok', 'data' => [Reservation::find($id)]]);

    }

    public function update(Request $request, $id)
    {
        $users = Reservation::find($id);
        $users->business_id = $request->business_id;
        $users->event_id = $request->event_id;
        $users->user_id = $request->user_id;
        $users->save();
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => $users->findAll()]);
        else
            return response()->json(['status' => 'ok', 'data' => [$users->find($id)]]);

    }

    public function checkAvailableReservation($eventid)
    {
        $reservation_allowed = Events::find($eventid)->reservation_allowed;
        $reserved = Reservation::where("event_id", $eventid)->get();
        return $reservation_allowed - count($reserved);
    }

    public function isUserAllowed($eventid, $userId)
    {
        $reservation_allowed = Events::find($eventid)->reservation_allowed;
        $reserved = Reservation::where("event_id", $eventid)->where("user_id", $userId)->get();
        return count($reserved) == 0 ? true : false;
    }

}
