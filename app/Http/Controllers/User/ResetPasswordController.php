<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use App\ResetPassword;
use App\Mail\user\mailResetPassword;
use Str, Mail;

class ResetPasswordController extends Controller
{
    public function resetPasswordStep1(){
        return view('user.pages.reset_pass_step_1');
    }

    public function resetPasswordStep1Post(Request $request){
        $result = User::where('email', $request->email)->first();
    	if($result && ($result->permision == '2'||$result->permision == '1')){
    		$resetPassword = ResetPassword::firstOrCreate(['email'=>$request->email, 'token'=>Str::random(60)]);
            $token = ResetPassword::where('email', $request->email)->first()->token;
            
            Mail::to($request->email)->send(new mailResetPassword($token,$result));
            return view('user.pages.reset_pass_step_2'); 
    	}else {
            return redirect()->back()->with(['checkUser'=>'fail','massage'=>'Email không có trong hệ thống, vui lòng kiểm tra lại']);
        }
    }

    public function resetPasswordStep2(Request $request){
        $result = ResetPassword::where('token', $request->token)->first();
    	$token = $result->token;
    	if($result){
    		return view('user.pages.reset_pass_step_3', compact('token'));
    	} else {
    		echo 'This link is expired';
        }
    }
    
    public function resetPasswordStep2Post(Request $request){
        if($request->pass_new == $request->confirm_pass_new){
    		// Check email with token
    		$result = ResetPassword::where('token', $request->token)->first();

    		// Update new password 
    		User::where('email', $result->email)->update(['password'=>bcrypt($request->confirm_pass_new)]);

    		// Delete token
    		ResetPassword::where('token', $request->token)->delete();

    		return redirect()->route('userHomePage');
    	} else {
    		return redirect()->back()->with(['resetPass'=>'fail','massage'=>'Đổi mật khẩu không thành công']);
        }
    }
    
}
