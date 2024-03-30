@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Chairs")
@section('content')

<div style="display: flex;">

    <form action="{{ route('chairs.store') }}" method="POST" enctype="multipart/form-data" style="width: 40%;
    background-color: azure;
    padding: 14px;">
        @csrf
        <div   >
            <div >
                <div >
                    <div class="modal-header">
                    <h5 class="modal-title">{{ __('svu.add_new_chair') }}</h5>

                    </div>

                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="event_place" class="form-label">{{__('svu.event_place')}}</label>
                            <select class="form-control"
                                name="event_place" required>
                                <option value="">Select event place</option>
                                @foreach($event_places as $event_place)
                                    <option value="{{ $event_place->id }}">{{ $event_place->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('event_place'))
                                <span class="text-danger text-left">{{ $errors->first('event_place') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="chairclass" class="form-label">{{__('svu.chairclass')}}</label>
                            <select class="form-control"
                                name="chairclass" required>
                                <option value="">Select chair class</option>
                                @foreach($chairclasses as $chairclass)
                                    <option value="{{ $chairclass->id }}">{{ $chairclass->name }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('chairclass'))
                                <span class="text-danger text-left">{{ $errors->first('chairclass') }}</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label for="firstcode" class="form-label">{{__('svu.firstcode')}}</label>
                            <select class="form-control"
                                name="firstcode" required>
                                <option value="">Select Code</option>
                                @foreach($firstcode as $code)
                                    <option value="{{ $code }}">{{ $code }}</option>
                                @endforeach
                            </select>

                            @if ($errors->has('firstcode'))
                                <span class="text-danger text-left">{{ $errors->first('firstcode') }}</span>
                            @endif
                        </div>
                        <div class="mb-3" >
                            <label for="first_number" class="form-label">{{__('svu.first_number')}}</label>
                            <input value="{{ old('first_number') }}"
                                type="number"
                                class="form-control"
                                name="first_number"
                                min="1" >

                            @if ($errors->has('first_number'))
                                <span class="text-danger text-left">{{ $errors->first('first_number') }}</span>
                            @endif
                        </div>
                        <div class="mb-3" >
                            <label for="chairs_count" class="form-label">{{__('svu.chairs_count')}}</label>
                            <input value="{{ old('chairs_count') }}"
                                type="number"
                                class="form-control"
                                name="chairs_count"
                                min="1" >

                            @if ($errors->has('chairs_count'))
                                <span class="text-danger text-left">{{ $errors->first('chairs_count') }}</span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary">{{ __('svu.generate_chairs') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </form>


    <div class="bg-light p-4 rounded" style=" width: 100%;">
        <h2>Chairs</h2>
        <div class="lead">
            Manage your chairs here.

        </div>
        <form action="{{ route('chairs.search') }}" method="GET">
            <select class="form-control"
                name="search" required>
                <option value="">Select event place</option>
                @foreach($event_places as $event_place)
                    <option value="{{ $event_place->id }}">{{ $event_place->name }}</option>
                @endforeach
            </select>
            <button type="submit" class="btn btn-success">Search</button>
        </form>
        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="mt-2">
            @include('layouts.partials.messagesf')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col"  width="5%">#</th>
                <th scope="col" width="15%">{{__('svu.code')}}</th>
                <th scope="col" width="15%">{{__('svu.class')}}</th>
                <th scope="col" width="15%">{{__('svu.event_place')}}</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>

                @foreach($chairs as $chair)
                    <tr>
                        <td>{{ $chair->id }}</td>
                        <td>{{ $chair->code }}</td>
                        <td><p style="color:{{ $chair->chairclasses->color }}">{{ $chair->chairclasses->name  }}</hp></td>
                        <td>{{ $chair->event_places->name }}</td>


                        <td>
                            <a href="#" data-toggle="modal" data-target="#ModalEdit{{ $chair->id }}" class="btn btn-success btn-sm">{{ __('svu.edit') }}</a>
                            @include('pages.chairs.modal.edit')
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['chairs.destroy', $chair->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $chairs->links() }}
    </div>
</div>
    @include('pages.chairs.modal.create')



@endsection


