<?php

namespace App\Http\Controllers\admin;

use App\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminUpcomingEvent extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::orderBy('id', 'desc')->get();
        return view('admin.events.index', compact(['events']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.events.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(
            $request,
            [
                'name' => 'required | string',
                'url' => 'required',
                'date' => 'required |date',
                'time' => 'required',
                'chat' => 'required',

            ],
            [
                'name.required' => 'Event\'s title is required',
                'name.string' => 'Inavlid title',
                'chat.required' => 'Chat is required',
                'url.required' => "Event\s url is required",
                'date.date' => 'Date is required',
                'time.required' => 'Time is required',
            ]
        );
        function createRandomPassword()
        {
            $chars = "0123456789012345678901234567890123456789";
            srand((float)microtime() * 1000000);
            $i = 0;
            $pass = '';
            while ($i <= 5) {

                $num = rand() % 33;

                $tmp = substr($chars, $num, 1);

                $pass = $pass . $tmp;

                $i++;
            }
            return $pass;
        }
        // end of random code
        $slu = $request->name . "-" . createRandomPassword();
        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slu), '-'));
        $post = new Event;
        $post->title = $request->name;
        $post->chat = $request->chat;
        $post->date = $request->date;
        $post->url = $request->url;
        $post->time = $request->time;
        $post->slug = $slug;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->back()->with('success', 'Upcoming event has been added successfully');
    }
    public function update(Request $request)
    {
        Event::where('slug', $request->slug)
            ->update([
                'name' => $request->name,
                'embeded' => $request->embeded, 'chat' => $request->chat,
                'date' => $request->date, 'time' => $request->time
            ]);
        return redirect()->back()->with('success', "Event has been updated succefully");
    }

    public function destroy(Request $request)
    {
        Event::where('id', $request->id)->delete();
        return redirect()->back()->with('success', "Event has been updated succefully");
    }
}
