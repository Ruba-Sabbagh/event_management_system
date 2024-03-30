<form action="{{ route('events.update', $event->id) }}" method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="modal fade text-left" id="ModalEdit{{ $event->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.edit_event') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="title" class="form-label">{{__('svu.title')}}</label>
                        <input value="{{ $event->title }}"
                            type="text"
                            class="form-control"
                            name="title"
                            placeholder="Title" required>

                        @if ($errors->has('title'))
                            <span class="text-danger text-left">{{ $errors->first('title') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="date" class="form-label">{{__('svu.date')}}</label>
                        {{ $event->date }}
                        <input value="{{ $event->date }}"
                            type="datetime-local"
                            class="form-control"
                            name="date"
                            placeholder="date"
                            pattern="\d{4}-\d{2}-\d{2}" required>

                        @if ($errors->has('date'))
                            <span class="text-danger text-left">{{ $errors->first('date') }}</span>
                        @endif
                    </div>
                    <!--<div class="mb-3">
                        <label for="time" class="form-label">{{__('svu.time')}}</label>
                        {{ $event->time}}
                        <input value="{{ $event->time}}"
                            type="time"
                            class="form-control"
                            name="time"
                            placeholder="time" required>

                        @if ($errors->has('time'))
                            <span class="text-danger text-left">{{ $errors->first('time') }}</span>
                        @endif
                    </div>-->

                    <div class="mb-3">
                        <label for="event_place" class="form-label">{{__('svu.event_place')}}</label>
                        <select class="form-control"
                            name="event_place" required>
                            @if($event->event_place) <option value="{{ $event->event_place }}">{{ $event->event_places->name}}</option>@endif
                            @foreach($event_places as $event_place)
                                @if($event_place->id != $event->event_place)
                                    <option value="{{ $event_place->id }}">{{ $event_place->name }}</option>
                                @endif
                            @endforeach
                        </select>

                        @if ($errors->has('event_place'))
                            <span class="text-danger text-left">{{ $errors->first('event_place') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="image1" class="form-label">{{__('svu.image1')}}</label>
                        <img src="/images/uploads/events/{{ $event->image1 }}" width="50px" height="50px"/>
                        <input type="file" name="image1" class="form-control" value="{{ $event->image1 }}">

                        @if ($errors->has('image1'))
                            <span class="text-danger text-left">{{ $errors->first('image1') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="image2" class="form-label">{{__('svu.image2')}}</label>
                        <img src="/images/uploads/events/{{ $event->image2 }}" width="50px" height="50px"/>
                        <input type="file" name="image2" class="form-control" value="{{ $event->image2}}">

                        @if ($errors->has('image2'))
                            <span class="text-danger text-left">{{ $errors->first('image2') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="image3" class="form-label">{{__('svu.image3')}}</label>
                        <img src="/images/uploads/events/{{ $event->image3 }}" width="50px" height="50px"/>
                        <input type="file" name="image3" class="form-control" value="{{ $event->image3 }}">

                        @if ($errors->has('image3'))
                            <span class="text-danger text-left">{{ $errors->first('image3') }}</span>
                        @endif
                    </div>


                <button type="submit" class="btn btn-primary">Save event</button>
                <a href="{{ route('events.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>
