<?php

namespace App\Http\Controllers;
use App\Club;
class ClubController extends Controller
{
    public function list()
    {
        return Club::with('games')->paginate(15);
    }
}
