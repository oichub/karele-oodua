<?php

namespace App\Http\Controllers\admin;

use App\Event;
use App\DemoFile;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;

class AdminUpcomingEvent extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.events.index');
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
                'description' => 'required | string',
                'price' => 'required',
                'date' => 'required |date',
                'time' => 'required',
                'file' => 'required|file|mimes:jpeg,png'
            ],
            [
                'name.required' => 'Event\'s name is required',
                'name.string' => 'Inavlid name',
                'description.required' => "Event Short description is required",
                'price.required' => 'Event\'s price is required',
                'date.date' => 'Date is required',
                'time.required' => 'Time is required',
                'file.file' => 'It must be a valid file', 
                'file.mime' => 'Only PNG and Jpeg image format are allowed',
            ]
        );
        function createRandomPassword() {
            $chars = "0123456789012345678901234567890123456789";
            srand((double)microtime()*1000000);
            $i = 0;
            $pass = '' ;
            while ($i <= 5) {

                $num = rand() % 33;

                $tmp = substr($chars, $num, 1);

                $pass = $pass . $tmp;

                $i++;

            }
            return $pass;
        }
// end of random code
$input= $request->all();
if($file = $request->file('file'))
{
    $img = Image::make($request->file('file'))->resize(640, 426)->insert('images/logo/watermark.png','top-right', 50, 10);
    $extension = $file->getClientOriginalExtension();
    $files_name= str_replace(" ", "-", time(). "karele".$request->name.".".$extension);
    $img->save('images/events/'.$files_name);
    $photo= DemoFile::create(['name' => $files_name]);
   $file_id= $photo->id;
}
else{
    $file_id=null;
}
$slu=$request->name."-".createRandomPassword();
$slug= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $slu), '-'));
$post = new Event;
$post->name = $request->name; 
$post->price = $request->price;
$post->date = $request->date;
$post->description = $request->description;
$post->time = $request->time;
$post->demo_file_id = $file_id;
$post->slug = $slug;
$post->user_id =Auth::user()->id;
$post->save();
return redirect()->back()->with('success', 'Upcoming event has been added successfully');
 }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
