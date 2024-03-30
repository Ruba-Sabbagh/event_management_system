    <div class="modal fade text-left" id="ModalShow{{ $invitation->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.show_invitation') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">
                    <div class="bg-light p-4 rounded">
                        <h1>{{ ucfirst($invitation->name) }} Permission</h1>
                        <div class="lead">

                        </div>



                    </div>
                    <div class="mt-4">
                        <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
