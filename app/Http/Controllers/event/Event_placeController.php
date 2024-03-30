<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\EventPlace;
use Illuminate\Http\Request;

class Event_placeController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $eventplaces = EventPlace::paginate(5);

    return view('pages.eventplaces.index', ['eventplaces' => $eventplaces]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return view('pages.eventplaces.create');

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {
    $request->validate([
        'name'=>'required|unique:event_place,name',
        'en_name'=>'required|string',
        'Sitting_plan'=>'required',
        'image'=>'mimes:jpg,jpeg,png,bmp',
    ]);
    $imageName = '';
    if($request->file('image')){
        if ($image = $request->file('image')){
            $imageName =  $request->en_name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/uploads', $imageName);
        }
   }
   $call=0;
   $row=0;
   if($request->call_num && $request->row_num){
    $call=$request->call_num;
    $row=$request->row_num;
   }
    EventPlace::create([
        'name'=>$request->name,
        'en_name'=>$request->en_name,
        'Sitting_plan'=>$request->Sitting_plan,
        'call_num'=>$call,
        'row_num'=>$row,
        'image'=>$imageName,
    ]);
    return redirect()->route('eventplaces.index')
            ->withSuccess(__('Eventplaces created successfully.'));
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
  public function edit(EventPlace $eventplace)
  {
    return view('pages.eventplaces.edit', [
        'eventplace' => $eventplace
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update(Request $request,EventPlace $eventplace)
  {
   // dd($eventplace->id);

    $request->validate([
        'name' => 'required|unique:event_place,name,'.$eventplace->id,
        'en_name'=>'required|string',
        'Sitting_plan'=>'required',
        'image'=>'mimes:jpg,jpeg,png,bmp',
    ]);
    $imageName = '';
    if($request->file('image')){
        $imageName = '';
        if ($image = $request->file('image')){
            $imageName =  $request->en_name.'-'.uniqid().'.'.$image->getClientOriginalExtension();
            $image->move('images/uploads', $imageName);
        }
   }else{
    $imageName= $eventplace->image;
   }
   $call=0;
   $row=0;
   if(($request->call_num) && ($request->row_num) && ($request->Sitting_plan=='call_row')){
    $call=$request->call_num;
    $row=$request->row_num;
   }elseif($request->Sitting_plan=='cercle'){
    $call=0;
     $row=0;
   }
    $eventplace->update([
        'name'=>$request->name,
        'en_name'=>$request->en_name,
        'Sitting_plan'=>$request->Sitting_plan,
        'call_num'=>$call,
        'row_num'=>$row,
        'image'=>$imageName,
    ]);
    return redirect()->route('eventplaces.index')
            ->withSuccess(__('Eventplace updated successfully.'));
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(EventPlace $eventplace)
  {
      $eventplace->delete();

      return redirect()->route('eventplaces.index')
          ->withSuccess(__('Eventplace deleted successfully.'));

  }

}

?>
