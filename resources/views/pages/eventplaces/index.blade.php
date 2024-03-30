@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Event Plase")
@section('content')


    <div class="bg-light p-4 rounded">
        <h2>Event Places</h2>
        <div class="lead">
            Manage your Event Place here.
            <a href="#" data-toggle="modal" data-target="#ModalCreate"
            class="btn btn-primary btn-sm float-right">{{ (__('svu.new')) }}</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="mt-2">
            @include('layouts.partials.messagesf')
        </div>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col" width="15%">{{__('svu.name')}}</th>
                <th scope="col" width="15%">{{__('svu.en_name')}}</th>
                <th scope="col" width="15%">{{__('svu.Sitting_plan')}}</th>
                <th scope="col" width="15%">{{__('svu.image')}}</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($eventplaces as $eventplace)
                    <tr>
                        <td>{{ $eventplace->name }}</td>
                        <td>{{ $eventplace->en_name	 }}</td>
                        <td>{{ $eventplace->Sitting_plan }}</td>
                        <td>
                        @if($eventplace->image)
                        <img src="/images/uploads/{{ $eventplace->image }}" width="50px" height="50px"/>
                        @else
                        <img src="/images/uploads/hall.png" width="50px" height="50px"/>
                        @endif
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#ModalShow{{ $eventplace->id }}" class="btn btn-info btn-sm">{{ __('svu.show') }}</a>
                            @include('pages.eventplaces.modal.show')
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#ModalEdit{{ $eventplace->id }}" class="btn btn-success btn-sm">{{ __('svu.edit') }}</a>
                            @include('pages.eventplaces.modal.edit')
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['eventplaces.destroy', $eventplace->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @include('pages.eventplaces.modal.create')



@endsection


