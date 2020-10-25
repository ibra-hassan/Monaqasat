<nav class="main-header navbar navbar-expand bg-white navbar-light border-bottom">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Languages Dropdown Menu -->
        @php($lan = app()->getLocale())
        @if (count(config('tender.available_languages', [])) > 1)
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="flag-icon flag-icon-{{($lan == 'en') ? 'us': 'ye'}}"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach(config('tender.available_languages') as $langLocale => $langName)
                        <a class="dropdown-item"
                           href="{{ url()->current() }}?change_language={{ $langLocale }}">
                            <i class="flag-icon flag-icon-{{ ($langLocale == 'en') ? 'us': 'ye' }} mr-2"></i> {{ $langName }}
                        </a>
                    @endforeach
                </div>
            </li>
        @endif
    <!-- Notifications Dropdown Menu -->
        @php($notifications = Auth::user()->unreadNotifications)
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#">
                <i class="far fa-bell"></i>
                @if($notifications->count() > 0)
                    <span class="badge badge-warning navbar-badge">{{$notifications->count()}}</span>
                @endif
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                <span
                    class="dropdown-header">{{($notifications->count() > 0) ? $notifications->count().' '.trans('global.notifications'): trans('global.no').' '.trans('global.notifications')}}</span>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-envelope mr-2"></i> 4 new messages
                    <span class="float-right text-muted text-sm">3 mins</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-users mr-2"></i> 8 friend requests
                    <span class="float-right text-muted text-sm">12 hours</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item">
                    <i class="fas fa-file mr-2"></i> 3 new reports
                    <span class="float-right text-muted text-sm">2 days</span>
                </a>
                <div class="dropdown-divider"></div>
                <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
            </div>
        </li>
    </ul>
</nav>
