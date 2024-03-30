<div class="s007">
    <form>
      <div class="inner-form">
        <div class="basic-search">
          <div class="input-field">
            <div class="icon-wrap">
              <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20" height="20" viewBox="0 0 20 20">
                <path d="M18.869 19.162l-5.943-6.484c1.339-1.401 2.075-3.233 2.075-5.178 0-2.003-0.78-3.887-2.197-5.303s-3.3-2.197-5.303-2.197-3.887 0.78-5.303 2.197-2.197 3.3-2.197 5.303 0.78 3.887 2.197 5.303 3.3 2.197 5.303 2.197c1.726 0 3.362-0.579 4.688-1.645l5.943 6.483c0.099 0.108 0.233 0.162 0.369 0.162 0.121 0 0.242-0.043 0.338-0.131 0.204-0.187 0.217-0.503 0.031-0.706zM1 7.5c0-3.584 2.916-6.5 6.5-6.5s6.5 2.916 6.5 6.5-2.916 6.5-6.5 6.5-6.5-2.916-6.5-6.5z"></path>
              </svg>
            </div>
            <input id="search" type="text" placeholder="Search..." />
            <div class="result-count">
              <span>108 </span>results</div>
          </div>
        </div>
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
