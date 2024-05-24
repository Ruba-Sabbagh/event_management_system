<html>
    <head>
    <x-phead></x-phead>
    </head>
    <body>
        <div style="border: 1px solid;    text-align: center;  ">

            <img src="{{ $message->embed(public_path() . '/images/uploads/events/'.$invitation->event->image1) }}" >
            <div>

                <p style="text-align: center"><h1 style="text-align: center">{{$invitation->nickname1->name ." ". $invitation->name}} </h1>
                </br>تم تأكيد دعوتك لحضور {{ $invitation->event->title }}</p>
            </div>

            <a type="button" style="background-color: red" href="{{ route('invitations.showqrcode',$invitation->id) }}">{{ __('svu.clickhear') }}</a>

        </div>

    </body>

</html>
