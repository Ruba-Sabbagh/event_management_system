<html>
    <x-phead></x-phead>
    <body>

        <div style="border: 1px solid;    text-align: center;        ">
            <img  src="/images/uploads/events/{{ $invitation->event->image1 }}" />


                <p style="text-align: center"><h1>{{$invitation->nickname1->name .": ". $invitation->name}} </h1>
                </br>نشكر لكم دعمكم ونسعد بحضوركم ضمن {{ $invitation->event->title }}
                </br>لتأكيد حضوركم يرجى التحقق من صحة البيانات:
            </p>
            <form action="{{ route('invitations.updateattend',$invitation->id) }}">
                    <div class="mb-3">
                        <label for="nickname" class="form-label">{{__('svu.nikename1')}}</label>
                        <select class="form-control"
                            name="nickname" required>
                            @if($invitation->nickname){
                                <option value="{{ $invitation->nickname }}">{{ $invitation->nickname1->name }}</option>
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

                        <label for="name" class="form-label">{{__('svu.name')}}</label>
                        <input value="{{ $invitation->name }}"
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
                    <button type="submit" class="btn btn-primary">Confirm</button>
            </form>


        </div>
    </body>

</html>
