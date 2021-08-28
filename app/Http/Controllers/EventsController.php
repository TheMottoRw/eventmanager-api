<?php

namespace App\Http\Controllers;

use App\Models\Businesses;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use App\Models\Events;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    //
    public function create(Request $request)
    {
        $appUrl = "http://192.168.43.161:8000/uploads/";
        $event = new Events();

        file_put_contents("data", json_encode($request->input()));
        $images = $this->upload($request->file1, $request->file2, $request->file3);
        $image1 = $appUrl . $images[0];
        $image2 = $appUrl . $images[1];
        $image3 = $appUrl . $images[2];
//        return $request->event_name;
        $event->business_id = $request->business_id;
        $event->event_name = $request->event_name;
        $event->event_type = $request->event_type;
        $event->brief_description = $request->brief_description;
        $event->full_description = $request->full_description==null?".":$request->full_description;
        $event->images = ($image1 . "," . $image2 . "," . $image3);
        $event->event_kikoff = $request->event_kikoff;
        $event->event_close = $request->event_close;
        $event->reservation_allowed = $request->reservation_allowed;
        file_put_contents("data", json_encode($event->toArray()));
        $event->save();
        if ($event) {
//            return response()->json(['status' => 'ok', 'message' => "Event created successfully"]);
            return '{"status":"ok","message":"Event created successfully"}';
        }
        return '{"status":"fail","message":"Failed to create an event"}';
//        return response()->json(['status' => 'failed', 'message' => 'Something went wrong,event not created']);
    }

    public function load(Request $request, $id = 0)
    {
        if ($request->business_id) {
            $data = DB::table('evenements')
                ->join("businesses", "evenements.business_id", "=", "businesses.id")
                ->leftJoin("reservation", "reservation.event_id", "=", "evenements.id")
                ->whereRaw('evenements.business_id', $request->business_id)
                ->selectRaw("evenements.*,(evenements.reservation_allowed - count(reservation.id)) as available_seat,count(reservation.id) as reserved_seat,businesses.name as business_name,businesses.business_type")
                ->orderBy("evenements.event_kikoff",'desc')
                ->groupBy("evenements.id")
                ->get();
            return response()->json(['status' => 'ok', 'data' => $data]);
//            return response()->json(['status'=>'ok','data'=>Events::join("businesses","businesses.id","=","evenements.business_id")->where('evenements.business_id',$request->business_id)
//                ->selectRaw("evenements.*,businesses.name as business_name,businesses.business_type")->get()]);
        }
        if ($id == 0)
            return response()->json(['status' => 'ok', 'data' => Events::all()]);
        else
            return response()->json(['status' => 'ok', 'data' => Events::find($id)]);

    }

    public function active()
    {

        $data = DB::table('evenements')
            ->leftJoin("reservation", "reservation.event_id", "=", "evenements.id")
            ->join("businesses", "evenements.business_id", "=", "businesses.id")
            ->whereRaw('evenements.event_kikoff>="' . date("Y-m-d H:i:s") . '" AND evenements.status="approved"')
            ->selectRaw("evenements.*,(evenements.reservation_allowed - count(reservation.id)) as available_seat,count(reservation.id) as reserved_seat,businesses.name as business_name,businesses.business_type")
            ->orderBy("evenements.event_kikoff",'desc')
            ->groupBy("evenements.id")
            ->get();
        $resp = ['status' => 'ok','type' => 'events', 'data' => $data];
        if(count($data) == 0){
            $resp['type'] = 'businesses';
            $resp['data'] = Businesses::all();
        }
        return response()->json($resp);
    }

    public function byStatus(Request $request,$status)
    {
        $data = DB::table('evenements')
            ->leftJoin("reservation", "reservation.event_id", "=", "evenements.id")
            ->join("businesses", "evenements.business_id", "=", "businesses.id")
            ->whereRaw('evenements.status="' . $status . '"')
            ->selectRaw("evenements.*,(evenements.reservation_allowed - count(reservation.id)) as available_seat,count(reservation.id) as reserved_seat,businesses.name as business_name,businesses.business_type")
            ->orderBy("evenements.event_kikoff",'desc')
            ->groupBy("evenements.id")
            ->get();
        return response()->json(['status' => 'ok', 'data' => $data]);
    }

    public function changeStatus(Request $request, $id)
    {
        $users = Events::find($id);
        $users->status = $request->status;
        $users->save();
        return response()->json(['status' => 'ok', 'message' => 'Event has been '.$request->status.' successfully']);
    }

    public function reschedule(Request $request, $id)
    {
        $users = Events::find($id);
        $users->event_kikoff = $request->event_kikoff;
        $users->event_close = $request->event_close;
        $users->save();
        return response()->json(['status' => 'ok', 'message' => 'Event has been rescheduled successfully']);
    }
    public function update(Request $request, $id)
    {
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
        return response()->json(['status' => 'ok', 'message' => 'Event has been updated successfully']);
    }

    public function upload($file1, $file2, $file3)
    {
        $currentDir = getcwd();
//        return $currentDir;
        $uploadDirectory = $currentDir . "/uploads/";
//        $uploadDirectory = $currentDir;
//        $file1 = $request->file1;
//        $file2 = $request->file2;
//        $file3 = $request->file3;
//        file_put_contents("data",$file1);
//        return $currentDir;

        // Asua generate new images from android data
        $image1 = date("Ymdhis") . rand(100, 999999) . ".png";
        $image2 = date("Ymdhis") . rand(100, 999999) . ".png";
        $image3 = date("Ymdhis") . rand(100, 999999) . ".png";

//        Storage::disk('public/images',$image1,decode($file1));
//        Storage::disk('public/images',$image2,decode($file2));
//        Storage::disk('public/images',$image3,decode($file3));

        $image1Size = file_put_contents($uploadDirectory . $image1, base64_decode($file1));
        $image2Size = file_put_contents($uploadDirectory . $image2, base64_decode($file2));
        $image3Size = file_put_contents($uploadDirectory . $image3, base64_decode($file3));

        //parent::connect();
        return [$image1, $image2, $image3];
    }

}
