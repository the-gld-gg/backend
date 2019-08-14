<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function details()
    {
        $user = auth()->user();
        return response()->json(['user' => $user], 200);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $user->update($request->all());

        return $user;
    }
}
