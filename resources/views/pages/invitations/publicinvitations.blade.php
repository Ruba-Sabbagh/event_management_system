@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Permissions")
@section('content')

@include('pages.invitations.modal.search')


        <div class="mt-2">
            @include('layouts.partials.messages')
        </div>
        <div class="mt-2">
            @include('layouts.partials.messagesf')
        </div>

        <div class="card">
            <div class="card-header">Manage Invitations</div>
            <div class="card-body">
                {{  $dataTable->table() }}
            </div>
        </div>



@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
