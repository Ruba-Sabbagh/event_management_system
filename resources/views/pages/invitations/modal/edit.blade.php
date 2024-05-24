<form action="{{ route('invitations.update', $invitation->id) }}"method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="modal fade text-left" id="ModalEdit{{ $invitation->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.edit_invitation') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="nickname" class="form-label">{{__('svu.nikename1')}}</label>
                        <select class="form-control"
                            name="nickname" required>
                            @if($invitation->nickname1){
                                <option value="{{ $invitation->nickname1->id }}">{{ $invitation->nickname1->name }}</option>
                            }
                            @endif
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
                            @if($invitation->nicknames2){
                                <option value="{{ $invitation->nicknames2->id }}">{{ $invitation->nicknames2->name }}</option>
                            }
                            @endif
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
                            <input value="{{ $invitation->name }}"
                                type="text"
                                class="form-control"
                                name="name"
                                placeholder="Name" required>

                            @if ($errors->has('name'))
                                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                            @endif
                            <label for="name" class="form-label">{{__('svu.qrcode')}}</label>
                            <input value="{{ $invitation->id }}"
                                type="text"
                                class="form-control"
                                name="qrcode"
                                placeholder="qrcode" disabled>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{__('svu.email')}}</label>
                            <input value="{{ $invitation->email }}"
                                type="email"
                                class="form-control"
                                name="email"
                                placeholder="Email" required>

                            @if ($errors->has('email'))
                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                            @endif
                            <label for="mobile" class="form-label">{{__('svu.mobile')}}</label>
                            <input value="{{ $invitation->mobile}}"
                                type="mobile"
                                class="form-control"
                                name="mobile"
                                placeholder="Mobile" required>

                            @if ($errors->has('mobile'))
                                <span class="text-danger text-left">{{ $errors->first('mobile') }}</span>
                            @endif
                        </div>

                        <div class="mb-3">
                            <label for="orgnisation" class="form-label">{{__('svu.orgnisation')}}</label>
                            <input value="{{ $invitation->orgnisation }}"
                                type="text"
                                class="form-control"
                                name="orgnisation"
                                placeholder="Orgnisation" required>

                            @if ($errors->has('orgnisation'))
                                <span class="text-danger text-left">{{ $errors->first('orgnisation') }}</span>
                            @endif
                            <label for="position" class="form-label">{{__('svu.position')}}</label>
                            <input value="{{ $invitation->position }}"
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
                                @if($invitation->class){
                                    <option value="{{ $invitation->class }}">{{ $invitation->classes->name }}</option>
                                }
                                @endif
                                <option value="">Select class</option>
                                @foreach($classes as $class)
                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('class'))
                                <span class="text-danger text-left">{{ $errors->first('class') }}</span>
                            @endif
                            <label for="status" class="form-label"><strong>{{ __('svu.status') }}</strong></label>
                                <select id="status" name="status" class="form-control form-control-sm">
                                    @if($invitation->status){
                                        <option value="{{ $invitation->status }}">{{ __('svu.'.$invitation->status) }}</option>
                                    }
                                    @endif
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
