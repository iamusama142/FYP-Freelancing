<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>FYP</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/components.css') }}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/custom.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('assets/img/favicon.ico') }}" />
    <link rel="stylesheet" href="{{ url('assets/bundles/datatables/datatables.min.css') }}">
    <link rel="stylesheet"
        href="{{ url('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css"  />

        <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

        <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">


        <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="stylesheet" href="//cdn.datatables.net/1.11.4/css/jquery.dataTables.min.css"> --}}

</head>

<body>
    <div class="loader"></div>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar sticky">
                <div class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i
                                    data-feather="align-justify"></i></a></li>
                        <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                                <i data-feather="maximize"></i>
                            </a></li>

                    </ul>
                </div>

                @php
                    $data = session()->get('user');
                    $value = count($data->unreadNotifications);
                @endphp

                <ul class="navbar-nav navbar-right">


                    <li class="nav-item avatar dropdown" style="background-color: white">
                        <a class="nav-link dropdown-toggle waves-effect waves-light" id="navbarDropdownMenuLink-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                          <span class="badge badge-danger" style="    margin-top: -35px;
                          margin-left: -10px;
                      ">({{ $value }})</span>
                          <div class="icon-preview" style="margin-top: -18px;
                          color: #8794f3;">
                            <i class="fas fa-bell" style="font-size: 25px;"></i>
                        </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-lg-right dropdown-secondary"  style="width:250px;" aria-labelledby="navbarDropdownMenuLink-5">
                          <a class="dropdown-item waves-effect waves-light" href="#"> Total Requests <span class="badge badge-danger ml-2">({{ $value }}) </span></a>

                            @foreach ($data->unreadNotifications as $noti)
                            <center>
                                <div class="dropdown-list-content dropdown-list-message" tabindex="3"
                                style="overflow: hidden; outline: none;">
                                <a href="#" class="dropdown-item"> <span
                                        class="dropdown-item-avatar
                          text-white">
                                    </span> <span class="dropdown-item-desc"> <span class="message-user"> Name:
                                            {{ $noti->data['nameone'] }}
                                            {{ $noti->data['nametwo'] }}</span> <br>
                                     Email:   <span class="time messege-text">{{ $noti->data['email'] }}</span> <br>
                                      Topic:  <span class="time">{{ $noti->data['heading'] }} </span>
                                    </span>
                                    <hr>
                                </a>
                            </div>
                            </center>

                        @endforeach
                          </a>
                          {{-- <a class="dropdown-item waves-effect waves-light" href="#">Something else here <span class="badge badge-danger ml-2">4</span></a> --}}
                        </div>
                      </li>






                    {{-- <li class="dropdown dropdown-list-toggle show"><a href="#" data-toggle="dropdown"
                            class="nav-link nav-link-lg message-toggle" aria-expanded="true"><svg
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-mail">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                            <span class="badge headerBadge1">
                                {{ $value }}</span> </a>
                        <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown show">
                            <div class="dropdown-header">
                                Total Requests ({{ $value }})

                            </div>

                            @foreach ($data->unreadNotifications as $noti)
                                <div class="dropdown-list-content dropdown-list-message" tabindex="3"
                                    style="overflow: hidden; outline: none;">
                                    <a href="#" class="dropdown-item"> <span
                                            class="dropdown-item-avatar
                              text-white"><i
                                                class="fa fa-user" style="    color: lightgrey;
                              font-size: 50px;" aria-hidden="true"></i>
                                        </span> <span class="dropdown-item-desc"> <span class="message-user">
                                                {{ $noti->data['nameone'] }}
                                                {{ $noti->data['nametwo'] }}</span>
                                            <span class="time messege-text">{{ $noti->data['email'] }}</span>
                                            <span class="time">{{ $noti->data['heading'] }} </span>
                                        </span>
                                    </a>
                                </div>
                            @endforeach



                            <div id="ascrail2002" class="nicescroll-rails nicescroll-rails-vr"
                                style="width: 9px; z-index: 1000; cursor: default; position: absolute; top: 48px; left: 291px; height: 250px; opacity: 0.3; display: block;">
                                <div class="nicescroll-cursors"
                                    style="position: relative; top: 0px; float: right; width: 7px; height: 139px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px;">
                                </div>
                            </div>
                            <div id="ascrail2002-hr" class="nicescroll-rails nicescroll-rails-hr"
                                style="height: 9px; z-index: 1000; top: 289px; left: 0px; position: absolute; cursor: default; display: none; width: 291px; opacity: 0.3;">
                                <div class="nicescroll-cursors"
                                    style="position: absolute; top: 0px; height: 7px; width: 300px; background-color: rgb(66, 66, 66); border: 1px solid rgb(255, 255, 255); background-clip: padding-box; border-radius: 5px; left: 0px;">
                                </div>
                            </div>
                        </div>
                    </li> --}}
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="{{ url('assets/img/user.png') }}" class="user-img-radious-style">
                            <span class="d-sm-none d-lg-inline-block"></span></a>
                        <div class="dropdown-menu dropdown-menu-right pullDown">
                            <div class="dropdown-divider"></div>
                            <a href="{{ url('/') }}" class="dropdown-item has-icon text-danger"> <i
                                    class="fas fa-sign-out-alt"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2" style="background-color: #f0f1f1 !important;">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="/index">
                            <span
                                class="logo-name">Freelance Project</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="{{ url('#') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>



                        <li class="dropdown">
                            <a href="{{ url('/clientdashboard') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Your Info</span></a>
                        </li>


                        <li class="dropdown">
                            <a href="{{ url('/postProject') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Post A Project</span></a>
                        </li>


                        <li class="dropdown">
                            <a href="{{ url('/allproject') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Your Post Projects</span></a>
                        </li>


                        <li class="dropdown">
                            <a href="{{ url('/yourteam') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Your Team</span></a>
                        </li>


                        <li class="dropdown">
                            <a href="{{ url('/chatpage') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Chat</span></a>
                        </li>


                        <li class="dropdown">
                            <a href="{{ url('/collaborationworkcheck') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Collaboration Team Work</span></a>
                        </li>














                        {{-- <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown">
                                <i class="fa fa-users" aria-hidden="true"></i><span>Manage</span></a>
                            <ul class="dropdown-menu">
                                <li><a class="nav-link" href="{{ url('/dashboard') }}" >Dashboard</a></li>

                                <li><a class="nav-link" href="{{ url('/dashboard') }}">Your Info</a></li>
                                <li><a class="nav-link" href="{{ url('/postProject') }}">Post Project</a></li>
                                <li><a class="nav-link" href="{{ url('/allproject') }}">All Projects</a></li>
                                <li><a class="nav-link" href="{{ url('/yourteam') }}">Your Team</a></li>
                                <li><a class="nav-link" href="{{ url('/chatpage') }}">Chat</a></li>



                            </ul>
                        </li> --}}
                </aside>
            </div>

            <!--**********************************
            Content body start
        ***********************************-->
            <div class="content-body">

                <div class="row page-titles mx-0">
                    <div class="col p-md-0">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                        </ol>
                    </div>
                </div>
                <!-- row -->
