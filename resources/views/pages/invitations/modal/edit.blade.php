<form action="{{ route('invitations.update', $invitation->id) }}" method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="modal fade text-left" id="ModalEdit{{ $invitation->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.edit_invitation') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">{{__('svu.name')}}</label>
                    <input value="{{ $invitation->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save invitation</button>
                <a href="{{ route('invitations.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>
