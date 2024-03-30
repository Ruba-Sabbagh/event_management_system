@extends('layouts.pages_layout')

@section('content')


    <div class="bg-light p-4 rounded">
        <h1>Roles</h1>
        <div class="lead">
            Manage your roles here.
            <a href="#" data-toggle="modal" data-target="#ModalCreate"
            class="btn btn-primary btn-sm float-right">{{ (__('svu.new')) }}</a>
        </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="mt-2">
            @include('layouts.partials.messagesf')
        </div>

        <table class="table table-bordered">
          <tr>
             <th width="1%">No</th>
             <th>{{__('svu.name')}}</th>
             <th width="3%" colspan="3">Action</th>
          </tr>
            @foreach ($roles as $key => $role)
            <tr>
                <td>{{ $role->id }}</td>
                <td>{{ $role->name }}</td>
                <td>
                    <a class="btn btn-info btn-sm" href="#" data-toggle="modal" data-target="#ModalShow{{ $role->id }}">{{ __('svu.show') }}</a>
                    @include('roles.modal.show')
                </td>

                <td>
                    <a href="#" data-toggle="modal" data-target="#ModalEdit{{$role->id}}" class="btn btn-success btn-sm" >{{ __('svu.edit') }}</a>
                    @include('roles.modal.edit')
                </td>
                <td>
                    {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id],'style'=>'display:inline']) !!}
                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </td>

            </tr>

            @endforeach

        </table>

        <div class="d-flex">
            {!! $roles->links() !!}
        </div>
        @include('roles.modal.create')
    </div>
@endsection
