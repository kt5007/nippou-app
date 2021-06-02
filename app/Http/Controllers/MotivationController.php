<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MotivationController extends Controller
{
    //
    public function index()
    {
        # code...
        return view('motivation.index');
    }
}
