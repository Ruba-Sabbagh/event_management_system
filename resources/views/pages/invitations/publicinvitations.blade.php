@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Public Invitations")
@section('content')




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



@endsection

@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}
@endpush
