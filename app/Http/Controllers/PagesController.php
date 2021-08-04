<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function index()
   {
    $today_date= date("Y-m-d");
    $today_time = date("h:i a");
    $events = Event::with('demo_file')->where('date', '>', $today_date )->where('time', '>', $today_time)->orderBy('id', 'DESC')->paginate(3);
     return view('pages.index', compact('events'));
   }
}
