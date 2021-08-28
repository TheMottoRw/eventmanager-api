<?php

namespace App\Http\Controllers;

use App\Mail\NotifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendMail($recipientName,$recipient,$subject,$message) {

        Mail::to($recipient)->send(new NotifyMail($recipientName,$subject,$message));
        if(Mail::failures()){
            return "fail";//. json_encode(Mail::failures());
        }else {
            return "ok";
        }
    }
}
