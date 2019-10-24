<?php

namespace App\Http\Controllers;
use App\Game;
class GameController extends Controller
{
    public function list()
    {
        return Game::paginate(15);
    }
}
