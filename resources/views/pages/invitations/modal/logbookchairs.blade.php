<div class="modal fade text-left" id="ModalLogBookchairs{{ $invitation->id }}" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">{{ __('svu.show_invitation') }}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            </div>

            <div class="modal-body">
                <div class="bg-light p-4 rounded">
                    <h1>{{ ucfirst($invitation->name) }} invitation</h1>
                    <div class="lead">

                    </div>

                    <div class="container mt-4">
                        <table>
                            <tr>
                                <td>{{ __('svu.date') }}</td>
                                <td>{{ __('svu.chair') }}</td>
                                <td>{{ __('svu.user') }}</td>
                                <td>{{ __('svu.employee') }}</td>
                                <td>{{ __('svu.chairstatus') }}</td>
                            </tr>
                        @foreach ($invitation->chairs as $ch )
                        <tr>
                                <td>{{ $ch->created_at}}</td>
                                <td>{{$ch->code }}</td>
                                <td>{{$invitation->name}}</td>
                                <td>{{ $ch->pivot['users.name'] }}</td>
                                @if ($ch->pivot->status==1)
                                <td>{{ _('svu.booking') }}</td>
                                @endif
                        </tr>
                        @endforeach
                        </table>
                    </div>

                <div class="mt-4">
                    <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                </div>

            </div>
        </div>
        </div>
    </div>
</div>
