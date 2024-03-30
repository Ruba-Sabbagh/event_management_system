@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Nicknames")
@section('content')


    <div class="bg-light p-4 rounded">
        <h2>Nicknames</h2>
        <div class="lead">
            Manage your nicknames here.
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
                <th scope="col">{{__('svu.lang')}}</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($nicknames as $nickname)
                    <tr>
                            <td>{{ $nickname->name }}</td>
                            <td>{{ $nickname->lang }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#ModalShow{{ $nickname->id }}" class="btn btn-info btn-sm">{{ __('svu.show') }}</a>
                                @include('pages.nicknames.modal.show')
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#ModalEdit{{ $nickname->id }}" class="btn btn-success btn-sm">{{ __('svu.edit') }}</a>
                                @include('pages.nicknames.modal.edit')
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['nicknames.destroy', $nickname->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $nicknames->links() }}
    </div>
    @include('pages.nicknames.modal.create')



@endsection


