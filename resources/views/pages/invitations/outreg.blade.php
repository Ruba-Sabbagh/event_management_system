@extends('layouts.invitation')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Event Out Register")
@section('content')


    <table style="width:100%;text-align: right">
        <tr>
            <td style=" text-align:center">
                 <img src="/images/uploads/events/{{ $event->image1 }}" width="500px" height="300px"/>
            </td>
        </tr>
        <tr>
            <td style=" background-color: cadetblue; text-align:center">
                <h3>{{ $event->title }}</h3>
            </td>
        </tr>
        <tr>
            <td>
                <div class="lead" style="padding: 10px 55px 10px 55px" >
                {{ __('svu.date').':' .$event->date }}</br>
                {{ __('svu.event_place').':' .$event->event_places->name }}
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">
                <h3  style="color:brown">{{ __('svu.registernow') }}</h3>
                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>
                <div class="mt-2">
                    @include('layouts.partials.messagesf')
                </div>
            </td>
        </tr>
        <tr>
            <td>
                <form action="{{ route('invitations.storeout',$event->id) }}" method="POST" enctype="multipart/form-data" style="padding: 55px ">
                    @csrf

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
                                    </div>


                                        <div class="mb-3">
                                            <label for="name" class="form-label">{{__('svu.name')}}</label>
                                            <input value="{{ old('name') }}"
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
                                            <input value="{{ old('email') }}"
                                                type="email"
                                                class="form-control"
                                                name="email"
                                                placeholder="Email" required>

                                            @if ($errors->has('email'))
                                                <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="mobile" class="form-label">{{__('svu.mobile')}}</label>
                                            <input value="{{ '+963'.old('mobile') }}"
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
                                            <input value="{{ old('orgnisation') }}"
                                                type="text"
                                                class="form-control"
                                                name="orgnisation"
                                                placeholder="Orgnisation" required>

                                            @if ($errors->has('orgnisation'))
                                                <span class="text-danger text-left">{{ $errors->first('orgnisation') }}</span>
                                            @endif
                                        </div>
                                        <div class="mb-3">
                                            <label for="position" class="form-label">{{__('svu.position')}}</label>
                                            <input value="{{ old('position') }}"
                                                type="text"
                                                class="form-control"
                                                name="position"
                                                placeholder="Position" required>

                                            @if ($errors->has('position'))
                                                <span class="text-danger text-left">{{ $errors->first('position') }}</span>
                                            @endif
                                        </div>
                                    <button type="submit" class="btn btn-primary">{{ __('svu.send') }}</button>


                </form>
            </td>
        </tr>
    </table>

@endsection
