@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "All Invitations")
@section('content')


<div class="bg-light p-4 rounded">
    <h2>ALL Invitations</h2>
    <div class="lead">
        Manage your Invitations here.
        <a href="#" data-toggle="modal" data-target="#ModalCreate"
        class="btn btn-primary btn-sm float-right">{{ (__('svu.new')) }}</a>
    </div>

        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="mt-2">
            @include('layouts.partials.messagesf')
        </div>
        <div class="card">
            <div class="card-header">Manage Invitations</div>
            @include('pages.invitations.modal.search')
            <div class="card-body">
                {{  $dataTable->table() }}
            </div>
        </div>


</div>
@include('pages.invitations.modal.create')

@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
