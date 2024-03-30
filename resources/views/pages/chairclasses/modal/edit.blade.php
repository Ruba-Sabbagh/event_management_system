<form action="{{ route('chairclasses.update', $cc->id) }}" method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="modal fade text-left" id="ModalEdit{{ $cc->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.edit_chairclass') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">{{__('svu.name')}}</label>
                    <input value="{{ $cc->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="color" class="form-label">{{__('svu.color')}}</label>
                    <input value="{{ $cc->color }}"
                        type="color"
                        class="form-control"
                        name="color"
                        placeholder="color" required>

                    @if ($errors->has('color'))
                        <span class="text-danger text-left">{{ $errors->first('color') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="img" class="form-label">{{__('svu.image')}}</label>
                    <input value="{{$cc->img }}"
                        type="file"
                        class="form-control"
                        name="img"
                        placeholder="img" required>

                    @if ($errors->has('img'))
                        <span class="text-danger text-left">{{ $errors->first('img') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save chairclass</button>
                <a href="{{ route('chairclasses.index') }}" class="btn btn-default">Back</a>
                </div>
            </div>
            </div>
        </div>
    </div>
</form>
