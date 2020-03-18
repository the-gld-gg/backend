<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function index()
    {
        $info = (object)array();
        $info->version = '2.0.0';
        return response()->json(['info' => $info], 200);
    }

}
