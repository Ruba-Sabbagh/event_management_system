
@if($status=='wait')
    <h6 class="btn btn-danger">{{  __('svu.wait') }}</h6>
@elseif($status=='confirmed')
    <h6 class="btn btn-success">{{  __('svu.confirmed') }}</h6>
@else
    <h6 class="btn btn-primary">{{  __('svu.apology') }}</h6>
@endif
