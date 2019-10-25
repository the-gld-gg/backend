<?php

namespace App\Http\Controllers;
use App\Club;
use App\ClubUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClubController extends Controller
{
    public function list()
    {
        return Club::with('games')->paginate(15);
    }

    public function join(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'club_id' => 'required',
        ]);

        if ($validator->fails()) {
          return response()->json([
            'error' => true,
            'message' => 'error on payload',
            'data' => $validator->errors()
        ], 400);
        }
        $user = auth()->user();
        $clubUser = ClubUser::where([
            'user_id' => $user->id,
            'club_id' => $request->club_id
        ])->first();
        if (!$clubUser){
            ClubUser::create([
                'user_id' => $user->id,
                'club_id' => $request->club_id
            ]);
        }
        return response()->json([
            'status' => 'ok'
        ], 200);
    }

    public function leave(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'club_id' => 'required',
        ]);

        if ($validator->fails()) {
          return response()->json([
            'error' => true,
            'message' => 'error on payload',
            'data' => $validator->errors()
        ], 400);
        }
        $user = auth()->user();
        $clubUser = ClubUser::where([
            'user_id' => $user->id,
            'club_id' => $request->club_id
        ])->first();
        if ($clubUser){
            $clubUser->delete();
        }
        return response()->json([
            'status' => 'ok'
        ], 200);
    }

    public function get($id)
    {
        $club = Club::where([
            'id' => $id
        ])->first();
        return $club;
    }

    public function users($id)
    {
        $club = ClubUser::where([
            'club_id' => $id
        ])->with('user')->paginate();
        return $club;
    }
}
