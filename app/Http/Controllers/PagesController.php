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
      $event = Event::orderBy('updated_at', 'DESC')->first();
      return view('pages.index', compact(['event']));
   }
}
