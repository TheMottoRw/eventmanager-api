<?php

namespace App\Http\Controllers;

use App\Models\Businesses;
use App\Models\ResetPassword;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ResetPasswordController extends Controller
{
    //
    public function create(Request $request){
        $name ="";$referenceId=0;$referenceType="";
        $resetPwd = new ResetPassword();
        $email = $request->email;

        $date=date_create(date("Y-m-d H:i"));
        $expireDate = date_add($date,date_interval_create_from_date_string("1 hour"));

        $users = Users::where('email',$email)->get();
        if(count($users)>0) {
            $user = $users[0];
            $name = $user->name;
            $referenceId=$user->id;
            $referenceType="Standard";
        }else{
            $users = Businesses::where('email',$email)->get();
            if(count($users)>0) {
                $user = $users[0];
                $name = $user->name;
                $referenceType = "Business";
                $referenceId = $user->id;
            }
        }
        if($referenceId!=0 && $referenceType!=""){
            $generatedCode = $this->generateCode($referenceType);
            $resetPwd->reference_id = $referenceId;
            $resetPwd->reference_type = $referenceType;
            $resetPwd->code = $generatedCode;
            $resetPwd->expire_date = $expireDate;
            $resetPwd->save();
            echo json_encode(['status' => 'ok', 'data' => [],"id"=>$referenceId,"type"=>$referenceType]);

            if($resetPwd){
                if($name!="") {
                    $subject = "Reset password code";
                    $message = "Your reset password request verification code ".$generatedCode;
                    $mail = new MailController();
                    $mail->sendMail($name, $email, $subject, $message);
//                    return response()->json(['status' => 'ok', 'data' => [],"id"=>$referenceId,"type"=>$referenceType]);
                }else{
                    return response()->json(['status'=>'ok','data'=>[],'message'=>'Name not found']);
                }
            }else{
                return response()->json(['status'=>'fail','data'=>[],'message'=>'Code registration error '.$referenceId." - ".$referenceType."-"]);
            }
        }
            else
                return response()->json(['status'=>'fail','data'=>[],'message'=>'Email does not exist in our database
                ']);
    }
    public function generateCode($ref){
        return strtoupper(substr($ref,0,2)).rand(1000,9999);
    }
    public function verifyCode(Request $request){
        $type = "";$codeInfo = [0];
        if(substr($request->code,0,2) == "ST"){
            $type="Standard";
            $codeInfo = ResetPassword::join("users","users.id","=","reset_code.reference_id")
                        ->selectRaw("reset_code.reference_id,reset_code.reference_type,reset_code.code,reset_code.expire_date")
                ->where("reset_code.reference_id",$request->reference_id)->where("reset_code.reference_type",$request->reference_type)
                ->where('reset_code.code',$request->code)->where("reset_code.expire_date",">=","'".date("Y-m-d H:i")."'")
                            ->get();
        }else{
            $type="Business";
            $codeInfo = DB::table("reset_code")->join("businesses","businesses.id","=","reset_code.reference_id")
                ->select("reset_code.reference_id,reset_code.reference_type,reset_code.code,reset_code.expire_date")
                ->where('reset_code.code',"'".$request->code."'")->where("reset_code.expire_date",">=","'".date("Y-m-d H:i")."'")
                ->get();
        }

        if(count($codeInfo)>0){
            return response()->json(['status'=>'ok','id'=>$codeInfo[0]->reference_id,'type'=>$codeInfo[0]->reference_type]);
        }else{
            return response()->json(['status'=>'fail']);
        }
    }
    public function resetPassword(Request $request,$id){
        $user = [];
        if($request->reference_type=="Standard"){
            $user = Users::find($id);
        }else{
            $user = Businesses::find($id);
        }
        $user->password = Hash::make($request->password);
        if($user->save()){
            return response()->json(['status'=>'ok','user'=>$user]);
        }else{
            return response()->json(['status'=>'fail']);
        }
    }

}
