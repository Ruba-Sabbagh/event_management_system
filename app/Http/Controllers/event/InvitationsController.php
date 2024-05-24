<?php

namespace App\Http\Controllers\event;

use App\DataTables\AllInvitationsDataTable;
use App\DataTables\InvitationsDataTable;
use App\Http\Controllers\Controller;
use App\Http\Controllers\QRcodeGenerateController;
use App\Http\Requests\InInvitationsRequest;
use App\Http\Requests\OutInvitationsRequest;
use App\Mail\SendMail;
use App\Mail\SendMessageToEndUser;
use App\Models\Classes;
use App\Models\Event;
use App\Models\Invitation;
use App\Models\Nickname;
use App\Models\Nicknames2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Twilio\Rest\Client;

class InvitationsController extends Controller
{

  /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index(AllInvitationsDataTable $dataTable)
  {
    $events=Event::all();
    $nicknames=Nickname::all();
    $nicknames2=Nicknames2::all();
    $classes=Classes::all();
    return $dataTable->render('pages.invitations.index',['events'=>$events,'nicknames'=>$nicknames,'nicknames2'=>$nicknames2,'classes'=>$classes]);
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
    return view('pages.invitations.create');

  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store(InInvitationsRequest $request)
  {
    $request->validated();
    $att=0;
    if($request->attendance=="on") $att=1;
    //dd($request);
    $invitation=Invitation::create([
        'event_id'=>$request->event,
        'nickname'=>$request->nickname,
        'nickname2'=>$request->nickname2,
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'orgnisation'=>$request->orgnisation,
        'position'=>$request->position,
        'additional_email'=>$request->additional_email,
        'status'=>$request->status,
        'attendance'=>$att,
        'lang'=>$request->lang,

    ]);

    if(($request->sendmail=="on")&&($request->status!="wait")){
        $name = $request->name;
        $email = $request->email;
        $image=public_path('/images/uploads/events/'.$invitation->event->image1);
        //dd( $image);
        $mailData=[
            'sub' => $invitation->event->title,
            'image'=>$image,
            'invitation'=>$invitation,

        ];

        $message = "";
        /*$mailData = [
        'url' => 'https://mywebsite.com/',
        ];*/
        /*$send_mail = "sahincseiu@gmail.com";
        Mail::to($send_mail)->send(new SendMail($name, $email, $sub, $mess));*/
        //$senderMessage = "thanks for your message , we will reply you in later";
        Mail::to( $email)->send(new SendMessageToEndUser($name,$message ,$mailData));
        $message= "And Mail Send Successfully";

    }
    if($request->sendwhatsapp){
        $twilioSid = config('app.twilio_sid');
        $twilioToken = config('app.twilio_auth_token');
        $twilioWhatsAppNumber = config('app.twilio_whatsapp_number');
        $recipientNumber = 'RECIPIENT_PHONE_NUMBER'; // Replace with the recipient's phone number in WhatsApp format (e.g., "whatsapp:+1234567890")
        $message = "Hello from Event Management System 🚀";

        $twilio = new Client($twilioSid, $twilioToken);

        try {
            $twilio->messages->create(
                $recipientNumber,
                [
                    "from" => $twilioWhatsAppNumber,
                    "body" => $message,
                ]
            );

            return response()->json(['message' => 'WhatsApp message sent successfully and Invitation Add successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
    return redirect()->route('invitations.index')->withSuccess(__('Invitation Add successfully.'));


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
  public function showqrcode(Invitation $invitation)
  {

    $qrCode=(new QRcodeGenerateController)->qrcode($invitation->id);
    return view('pages.invitations.qrcode',['qrcode'=>$qrCode,'invitation'=>$invitation]);
  }
  public function confirmedinv(Invitation $invitation){
    return view('pages.invitations.confirmedinv',['invitation'=>$invitation]);
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
  public function update(OutInvitationsRequest $request,Invitation $invitation,Event $event)
  {
    $request->validated();
    $att=0;
    if($request->attendance=="on") $att=1;
    $invitation->update([
        'nickname'=>$request->nickname,
        'nickname2'=>$request->nickname2,
        'class'=>$request->class,
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'orgnisation'=>$request->orgnisation,
        'position'=>$request->position,
        'status'=>$request->status,
        'attendance'=>$att,
    ]);
    $message="";
    if(($request->sendmail=="on")&&($request->status!="wait")){
        $name = $request->name;
        $email = $request->email;
        $image=public_path('/images/uploads/events/'.$invitation->event->image1);
        //dd( $image);
        $mailData=[
            'sub' => $invitation->event->title,
            'image'=>$image,
            'invitation'=>$invitation
        ];

        $message = "";
        /*$mailData = [
        'url' => 'https://mywebsite.com/',
        ];*/
        /*$send_mail = "sahincseiu@gmail.com";
        Mail::to($send_mail)->send(new SendMail($name, $email, $sub, $mess));*/
        //$senderMessage = "thanks for your message , we will reply you in later";
        Mail::to( $email)->send(new SendMessageToEndUser($name,$message ,$mailData));
        $message= "And Mail Send Successfully";

    }
        $twilioSid = config('app.twilio_sid');
        $twilioToken = config('app.twilio_auth_token');
        $twilioWhatsAppNumber = config('app.twilio_whatsapp_number');
        $recipientNumber = $request->mobile; // Replace with the recipient's phone number in WhatsApp format (e.g., "whatsapp:+1234567890")
        $message = "Hello from Event Management System 🚀";

        $twilio = new Client($twilioSid, $twilioToken);

        try {
            $twilio->messages->create(
                $recipientNumber,
                [
                    "from" => $twilioWhatsAppNumber,
                    "body" => $message,
                ]
            );

            return response()->json(['message' => 'WhatsApp message sent successfully and Invitation Add successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    return redirect()->route('invitations.index',['event' => $event])->withSuccess(__('Invitation Update successfully.'.$message));

  }
  public function updateattend(OutInvitationsRequest $request,Invitation $invitation){
    $invitation->update([
        'nickname'=>$request->nickname,
        'name'=>$request->name,
        'email'=>$request->email,
        'mobile'=>$request->mobile,
        'orgnisation'=>$request->orgnisation,
        'position'=>$request->position,
        'attendance'=>1,
    ]);
    $qrCode=(new QRcodeGenerateController)->qrcode($invitation->id);
    return view('pages.invitations.qrcode',['qrcode'=>$qrCode,'invitation'=>$invitation])->with(__('Invitation confirmed successfully.'));

  }
  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy(Invitation $invitation)
  {
      $invitation->delete();

      return redirect()->route('invitation.index')
          ->withSuccess(__('invitation deleted successfully.'));
  }

}

?>
