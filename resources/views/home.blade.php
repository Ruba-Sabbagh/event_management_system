@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>
                <div class="card-body">
                    @auth
                        @if(Auth::user()->name)
                             {{ 'Your UserName Is:'. Auth::user()->name }}

                        @endif
                    @endauth
                    {{ __('svu.Welcome') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
