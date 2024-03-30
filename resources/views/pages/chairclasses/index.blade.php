@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Chairclasses")
@section('content')


    <div class="bg-light p-4 rounded">
        <h2>Chairclasses</h2>
        <div class="lead">
            Manage your chairclasses here.
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
                <th scope="col" width="15%">{{__('svu.color')}}</th>
                <th scope="col" width="15%">{{__('svu.image')}}</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($chairclass as $cc)
                    <tr>
                        <td>{{ $cc->name }}</td>
                        <td><div style="background-color:{{ $cc->color }}"></div></td>
                        <td><img src="/images/uploads/chair/{{ $cc->img }}" width="50px" height="50px"></td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#ModalShow{{ $cc->id }}" class="btn btn-info btn-sm">{{ __('svu.show') }}</a>
                            @include('pages.chairclasses.modal.show')
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#ModalEdit{{ $cc->id }}" class="btn btn-success btn-sm">{{ __('svu.edit') }}</a>
                            @include('pages.chairclasses.modal.edit')
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['chairclasses.destroy', $cc->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @include('pages.chairclasses.modal.create')



@endsection


