<div class="s007">
    <form>
      <div class="inner-form">
        <div class="advance-search">
          <div class="row">
            <div class="input-field">
              <div class="">
                <label for="name"><strong>{{ __('svu.name') }}</strong></label>
                <input type="text" placeholder="{{ __('svu.name') }}" id="name" class="form-control form-control-sm"/>
              </div>
            </div>
            <div class="input-field">
              <div class="">
                <label for="email"><strong>{{ __('svu.email') }}</strong></label>
                <input type="text" id="email" placeholder="{{ __('svu.email') }}" class="form-control form-control-sm" />
              </div>
            </div>
            <div class="input-field">
              <div class="">
                <label for="mobile"><strong>{{ __('svu.mobile') }}</strong></label>
                <input type="text" id="mobile" placeholder="{{ __('svu.mobile') }}" class="form-control form-control-sm"/>
              </div>
            </div>
          </div>
          <div class="row second">
            <div class="input-field">
              <div class="input-select">
                <label for="status"><strong>{{ __('svu.status') }}</strong></label>
                    <select id="status" class="form-control form-control-sm">
                        <option value="">{{ __('svu.all') }}</option>
                        <option value="wait">{{ __('svu.wait') }}</option>
                        <option value="confirmed">{{ __('svu.confirmed') }}</option>
                        <option value="apology">{{ __('svu.apology') }}</option>
                    </select>
              </div>
            </div>
            <div class="input-field">
              <div class="input-select">
                <label for="type"><strong>{{ __('svu.type') }}</strong></label>
                <select id="type" class="form-control form-control-sm">
                    <option value="">{{ __('svu.all') }}</option>
                    <option value="0">{{ __('svu.inreg') }}</option>
                    <option value="1">{{ __('svu.outreg') }}</option>
                </select>
              </div>
            </div>
            <div class="input-field">
              <div class="input-select">
                <label for="event"><strong>{{ __('svu.event') }}</strong></label>
                    <select id="event" class="form-control form-control-sm">
                        <option value="">{{ __('svu.all') }}</option>
                        @foreach ($events as $event )
                        <option value="{{ $event->id }}">{{$event->title}}</option>
                        @endforeach
                    </select>
              </div>
            </div>
          </div>
          <div class="row third">
            <div class="input-field">
              <button class="btn-search">Search</button>
              <button class="btn-delete" id="delete">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>
