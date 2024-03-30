<div class="left-side-bar">
    <div class="brand-logo">
        <a href="index.html">
            <img src="/back/vendors/images/logo.png" alt="" class="dark-logo" />
            <img
                src="/back/vendors/images/logo.png"
                alt=""
                class="light-logo"
            />
        </a>
        <div class="close-sidebar" data-toggle="left-sidebar-close">
            <i class="ion-close-round"></i>
        </div>
    </div>
    <div class="menu-block customscroll">
        <div class="sidebar-menu">
            <ul id="accordion-menu">
                <li>
                    <a href="{{ route('home') }}" class="dropdown-toggle no-arrow">
                        <span class="micon bi bi-house"></span
                        ><span class="mtext">{{ __('svu.home')}}</span>
                    </a>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-person-square"></span
                        ><span class="mtext">{{ __('svu.users')}}</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('permissions.index') }}">{{ __('svu.permissions') }}</a></li>
                        <li><a href="{{ route('roles.index') }}">{{ __('svu.roles') }}</a></li>
                        <li><a href="{{ route('users.index') }}">{{ __('svu.employees') }}</a></li>
                        <li><a href="{{ route('profile.edit') }}">{{ __('svu.edit_profile') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-calendar-event"></span
                        ><span class="mtext">{{ __('svu.invitations')}}</span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('invitations.index') }}">{{ __('svu.send_invitations') }}</a></li>
                        <li><a href="{{ route('invitations.index') }}">{{ __('svu.all_invitations') }}</a></li>
                        <li><a href="{{ route('invitations.publicinvitations') }}">{{ __('svu.public_invitations') }}</a></li>
                        <li><a href="{{ route('nicknames.index') }}">{{ __('svu.nikename1') }}</a></li>
                        <li><a href="{{ route('nicknames2.index') }}">{{ __('svu.nikename2') }}</a></li>
                        <li><a href="{{ route('classes.index') }}">{{ __('svu.classes') }}</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-bar-chart-steps"></span
                        ><span class="mtext"> {{ __('svu.chairs')}} </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('chairs.index') }}">{{ __('svu.all_chairs') }}</a></li>
                        <li><a href="{{ route('chairclasses.index') }}">{{ __('svu.chairclasses') }}</a></li>
                        <li><a href="{{ route('profile.edit') }}">{{ __('svu.empty_chairs') }}</a></li>
                        <li><a href="{{ route('profile.edit') }}">{{ __('svu.chairs_report') }}</a></li>
                    </ul>
                </li>

                <li class="dropdown">
                    <a href="javascript:;" class="dropdown-toggle">
                        <span class="micon bi bi-camera-reels"></span
                        ><span class="mtext"> {{ __('svu.events')}} </span>
                    </a>
                    <ul class="submenu">
                        <li><a href="{{ route('events.index') }}">{{ __('svu.all_events') }}</a></li>
                        <li><a href="{{ route('eventplaces.index') }}">{{ __('svu.eventplaces') }}</a></li>
                    </ul>
                </li>


            </ul>
        </div>
    </div>
</div>
