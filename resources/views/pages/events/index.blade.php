@extends('layouts.pages_layout')
@section('pageTitle',isset($pageTitle) ? $pageTitle : "Events")
@section('content')


    <div class="bg-light p-4 rounded">
        <h2>Events</h2>
        <div class="lead">
            Manage your events here.
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
                <th scope="col" width="15%"></th>
                <th scope="col" width="15%">{{__('svu.title')}}</th>
                <th scope="col" width="15%">{{__('svu.date')}}</th>
                <!--<th scope="col" width="15%">{{__('svu.time')}}</th>-->
                <th scope="col" width="15%">{{__('svu.event_place')}}</th>
                <!--<th scope="col" width="15%">{{__('svu.image1')}}</th>
                <th scope="col" width="15%">{{__('svu.image2')}}</th>
                <th scope="col" width="15%">{{__('svu.image3')}}</th>
                <th scope="col" colspan="3" width="1%"></th>-->
            </tr>
            </thead>
            <tbody>
                @foreach($events as $event)
                    <tr>
                        <td><button onclick="changestyle('{{ $event->id }}')"><i class="bi bi-plus-circle"></i></button></td>
                        <td>{{ $event->title }}</td>
                        <td>{{ $event->date }}</td>
                        <!--<td>{{ $event->time }}</td>-->
                        <td>{{ $event->event_places->name}}</td>
                    </tr>

                    <tr id="tr{{$event->id }}" style="display: none; padding-left: 100%">
                    <td>
                        @if($event->image1)
                        <img src="/images/uploads/events/{{ $event->image1 }}" width="50px" height="50px"/>
                        @else
                        <img src="/images/uploads/hall.png" width="50px" height="50px"/>
                        @endif
                    </td>
                    <td>
                        @if($event->image2)
                        <img src="/images/uploads/events/{{ $event->image2 }}" width="50px" height="50px"/>
                        @else
                        <img src="/images/uploads/hall.png" width="50px" height="50px"/>
                        @endif
                    </td>
                    <td>
                        @if($event->image3)
                        <img src="/images/uploads/events/{{ $event->image3 }}" width="50px" height="50px"/>
                        @else
                        <img src="/images/uploads/hall.png" width="50px" height="50px"/>
                        @endif
                    </td>
                    <td >
                        <a href="#" data-toggle="modal" data-target="#ModalShow{{ $event->id }}" class="btn btn-info btn-sm"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0"/>
                            <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8m8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7"/>
                          </svg></a>
                        @include('pages.events.modal.show')
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#ModalEdit{{ $event->id }}" class="btn btn-success btn-sm"><span class="bi bi-pencil-square"></span></a>
                        @include('pages.events.modal.edit')
                    </td>
                    <td>
                        <a href="{{ route('events.inreg', ['event'=> $event->id ]) }}"  ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
                            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4"/>
                            <path d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z"/>
                          </svg></a>
                    </td>
                    <td>
                        <a href="{{ route('events.outreg', ['event'=> $event->id]) }}" ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                          </svg></a>
                    </td>
                    <td>
                        {!! Form::open(['method' => 'DELETE','route' => ['events.destroy', $event->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('x', ['class' => 'btn btn-danger btn-sm'],'') !!}
                        {!! Form::close() !!}
                    </td>
                    </tr>

                @endforeach
            </tbody>
        </table>

    </div>
    @include('pages.events.modal.create')



@endsection

<script>
    function changestyle (id){
        //alert(id);
        if(document.getElementById('tr'+id).style.display=='none'){
            document.getElementById('tr'+id).style.display='inline';
        }else{
            document.getElementById('tr'+id).style.display='none';

        }
    }
</script>
