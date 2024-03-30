    <div class="modal fade text-left" id="ModalShow{{ $event->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.show_event') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">
                    <div class="bg-light p-4 rounded">
                        <h1>{{ ucfirst($event->title) }} Event</h1>
                        <div class="lead">

                        </div>

                        <div class="container mt-4">

                            <label scope="col" width="20%">{{__('svu.title')}}</label>: {{ $event->title }}</br>
                            <label scope="col" width="1%">{{__('svu.date')}}</label>: {{ $event->date }}</br>
                            <label scope="col" width="1%">{{__('svu.time')}}</label>: {{ $event->time }} </br>
                            <label scope="col" width="1%">{{__('svu.event_place')}}</label>: {{ $event->event_places->name}} </br>
                            <label scope="col" width="1%">{{__('svu.image1')}}</label>: <img src="/images/uploads/events/{{ $event->image1 }}" width="50px" height="50px"/></br>
                            <label scope="col" width="1%">{{__('svu.image2')}}</label>: <img src="/images/uploads/events/{{ $event->image2 }}" width="50px" height="50px"/></br>
                            <label scope="col" width="1%">{{__('svu.image3')}}</label>: <img src="/images/uploads/events/{{ $event->image3 }}" width="50px" height="50px"/></br>

                        </div>
                    <div class="mt-4">
                        <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
