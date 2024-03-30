@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Classes")
@section('content')


    <div class="bg-light p-4 rounded">
        <h2>{{ __('svu.classes') }}</h2>
        <div class="lead">
            Manage the Invitetion Classes here.
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
                <th scope="col">{{ __('svu.color') }}</th>
                <th scope="col" width="15%">{{ __('svu.name') }}</th>
                <th scope="col" width="15%">{{ __('svu.lang') }}</th>
                <th scope="col" colspan="3" width="1%"></th>
            </tr>
            </thead>
            <tbody>
                @foreach($classes as $class)
                    <tr>

                            <td><div style="width:15px;height:15px;background-color:{{ $class->color }}"></div></td>
                            <td>{{ $class->name }}</td>
                            <td>{{ $class->lang }}</td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#ModalShow{{ $class->id }}" class="btn btn-info btn-sm">{{ __('svu.show') }}</a>
                                @include('pages.classes.modal.show')
                            </td>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#ModalEdit{{ $class->id }}" class="btn btn-success btn-sm">{{ __('svu.edit') }}</a>
                                @include('pages.classes.modal.edit')
                            </td>
                            <td>
                                {!! Form::open(['method' => 'DELETE','route' => ['classes.destroy', $class->id],'style'=>'display:inline']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                {!! Form::close() !!}
                            </td>





                    </tr>
                @endforeach
            </tbody>

        </table>
        {{ $classes->links() }}

    </div>
    @include('pages.classes.modal.create')



@endsection


