<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PersoneelController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('personeel');
    }

    public function getUsers(){
        $users = DB::table('users')->get();

        return view('personeel', ['users' => $users]);
    }
}

