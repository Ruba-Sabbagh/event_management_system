@extends('layouts.pages_layout')
@section('pageTitle', isset($pageTitle) ? $pageTitle : __('svu.all_programs'))
@section('content')

    <div class="container">
        <div class="card">
            <div class="card-header">Manage Programs</div>
            <div class="card-body">
                {!! $dataTable->table() !!}

            </div>
        </div>
    </div>
@endsection

@push('scripts')

{!! $dataTable->scripts(attributes: ['type' => 'module']) !!}
@endpush
