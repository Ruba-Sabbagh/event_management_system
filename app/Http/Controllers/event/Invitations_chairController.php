<?php

namespace App\Http\Controllers\event;

use App\Http\Controllers\Controller;
use App\Models\Invitation;
use App\Models\InvitationsChair;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Invitations_chairController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {

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
  public function booking(Request $request,Invitation $invitation)
  {
    $chair=$request->chair;
    $chbooking=false;
    /*$chairbooking=InvitationsChair::where('chair_id','=',$chair)->where('status','=',1)->get();
    foreach($chairbooking as $cb){
        if($cb->invitation->event_id==$invitation->event_id){
            $chbooking=true;
            break;
        }
    }*/

    //if($chbooking==false){
        DB::beginTransaction();

        try {
            $invchairbooking=InvitationsChair::where('invitation_id','=',$invitation->id)->where('status','=',1)->update([
                'status'=>0,
            ]);

            InvitationsChair::create([
                'invitation_id'=>$invitation->id,
                'chair_id'=>$chair,
                'status'=>1,
                'user_id'=>Auth::user()->id
            ]);


            DB::commit();
            // all good
        } catch (\Exception $e) {
            DB::rollback();
            // something went wrong
        }
            return redirect()->route('invitations.index')
              ->withSuccess(__('Chair Booking successfully.'));
    /*}else{
        return redirect()->route('invitations.index')
              ->withErrors(__('Chair is Booking in this Event .'));
    }*/

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
