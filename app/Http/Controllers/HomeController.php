<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

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
        $today= strtotime("today");
        $event_times = Event::get();
        foreach ($event_times as $event_time) {
           return $event_time->name;
        }

        // $evnts= Event::with('demo_file')->get();
        // return view('pages.index');
    }
}
