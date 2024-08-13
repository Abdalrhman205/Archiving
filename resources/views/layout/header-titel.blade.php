<!-- header area start -->
<div class="header-area">
    <div class="row align-items-center">
        <!-- nav and search button -->
        <div class="col-lg-6 col-md-6 col-sm-12 text-center clearfix nav-searsh">
            <div class="nav-Search w-100 d-flex align-items-center  pt-3 pb-3">
                <div class="nav-btn pull-right ms-5">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <div class="search-box pull-right">
                    <form action="#">
                        <input type="text" name="search" placeholder="Search..." required>
                        <i class="ti-search"></i>
                    </form>
                </div>
            </div>
        </div>
        <!-- profile info & task notification -->
        <div class="col-lg-6 col-md-6 col-sm-12 text-center-smail clearfix">
            <ul class="notification-area pull-left d-flex align-items-center justify-content-end">
                <li id="full-view"><i class="ti-fullscreen"></i></li>
                <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                <li class="dropdown">
                    <i class="ti-bell dropdown-toggle" data-toggle="dropdown">
                        <span> {{ Auth()->user()->unreadNotifications->count() }}</span>
                    </i>
                    <div class="dropdown-menu bell-notify-box notify-box">
                        <span class="notify-title">You have {{ Auth()->user()->unreadNotifications->count() }} new
                            notifications <a href="#">view all</a></span>
                        <div class="nofity-list">
                            @foreach (auth()->user()->notifications as $notification)
                                @if (isset($notification->data['contentType']))
                                        <a href="{{ route('archives.showN' , $notification->id) }}" class="notify-item">
                                            <div class="notify-thumb">
                                                @if ($notification->data['contentType'] === 'ملف')
                                                    <i class="fas fa-file "></i>
                                                @elseif ($notification->data['contentType'] === 'مستنذ')
                                                    <i class="fas fa-file-alt "></i>
                                                @elseif ($notification->data['contentType'] === 'صورة')
                                                    <i class="fas fa-images"></i>
                                                @elseif ($notification->data['contentType'] === 'قسم')
                                                    <i class="fa-solid fa-list"></i>
                                                @elseif ($notification->data['contentType'] === 'فيديو')
                                                    <i class="fas fa-video"></i>
                                                @endif
                                            </div>
                                <div class="notify-text">
                                    <p>{{ $notification->data['user'] }} أنشأ {{ $notification->data['contentType'] }}
                                        باسم {{ $notification->data['contentName'] }}</p>
                                        <span> {{ $notification->created_at->format('Y-m-d') }} </span>
                                </div>
                            </a> 
                                @endif
                            @endforeach
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- header area end -->

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6 clearfix">
            {{--start title --}}
            <div class="title-page ">
                <h1>{{ $pageTitle }}</h1>
            </div>
            {{--end titile --}}
        </div>
        <div class="col-sm-6 clearfix d-flex flex-row-reverse">
            <div class="user-profile pull-left">
                <h4 class="user-name dropdown-toggle d-flex flex-row-reverse" data-toggle="dropdown">{{ Auth()->user()->name }}  <i class="fa fa-angle-down ms-4"></i></h4>
                <div class="dropdown-menu">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <a style="cursor: pointer" :href="route('logout')"
                            onclick="event.preventDefault();
                                            this.closest('form').submit();"
                            class="dropdown-item">
                            <i class="fa-solid fa-right-from-bracket fa-fade text-danger ms-3"></i>
                            log out 
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- page title area end -->
