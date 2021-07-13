<?php

namespace App\Http\Controllers;

use App\Models\Home;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function Medewerkers()
    {
        $users = DB::table('users')->get();

        $homes = DB::table('homes')->get();

        return view('home', ['users' => $users, 'homes' => $homes]);
    }

    public function Inplannen(Request $request)
    {

        $tijden = new Home();

        $tijden->starttime = $request['starttime'];
        $tijden->endtime = $request['endtime'];
        $tijden->naam = $request['name'];

        $tijden->save();

        return redirect('/home');
    }
}
