
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Forum - AdminCP</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="http://www.bootstrapdash.com/demo/star-admin-free/jquery/vendors/css/vendor.bundle.base.css">
    <link rel="stylesheet" href="http://www.bootstrapdash.com/demo/star-admin-free/jquery/vendors/css/vendor.bundle.addons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/star-admin-pro/src/assets/css/demo_1/style.css">
    <link rel="stylesheet" href="https://www.bootstrapdash.com/demo/star-admin-pro/src/assets/css/shared/style.css">


    <script src="http://www.bootstrapdash.com/demo/star-admin-free/jquery/vendors/js/vendor.bundle.base.js"></script>
    <script src="http://www.bootstrapdash.com/demo/star-admin-free/jquery/vendors/js/vendor.bundle.addons.js"></script>
    <script src="http://www.bootstrapdash.com/demo/star-admin-free/jquery/js/off-canvas.js"></script>
    <script src="http://www.bootstrapdash.com/demo/star-admin-free/jquery/js/misc.js"></script>
    <script src="https://www.bootstrapdash.com/demo/star-admin-pro/src/assets/js/shared/desktop-notification.js"></script>
    <script src="https://www.bootstrapdash.com/demo/star-admin-pro/src/assets/js/shared/toastDemo.js"></script>
    <script src="{{ asset('js/admin/dashboard.js') }}"></script>
    <script src="{{ asset('js/admin/alerts.js') }}"></script>
    <script src="{{ asset('js/admin/request.js') }}"></script>

    <link rel="shortcut icon" href="images/favicon.png" />
</head>

<body>
<div class="container-scroller">
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
            <a class="navbar-brand brand-logo" style="color: black;" href="#">
                AdminCP
            </a>
            <a class="navbar-brand brand-logo-mini" href="#">
                AdminCP
            </a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="mdi mdi-menu"><i class="fas fa-align-justify"></i></span>
            </button>
            <ul class="navbar-nav navbar-nav-left header-links d-none d-md-flex">
                <li class="nav-item">
                    <a href="#" class="nav-link">Schedule
                        <span class="badge badge-primary ml-1">New</span>
                    </a>
                </li>
                <li class="nav-item active">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-elevation-rise"></i>Reports</a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="mdi mdi-bookmark-plus-outline"></i>Score</a>
                </li>
            </ul>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="messageDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <i class="fab fa-wpforms"></i>
                        <span class="count">{{ $activities->count() }}</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="messageDropdown">
                        <div class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have {{ $activities->count() }} unread activities
                            </p>
                            <span class="badge badge-info badge-pill float-right">View all</span>
                        </div>
                        <div class="dropdown-divider"></div>
                        @foreach($activities->take(6) as $activity)
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <img src="http://www.bootstrapdash.com/demo/star-admin-free/jquery//images/faces/face4.jpg" alt="image" class="profile-pic">
                            </div>
                            <div class="preview-item-content flex-grow">
                                <h6 class="preview-subject ellipsis font-weight-medium text-dark">{{ $activity->causer->name }}
                                    <span class="float-right font-weight-light small-text">{{ $activity->created_at->diffForHumans() }}</span>
                                </h6>
                                <p class="font-weight-light small-text">
                                    {{ $activity->description }}
                                </p>
                            </div>
                            @endforeach
                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="far fa-bell"></i>
                        <span class="count">4</span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <a class="dropdown-item">
                            <p class="mb-0 font-weight-normal float-left">You have 4 new notifications
                            </p>
                            <span class="badge badge-pill badge-warning float-right">View all</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="mdi mdi-alert-circle-outline mx-0"></i>
                                </div>
                            </div>

                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-medium text-dark">Application Error</h6>
                                <p class="font-weight-light small-text">
                                    Just now
                                </p>
                            </div>

                        </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-xl-inline-block">
                    <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                        <span class="profile-text">Hello, {{ Auth::user()->name   }} !</span>
                        <img class="img-xs rounded-circle" src="http://www.bootstrapdash.com/demo/star-admin-free/jquery//images/faces/face1.jpg" alt="Profile image">
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <a class="dropdown-item p-0">
                            <div class="d-flex border-bottom">
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-bookmark-plus-outline mr-0 text-gray"></i>
                                </div>
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center border-left border-right">
                                    <i class="mdi mdi-account-outline mr-0 text-gray"></i>
                                </div>
                                <div class="py-3 px-4 d-flex align-items-center justify-content-center">
                                    <i class="mdi mdi-alarm-check mr-0 text-gray"></i>
                                </div>
                            </div>
                        </a>
                        <a class="dropdown-item mt-2">
                            Manage Accounts
                        </a>
                        <a href="{{ route('cp.settings.basic')  }}" class="dropdown-item">
                            Basic Settings
                        </a>
                        <a class="dropdown-item">
                            Check Inbox
                        </a>
                        <a class="dropdown-item">
                            Sign Out
                        </a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:http://www.bootstrapdash.com/demo/star-admin-free/jquery//partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item nav-profile">
                    <div class="nav-link">
                        <div class="user-wrapper">
                            <div class="profile-image">
                                <img src="http://www.bootstrapdash.com/demo/star-admin-free/jquery//images/faces/face1.jpg" alt="profile image">
                            </div>
                            <div class="text-wrapper">
                                <p class="profile-name">{{ Auth::user()->name }}</p>
                                <div>
                                    <small class="designation text-muted">{{ Auth::user()->roles->first()->name }}</small>
                                    <span class="status-indicator online"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cp.index') }}">
                        <i class="menu-icon fas fa-columns"></i>
                        <span class="menu-title">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="collapse" href="#" aria-expanded="false" aria-controls="ui-basic">
                        <i class="menu-icon fas fa-users-cog"></i>
                        <span class="menu-title">User Management</span>
                    </a>
                    <div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cp.users.index') }}">Users</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cp.index') }}">
                        <i class="menu-icon fas fa-star-half-alt"></i>
                        <span class="menu-title">Role Management</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('cp.index') }}">
                        <i class="menu-icon fab fa-wpforms"></i>
                        <span class="menu-title">Forum Management</span>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="main-panel">
            <div class="content-wrapper">
                @if(Session::has('notification'))
                    <script>
                        showSwal('{{Session::get('notification.type') }}', '{{ Session::get('notification.message') }}');
                    </script>
                @endif
                @yield('content')
            </div>
        </div>
    </div>
</div>

