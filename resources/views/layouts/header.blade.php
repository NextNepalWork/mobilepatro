@section('header')
        <!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>@yield('title',$title)</title>

    <!-- Custom fonts for this template-->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
          rel="stylesheet">

    <!-- Custom styles for this template-->

    <link rel="stylesheet" href="{{url('css/app.css')}}">
    <link rel="stylesheet" href="{{url('css/all.css')}}">
    <link rel="stylesheet" href="{{url('css/sb-admin-2.css')}}">
    <link rel="stylesheet" href="{{url('css/custom.css')}}">
    <link rel="stylesheet" href="{{url('css/select2.min.css')}}">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css"
          rel="stylesheet"/>
    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.11.3/themes/smoothness/jquery-ui.css">

</head>
<body id="page-top">
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-star-and-crescent"></i>
            </div>
            <div class="sidebar-brand-text mx-3">राशिफल</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="#">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
               aria-expanded="true" aria-controls="collapseUtilities">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
            <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Utilities:</h6>
                    <a class="collapse-item" href="{{route('add-privilege')}}">Privileges</a>
                    <a class="collapse-item" href="{{route('add-user')}}">Add User</a>
                    <a class="collapse-item" href="{{route('show-user')}}">Show User</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            TO DO
        </div>
        <!-- Nav Item - Pages Collapse Menu -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-horse"></i>
                <span>Horoscopes</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Custom Components:</h6>
                    <a class="collapse-item" href="{{route('add-horo')}}">Add Horoscopes</a>
                    <a class="collapse-item" href="{{route('show-horo-daily')}}">Show Daily Horoscope</a>
                    <a class="collapse-item" href="{{route('show-horo-weekly')}}">Show Weekly Horoscope</a>
                    <a class="collapse-item" href="{{route('show-horo-monthly')}}">Show Monthly Horoscope</a>
                    <a class="collapse-item" href="{{route('show-horo-yearly')}}">Show Yearly Horoscope</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->
        <!-- Nav Item - Pages Collapse Menu -->
        <li class=" nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true"
               aria-controls="collapsePages">
                <i class="fas fa-fw fa-paper-plane"></i>
                <span>News</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Create News Feeds</h6>
                    <a class="collapse-item" href="{{route('add-news')}}">Add News</a>
                    <a class="collapse-item" href="{{route('show-news')}}">Manage News</a>


                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed " data-toggle="collapse" data-target="#collapse" href="#"
               aria-controls="collapse">
                <i class="fas fa-fw fa-video"></i>
                <span>Videos</span></a>
            <div id="collapse" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Videos</h6>
                    <a class="collapse-item" href="{{route('youtube-videos')}}">Add youtube Videos</a>
                    <a class="collapse-item" href="{{route('add-videos')}}">Add Youtube TV Channels</a>
                    <a class="collapse-item" href="{{route('show-videos')}}">Your TV Channels</a>

                </div>
            </div>
        </li>
        <!-- Nav Item -->
        <li class=" nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseCards"
               aria-expanded="true"
               aria-controls="collapseCards">
                <i class="fas fa-fw fa-envelope"></i>
                <span>E-Cards</span>
            </a>
            <div id="collapseCards" class="collapse" aria-labelledby="headingPages"
                 data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Create Cards</h6>
                    <a class="collapse-item" href="{{route('card.create')}}">Add Card</a>
                    <a class="collapse-item" href="{{route('card.index')}}">Manage Cards</a>


                </div>
            </div>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('widgets')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Daily Horoscope Widget</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('Calendar')}}">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Calendar(पात्रो)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('Panchang')}}">
                <i class="fas fa-fw fa-calendar-check"></i>
                <span>Nepali Panchang(नेपाली पंचांग)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('forex')}}">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Exchange Rates</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('update-forex')}}">
                <i class="fas fa-fw fa-dollar-sign"></i>
                <span>Exchange Rate</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">


        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">


                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block">

                    </div>
                    <span style="border: 1px solid rgb(219, 219, 219);  padding: 1px 0px 0px 6px; margin-top: 10px; border-radius:3px; height:43px; background-color: rgba(234, 234, 234, 0.5); width:175px; display:block;">
<iframe scrolling="no" border="0" frameborder="0" marginwidth="0" marginheight="0" allowtransparency="true"
        src="https://www.ashesh.com.np/linknepali-time.php?time_only=no&font_color=666666&aj_time=yes&font_size=12&line_brake=1&api=572135j018"
        width="175" height="45"></iframe></span>

                    <!-- Nav Item - UserSeeder Information -->

                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth::User()->first_name}}</span>
                            <img class="img-profile rounded-circle" src="{{url('images/user/'.Auth::User()->image)}}">
                        </a>
                        <!-- Dropdown - UserSeeder Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="{{route('show-user')}}">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{route('logout')}}" data-toggle="modal"
                               data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->


@endsection