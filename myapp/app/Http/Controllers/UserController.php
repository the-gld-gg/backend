<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use \Validator;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function details()
    {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
        ]);

        if ($validator->fails()) {
          return response()->json([
            'error' => true,
            'message' => 'error on payload',
            'data' => $validator->errors()
        ], 200);
        }
        $user = auth()->user();
        $updateArray = [];
        if ($request->name) {
            $updateArray['name'] = $request->name;
        }
        $user->update($updateArray);

        return $user;
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
        ]);

        if ($validator->fails()) {
          return response()->json([
            'error' => true,
            'message' => 'error on payload',
            'data' => $validator->errors()
        ], 200);
        }
        $user = auth()->user();
        $user->update([
            'password' => Hash::make($request->password),
        ]);

        return $user;
    }
}
