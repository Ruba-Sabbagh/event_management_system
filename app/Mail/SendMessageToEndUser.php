<?php
namespace App\Mail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
class SendMessageToEndUser extends Mailable
{
use Queueable, SerializesModels;
public $senderMessage = '';
public $name = '';
public $url = '';
public $mailData;
public $sub;
public $image;

public $invitation;
/**
* Create a new message instance.
*/
public function __construct( $name, $senderMessage,$mailData )
{
$this->name = $name;
$this->senderMessage = $senderMessage;
$this->mailData = $mailData;
$this->sub=$this->mailData['sub'];
$this->image=$this->mailData['image'];
$this->invitation=$this->mailData['invitation'];

}
/**
* Get the message envelope.
*/
public function envelope(): Envelope
{

return new Envelope(
subject: 'تسجيل الحضور على '.$this->sub,
);
}
/**
* Get the message content definition.
*/
public function content(): Content
{
    if($this->invitation->type=1){
        return (new Content)->markdown('pages.invitations.mail.outmessage', [
            'invitation' =>$this->invitation,
            'image' => $this->image,
        ]);
    }else{
        return (new Content)->markdown('pages.invitations.mail.inmessage', [
            'invitation' =>$this->invitation,
            'image' => $this->image,
        ]);
    }
}
/**
* Get the attachments for the message.
*
* @return array<int, \Illuminate\Mail\Mailables\Attachment>
*/
public function attachments(): array
{
return [];
}
}
