<form action="{{ route('invitationchairs.booking', $invitation->id) }}"method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalBookchair{{ $invitation->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.bookingchair') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">

                    <div class="mb-3">
                        <label for="chair" class="form-label">{{__('svu.chairs')}}</label>
                        <select class="form-control"
                            name="chair" >

                            <option value="">Select Chair</option>
                            @foreach($chairs as $ch)
                            <option value="{{ $ch->id }}">{{ $ch->code }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('chair'))
                            <span class="text-danger text-left">{{ $errors->first('chair') }}</span>
                        @endif
                    </div>

                        <button type="submit" class="btn btn-primary">Booking Chair</button>
                        <a href="{{ route('invitations.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
        </div>
    </div>

</form>
