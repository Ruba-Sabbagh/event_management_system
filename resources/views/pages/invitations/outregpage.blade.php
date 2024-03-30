@extends('layouts.invitation')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Event Out Register")
@section('content')


    <table style="width:100%;text-align: right">
        <tr>
            <td style=" text-align:center">
                 <img src="/images/uploads/events/{{ $event->image1 }}" width="500px" height="300px"/>
            </td>
        </tr>
        <tr>
            <td style=" background-color: cadetblue; text-align:center">
                <h3>{{ $event->title }}</h3>
            </td>
        </tr>
        <tr>
            <td>
                <div class="lead" style="padding: 10px 55px 10px 55px" >
                {{ __('svu.date').':' .$event->date }}</br>
                {{ __('svu.event_place').':' .$event->event_places->name }}
                </div>
            </td>
        </tr>
        <tr>
            <td style="text-align: center;">

                <div class="mt-2">
                    @include('layouts.partials.messages')
                </div>
                <div class="mt-2">
                    @include('layouts.partials.messagesf')
                </div>
            </td>
        </tr>

    </table>

@endsection
