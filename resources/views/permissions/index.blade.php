@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Permissions")
@section('content')


    <div class="bg-light p-4 rounded">
        <h2>Permissions</h2>
        <div class="lead">
            Manage your permissions here.
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
                <th scope="col">Guard</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($permissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#ModalShow{{ $permission->id }}" class="btn btn-info btn-sm">{{ __('svu.show') }}</a>
                            @include('permissions.modal.show')
                        </td>
                        <td>
                            <a href="#" data-toggle="modal" data-target="#ModalEdit{{ $permission->id }}" class="btn btn-success btn-sm">{{ __('svu.edit') }}</a>
                            @include('permissions.modal.edit')
                        </td>
                        <td>
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                            {!! Form::close() !!}
                        </td>


                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
    @include('permissions.modal.create')



@endsection


