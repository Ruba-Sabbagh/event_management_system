    <div class="modal fade text-left" id="ModalShow{{ $eventplace->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.show_eventplace') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">
                    <div class="bg-light p-4 rounded">
                        <h1>{{ ucfirst($eventplace->name) }} Eventplase</h1>
                        <div class="lead">

                        </div>

                        <div class="container mt-4">

                            <label scope="col" width="20%">{{__('svu.name')}}</label>: {{ $eventplace->name }}</br>
                            <label scope="col" width="1%">{{__('svu.en_name')}}</label>: {{ $eventplace->en_name }}</br>
                            <label scope="col" width="1%">{{__('svu.Sitting_plan')}}</label>: {{ $eventplace->Sitting_plan }} {{ $eventplace->row_num."x".$eventplace->call_num }}</br>
                            @if($eventplace->image =="")
                            <label scope="col" width="1%">{{__('svu.image')}}</label>: <img src="/images/uploads/hall.png" width="50px" height="50px"/></br>
                            @else
                            <label scope="col" width="1%">{{__('svu.image')}}</label>: <img src="/images/uploads/{{ $eventplace->image }}" width="50px" height="50px"/></br>
                            @endif
                        </div>

                    </div>
                    <div class="mt-4">
                        <a href="{{ route('eventplaces.index') }}" class="btn btn-default">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
