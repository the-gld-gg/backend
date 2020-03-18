<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use \Validator;
use App\User;
use App\PasswordReset;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function reset(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'token' => 'required',
        ]);

        if ($validator->fails()) {
          return response()->json([
            'error' => true,
            'message' => 'error on payload',
            'data' => $validator->errors()
        ], 200);
        }
        $existence = PasswordReset::where('token', $request->token)
        ->where('created_at', '>', Carbon::now()->subHours(1)->toDateTimeString())
        ->where('used', 0)
        ->first();
        if ($existence){
            $user = User::where('email', $existence->email)->first();
            $user->update([
                'password' => Hash::make($request->password),
            ]);
            $existence->update([
                'used' => 1,
            ]);
            return response()->json([
                'status' => 'ok'
            ], 200);
        } else {
            return response()->json([
                'error' => true,
                'message' => 'not a valid token'
            ], 200);
        }

    }
}
