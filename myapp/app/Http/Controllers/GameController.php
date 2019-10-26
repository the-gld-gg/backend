<?php

namespace App\Http\Controllers;
use App\Game;
class GameController extends Controller
{
    public function list()
    {
        return Game::with('clubs')->paginate(15);
    }
    public function get($id)
    {
        $game = Game::where([
            'id' => $id
        ])->first();
        return $game;
    }
}
