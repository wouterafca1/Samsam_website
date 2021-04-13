<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersoneelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('Personeel');
    }
}

