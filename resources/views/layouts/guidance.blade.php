<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'GuidanceSystem') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('focusAdmin/css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('focusAdmin/fontawesome/all.min.css') }}">
</head>

<body>
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>

    <div id="main-wrapper">
        <div class="nav-header">
            <a href="{{ route('/') }}" class="brand-logo">
                <img class="logo-abbr" src="{{ asset('images/logo.png') }}" alt="">
                <img class="logo-compact" src="{{ asset('images/logo-text.png') }}" alt="">
                <img class="brand-title" src="{{ asset('images/logo-text.png') }}" alt="">
            </a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>

        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown">
                                <span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <i class="mdi mdi-magnify"></i>
                                </span>
                                <div class="dropdown-menu p-0 m-0">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search"
                                            aria-label="Search">
                                    </form>
                                </div>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                    <i class="mdi mdi-account"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="{{ asset('focusAdmin') }}app-profile.html" class="dropdown-item">
                                        <i class="icon-user"></i>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <a href="{{ asset('focusAdmin') }}email-inbox.html" class="dropdown-item">
                                        <i class="icon-envelope-open"></i>
                                        <span class="ml-2">Inbox </span>
                                    </a>
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        class="dropdown-item">
                                        <i class="icon-key"></i>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>

        <div class="quixnav">
            <div class="quixnav-scroll">


                @if(auth()->user()->is_admin != 1)
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>

                    <li><a href="{{ route('complain.create') }}"><i class="fas fa-plus"></i>Add Complains</a></li>

                </ul>
                @else
                <ul class="metismenu" id="menu">
                    <li class="nav-label first">Main Menu</li>
                    <li><a href="{{ route('/') }}" aria-expanded="false"><i class="fas fa-home"></i><span
                                class="nav-text">Dashboard</span></a></li>


                    <li class="nav-label first">Master List</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fas fa-users"></i><span class="nav-text">Complain</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('complain.create') }}">Add Complains</a></li>
                            <li><a href="{{ route('complain.index') }}">Complains List</a></li>
                        </ul>
                    </li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fas fa-chalkboard-teacher"></i><span class="nav-text">Teacher Complain</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('teacher.create') }}">Add Complains</a></li>
                            <li><a href="{{ route('teacher.index') }}">Complains List</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('studentProfile.index') }}" aria-expanded="false"><i
                                class="fas fa-id-card"></i><span class="nav-text">Student Profile</span></a></li>


                    <li class="nav-label first">Report</li>
                    <li><a href="widget-basic.html" aria-expanded="false"><i class="fas fa-poll-h"></i><span
                                class="nav-text">Report</span></a></li>
                    <li><a href="widget-basic.html" aria-expanded="false"><i class="fas fa-clipboard-list"></i><span
                                class="nav-text">Complains Report</span></a></li>


                    <li class="nav-label first">System</li>
                    <li><a class="has-arrow" href="javascript:void()" aria-expanded="false"><i
                                class="fas fa-fa-user"></i><span class="nav-text">User</span></a>
                        <ul aria-expanded="false">
                            <li><a href="{{ route('user.create') }}">Add User</a></li>
                            <li><a href="{{ route('user.index') }}">Users List</a></li>
                        </ul>
                    </li>
                    <li><a href="widget-basic.html" aria-expanded="false"><i class="fas fa-sign-out-alt"></i><span
                                class="nav-text">Logout</span></a></li>
                </ul>
                @endif
            </div>
        </div>

        <div class="content-body">
            <!-- row -->
            <div class="container-fluid">
                @yield('content')
            </div>
        </div>
    </div>

    <!-- Required vendors -->
    <script src="{{ asset('focusAdmin/vendor/global/global.min.js') }}"></script>
    <script src="{{ asset('focusAdmin/js/quixnav-init.js') }}"></script>
    <script src="{{ asset('focusAdmin/js/custom.min.js') }}"></script>
    <script src="{{ asset('focusAdmin/vendor/jquery/jquery.min.js') }}"></script>
    @yield('script')

</body>

</html>