<?php

namespace App\Http\Controllers\event;

use App\DataTables\InvitationsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\OutInvitationsRequest;
use App\Models\Event;
use App\Models\Invitation;
use Illuminate\Http\Request;

class InvitationsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

  }
  public function publicinvitations (InvitationsDataTable $dataTable)
  {
    $events=Event::all();
      return $dataTable->render('pages.invitations.publicinvitations',['events'=>$events]);

  }
  public function outregpage(Event $event){
    return view('pages.invitations.outregpage',['event'=>$event]);
  }
  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(Request $request)
  {

  }

  public function storeout(OutInvitationsRequest $request,Event $event)
  {
    $request->validated();
    $inv=Invitation::create([
        'event_id'=>$event->id,
        'nickname'=>$request->nickname,
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'orgnisation'=>$request->orgnisation,
        'position'=>$request->position,
        'type'=>1,
    ]);
    return redirect()->route('invitations.outregpage',['event' => $event])->withSuccess(__('Invitation Send successfully.'));

  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {

  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {

  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {

  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {

  }

}

?>
