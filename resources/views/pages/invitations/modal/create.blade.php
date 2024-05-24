<form action="{{ route('invitations.store') }}"method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.add_new_invitation') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="event" class="form-label">{{__('svu.event')}}</label>
                        <select class="form-control"
                            name="event" required>

                            <option value="">Select Event</option>
                            @foreach($events as $event)
                            <option value="{{ $event->id }}">{{ $event->title }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('event'))
                            <span class="text-danger text-left">{{ $errors->first('event') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="nickname" class="form-label">{{__('svu.nikename1')}}</label>
                        <select class="form-control"
                            name="nickname" required>

                            <option value="">Select Nickname</option>
                            @foreach($nicknames as $nickname)
                            <option value="{{ $nickname->id }}">{{ $nickname->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('nickname'))
                            <span class="text-danger text-left">{{ $errors->first('nickname') }}</span>
                        @endif
                        <label for="nickname2" class="form-label">{{__('svu.nikename2')}}</label>
                        <select class="form-control"
                            name="nickname2" >

                            <option value="">Select Nickname</option>
                            @foreach($nicknames2 as $nickname2)
                            <option value="{{ $nickname2->id }}">{{ $nickname2->name }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('nickname2'))
                            <span class="text-danger text-left">{{ $errors->first('nickname2') }}</span>
                        @endif
                    </div>


                        <div class="mb-3">
                            <label for="name" class="form-label">{{__('svu.name')}}</label>
                            <input value=""
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif

                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{__('svu.email')}}</label>
                            <input value=""
                                type="email"
                                class="form-control"
                                name="email"
                                placeholder="Email" required>

                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                            <label for="additional_email" class="form-label">{{__('svu.additional_email')}}</label>
                            <input value=""
                                type="additional_email"
                                class="form-control"
                                name="additional_email"
                                placeholder="Email" >

                            @if ($errors->has('additional_email'))
                                <span class="text-danger text-left">{{ $errors->first('additional_email') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">{{__('svu.mobile')}}</label>
                            <input value=""
                                type="mobile"
                                class="form-control"
                                name="mobile"
                                placeholder="Mobile" required>

                            @if ($errors->has('mobile'))
                                <span class="text-danger text-left">{{ $errors->first('mobile') }}</span>
                            @endif
                            <label for="lang" class="form-label"><strong>{{ __('svu.lang') }}</strong></label>
                            <select class="form-control" name="lang">
                                <option value="en">En</option>
                                <option value="ar">Ar</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="orgnisation" class="form-label">{{__('svu.orgnisation')}}</label>
                            <input value=""
                                type="text"
                                class="form-control"
                                name="orgnisation"
                                placeholder="Orgnisation" required>

                            @if ($errors->has('orgnisation'))
                                <span class="text-danger text-left">{{ $errors->first('orgnisation') }}</span>
                            @endif
                            <label for="position" class="form-label">{{__('svu.position')}}</label>
                            <input value=""
                                type="text"
                                class="form-control"
                                name="position"
                                placeholder="Position" required>

                            @if ($errors->has('position'))
                                <span class="text-danger text-left">{{ $errors->first('position') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="class" class="form-label">{{__('svu.classes')}}</label>
                            <select class="form-control"
                                name="class" >

                                <option value="">Select class</option>
                                @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('class'))
                                <span class="text-danger text-left">{{ $errors->first('class') }}</span>
                            @endif
                            <label for="status" class="form-label">{{ __('svu.status') }}</label>
                                <select id="status" name="status" class="form-control form-control-sm">

                                    <option value="wait">{{ __('svu.wait') }}</option>
                                    <option value="confirmed">{{ __('svu.confirmed') }}</option>
                                    <option value="apology">{{ __('svu.apology') }}</option>
                                </select>
                                @if ($errors->has('status'))
                                <span class="text-danger text-left">{{ $errors->first('status') }}</span>
                                @endif
                        </div>

                        <div class="mb-3">
                            <label for="sendmail" class="form-label"><strong>{{ __('svu.sendmail') }}</strong></label>
                            <label class="switch">
                                <input type="checkbox" name="sendmail" checked>
                                <span class="slider round"></span>
                              </label>
                              <label for="sendwhatsapp" class="form-label"><strong>{{ __('svu.sendwhatsapp') }}</strong></label>
                              <label class="switch">
                                  <input type="checkbox" name="sendwhatsapp" checked>
                                  <span class="slider round"></span>
                                </label>
                            </div>

                            <div class="mb-3">
                            <label for="attendance" class="form-label"><strong>{{ __('svu.attendance') }}</strong></label>
                            <label class="switch">
                                <input type="checkbox" name="attendance" checked>
                                <span class="slider round"></span>
                              </label>

                        </div>


                        <button type="submit" class="btn btn-primary">Save invitation</button>
                        <a href="{{ route('invitations.publicinvitations') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>

</form>
