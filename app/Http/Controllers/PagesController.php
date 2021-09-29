<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class PagesController extends Controller
{
   public function index()
   {
      $today_date = date("Y-m-d");
      $today_time = date("h:i");
      $events = Event::where('date', '>', $today_date)->where('time', '>', $today_time)->first();
      return view('pages.index', compact('events'));
   }
}
