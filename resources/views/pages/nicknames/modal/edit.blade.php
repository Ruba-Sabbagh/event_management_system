<form action="{{ route('nicknames.update', $nickname->id) }}" method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="modal fade text-left" id="ModalEdit{{ $nickname->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.edit_nickname') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">{{__('svu.name')}}</label>
                    <input value="{{ $nickname->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="lang" class="form-label">{{__('svu.lang')}}</label>
                    <select class="form-control"
                            name="lang" required>
                            @if($nickname->lang=="ar")
                                <option value="{{ $nickname->lang }}">Arabic</option>
                                <option value="en">Englash</option>

                            @else
                            <option value="{{ $nickname->lang }}">Englash</option>
                            <option value="ar">Arabic</option>
                            @endif

                        </select>
                    @if ($errors->has('lang'))
                        <span class="text-danger text-left">{{ $errors->first('lang') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save nickname</button>
                <a href="{{ route('nicknames.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>
