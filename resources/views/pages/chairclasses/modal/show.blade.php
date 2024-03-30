    <div class="modal fade text-left" id="ModalShow{{ $cc->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.show_chairclass') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">
                    <div class="bg-light p-4 rounded">
                        <h1>{{ ucfirst($cc->name) }} Chairclass</h1>
                        <div class="lead">

                        </div>

                        <div class="container mt-4">

                            <label scope="col" width="20%">{{__('svu.name')}}</label>: {{ $cc->name }}</br>
                            <label scope="col" width="1%">{{__('svu.color')}}</label>:<div  style="width:15px;height:15px;background-color: {{ $cc->color }}" ></div></br>
                            <label scope="col" width="1%">{{__('svu.image')}}</label>: <img src="/images/uploads/chair/{{ $cc->img }}" width="50px" height="50px">

                        </div>

                    <div class="mt-4">
                        <a href="{{ route('chairclasses.index') }}" class="btn btn-default">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
