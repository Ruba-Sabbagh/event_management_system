<form action="{{ route('eventplaces.update', $eventplace->id) }}" method="POST" enctype="multipart/form-data">
    @method('patch')
    @csrf
    <div class="modal fade text-left" id="ModalEdit{{ $eventplace->id }}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">{{ __('svu.edit_eventplace') }}</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>

                </div>
                <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">{{__('svu.name')}}</label>
                    <input value="{{ $eventplace->name }}"
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
                    <input value="{{ $eventplace->en_name }}"
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
                        name="Sitting_plan" id="Sitting_plan_edit{{  $eventplace->id }}" onchange="changestyle(this.value,'{{ $eventplace->id }}')" required>
                        @if($eventplace->Sitting_plan=="cercle")
                        <option value="{{ $eventplace->Sitting_plan }}">{{__('svu.'.$eventplace->Sitting_plan)}}</option>
                        <option value="call_row">{{__('svu.call_row')}}</option>
                        @else
                        <option value="{{ $eventplace->Sitting_plan }}">{{__('svu.'.$eventplace->Sitting_plan)}}</option>
                        <option value="cercle">{{__('svu.cercle')}}</option>
                        @endif


                    </select>

                    @if ($errors->has('Sitting_plan'))
                        <span class="text-danger text-left">{{ $errors->first('Sitting_plan') }}</span>
                    @endif
                </div>
                <div class="mb-3" id="call_num_e{{ $eventplace->id }}" style="display: none">
                    <label for="call_num" class="form-label">{{__('svu.call_num')}}</label>
                    <input value="{{ $eventplace->call_num }}"
                        type="number"
                        class="form-control"
                        name="call_num"
                        min="1" >

                    @if ($errors->has('call_num'))
                        <span class="text-danger text-left">{{ $errors->first('call_num') }}</span>
                    @endif
                </div>
                <div class="mb-3" id="row_num_e{{ $eventplace->id }}" style="display: none">
                    <label for="row_num" class="form-label">{{__('svu.row_num')}}</label>
                    <input value="{{$eventplace->row_num }}"
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
                    <input type="file" name="image" class="form-control" value="{{ $eventplace->image }}">

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
    </div>
</form>
<script>

if(document.getElementById('Sitting_plan_edit'+{{ $eventplace->id }}).value=="call_row"){
    document.getElementById('row_num_e'+{{ $eventplace->id }}).style.display = 'inline-block';
    document.getElementById('call_num_e'+{{ $eventplace->id }}).style.display = 'inline-block';
}
    function changestyle (val,id){

        var style = val == 'call_row' ? 'inline-block' : 'none';
        //alert(val+id);
        document.getElementById('row_num_e'+id).style.display = style;
        document.getElementById('call_num_e'+id).style.display = style;
    }

</script>
