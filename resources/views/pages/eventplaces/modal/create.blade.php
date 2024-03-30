<form action="{{ route('eventplaces.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal fade text-left" id="ModalCreate" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.add_new_eventplace') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

                </div>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">{{__('svu.name')}}</label>
                        <input value="{{ old('name') }}"
                            type="text"
                            class="form-control"
                            name="name"
                            placeholder="Name" required>

                        @if ($errors->has('name'))
                            <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="en_name" class="form-label">{{__('svu.en_name')}}</label>
                        <input value="{{ old('en_name') }}"
                            type="text"
                            class="form-control"
                            name="en_name"
                            placeholder="En Name" required>

                        @if ($errors->has('en_name'))
                            <span class="text-danger text-left">{{ $errors->first('en_name') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="Sitting_plan" class="form-label">{{__('svu.Sitting_plan')}}</label>
                        <select class="form-control"
                            name="Sitting_plan" id="Sitting_plan" required>
                            <option value="cercle">{{__('svu.cercle')}}</option>
                            <option value="call_row">{{__('svu.call_row')}}</option>

                        </select>

                        @if ($errors->has('Sitting_plan'))
                            <span class="text-danger text-left">{{ $errors->first('Sitting_plan') }}</span>
                        @endif
                    </div>
                    <div class="mb-3" id="call_num" style="display: none">
                        <label for="call_num" class="form-label">{{__('svu.call_num')}}</label>
                        <input value="{{ old('call_num') }}"
                            type="number"
                            class="form-control"
                            name="call_num"
                            min="1" >

                        @if ($errors->has('call_num'))
                            <span class="text-danger text-left">{{ $errors->first('call_num') }}</span>
                        @endif
                    </div>
                    <div class="mb-3" id="row_num" style="display: none">
                        <label for="row_num" class="form-label">{{__('svu.row_num')}}</label>
                        <input value="{{ old('row_num') }}"
                            type="number"
                            class="form-control"
                            name="row_num"
                            min="1" >

                        @if ($errors->has('row_num'))
                            <span class="text-danger text-left">{{ $errors->first('row_num') }}</span>
                        @endif
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">{{__('svu.image')}}</label>
                        <input type="file" name="image" class="form-control" value="{{ old('image') }}">

                        @if ($errors->has('image'))
                            <span class="text-danger text-left">{{ $errors->first('image') }}</span>
                        @endif
                    </div>

                    <button type="submit" class="btn btn-primary">Save eventplace</button>
                    <a href="{{ route('eventplaces.index') }}" class="btn btn-default">Back</a>

                </div>
            </div>
        </div>
    </div>
</form>
<script>

    document.getElementById('Sitting_plan').addEventListener('change', function () {
        //alert(this.value+"c");
    var style = this.value == 'call_row' ? 'inline-block' : 'none';
    document.getElementById('row_num').style.display = style;
    document.getElementById('call_num').style.display = style;

});
</script>
