<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\EventPlace;
use App\Models\Nickname;
use App\Models\Nicknames2;
use Illuminate\Http\Request;

class EventController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $events = Event::paginate(5);
    $event_places = EventPlace::all();

    return view('pages.events.index', ['events' => $events , 'event_places'=>$event_places]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('pages.events.create');

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
        'title'=>'required|unique:event,title',
        'date'=>'required|date',
        //'time'=>'required',
        'event_place'=>'required',
        'image1'=>'mimes:jpg,jpeg,png,bmp',
        'image2'=>'mimes:jpg,jpeg,png,bmp',
        'image3'=>'mimes:jpg,jpeg,png,bmp',

    ]);
    $imageName1 = '';
    if($request->file('image1')){
        if ($image = $request->file('image1')){
            $imageName1 =  $request->title.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/uploads/events', $imageName1);
        }
   }
   $imageName2 = '';
    if($request->file('image2')){
        if ($image = $request->file('image2')){
            $imageName2 =  $request->title.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/uploads/events', $imageName2);
        }
   }
   $imageName3 = '';
    if($request->file('image3')){
        if ($image = $request->file('image3')){
            $imageName3 =  $request->title.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/uploads/events', $imageName3);
        }
   }

    Event::create([
        'title'=>$request->title,
        'date'=>$request->date,
        //'time'=>$request->time,
        'event_place'=>$request->event_place,
        'image1'=>$imageName1,
        'image2'=>$imageName2,
        'image3'=>$imageName3,

    ]);
    return redirect()->route('events.index')
            ->withSuccess(__('Event created successfully.'));
  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit(Event $event)
  {
    return view('pages.events.edit', [
        'eventplace' => $event
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,Event $event)
  {
   // dd($event->id);

   $request->validate([
    'title'=>'required|unique:event,title,'.$event->id,
    'date'=>'required|date',
    //'time'=>'required',
    'event_place'=>'required',
    'image1'=>'mimes:jpg,jpeg,png,bmp',
    'image2'=>'mimes:jpg,jpeg,png,bmp',
    'image3'=>'mimes:jpg,jpeg,png,bmp',

]);
$imageName1 = '';
if($request->file('image1')){
    if ($image = $request->file('image1')){
        $imageName1 =  $request->title.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move('images/uploads/events', $imageName1);
    }
}else{
    $imageName1 = $event->image1;
}
$imageName2 = '';
if($request->file('image2')){
    if ($image = $request->file('image2')){
        $imageName2 =  $request->title.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move('images/uploads/events', $imageName2);
    }
}
else{
    $imageName2 = $event->image2;
}
$imageName3 = '';
if($request->file('image3')){
    if ($image = $request->file('image3')){
        $imageName3 =  $request->title.'-'.uniqid().'.'.$image->getClientOriginalExtension();
        $image->move('images/uploads/events', $imageName3);
    }
}else{
    $imageName3 = $event->image3;
}

$event->update([
    'title'=>$request->title,
    'date'=>$request->date,
    //'time'=>$request->time,
    'event_place'=>$request->event_place,
    'image1'=>$imageName1,
    'image2'=>$imageName2,
    'image3'=>$imageName3,

]);
    return redirect()->route('events.index')
            ->withSuccess(__('Event updated successfully.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Event $event)
  {
      $event->delete();

      return redirect()->route('events.index')
          ->withSuccess(__('Event deleted successfully.'));

  }

  public function inreg(Event $event){
    return view('pages.events.inreg', ['event' => $event ]);

  }
  public function outreg(Event $event){
    $nicknames=Nickname::all();
    $nicknames2=Nicknames2::all();
    return view('pages.invitations.outreg', ['event' => $event,'nicknames'=>$nicknames,'nicknames2'=>$nicknames2 ]);
  }


}

?>
