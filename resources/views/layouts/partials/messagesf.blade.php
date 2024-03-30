@if(Session::get('errors', false))
    <?php $data = Session::get('errors'); ?>
    @if (is_array($data))
        @foreach ($data as $msg)
            <div class="alert alert-danger" role="alert">
                <span class="text-danger text-left">
                {{ $msg }}
                </span>
            </div>
        @endforeach
    @else
        <div class="alert alert-danger" role="alert">
            <span class="text-danger text-left">
            {{ $data }}
            </span>
        </div>
    @endif
@endif
