<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use \Validator;
use App\User;
use App\PasswordReset;
use Mail;

class ForgotPasswordController extends Controller
{

    use SendsPasswordResetEmails;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function forgot(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required'
        ]);

        if ($validator->fails()) {
          return response()->json([
            'error' => true,
            'message' => 'error on payload',
            'data' => $validator->errors()
        ], 400);
        }

        $user = User::where('email',$request->email)->first();
        if ($user){
            $token = sha1(str_random(40));
            PasswordReset::create([
                'token' => $token,
                'used' => 0,
                'email' =>$request->email
            ]);
            Mail::send('emails.forgot', [
                'user' => $user,
                'token' => $token
            ], function ($m) use ($user) {
                $m->from('info@gld.com', 'GLD APP');
                $m->to($user->email, $user->name)->subject('Forgot Password');
            });
        }

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
