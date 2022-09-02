<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>FYP</title>
    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{url('assets/css/app.min.css')}}">
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{url('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/components.css')}}">
    <!-- Custom style CSS -->
    <link rel="stylesheet" href="{{url('assets/css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('assets/bundles/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')}}">
    <link rel="stylesheet" href="{{url('assets/css/custom.css')}}">
    <link rel="shortcut icon" type="image/x-icon" href="{{url('assets/img/favicon.ico')}}" />
    <link rel="stylesheet" href="{{url('assets/bundles/datatables/datatables.min.css')}}">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{url('assets/bundles/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
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

                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown"
                            class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                             <img alt="image"src="{{url('assets/img/user.png')}}" class="user-img-radious-style"> <span
                                class="d-sm-none d-lg-inline-block"></span></a>
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
                <aside id="sidebar-wrapper" >
                    <div class="sidebar-brand">
                        <a href="/index">
                             <span
                                class="logo-name">FYP</span>
                        </a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Main</li>
                        <li class="dropdown active">
                            <a href="{{ url('#') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Dashboard</span></a>
                        </li>
                        <li class="dropdown">
                            <a class="nav-link" href="{{ url('/developerinfo') }}" >

                                <i data-feather="monitor"></i><span>Profile</span></a>
                        </li>
                        <li class="dropdown ">
                            <a class="nav-link" href="{{ url('/aboutdeveloper') }}" >

                                <i data-feather="monitor"></i><span>Profile</span></a>
                        </li>
                        <li class="dropdown ">
                            <a class="nav-link" href="{{ url('/allprojects') }}" >

                                <i data-feather="monitor"></i><span>Buyer Requests</span></a>
                        </li>
                        <li class="dropdown ">
                            <a class="nav-link" href="{{ url('/teamrequests') }}" >

                                <i data-feather="monitor"></i><span>Team Requests</span></a>
                        </li>

                        <li class="dropdown ">
                            <a class="nav-link" href="{{ url('/sendOffers') }}" >

                                <i data-feather="monitor"></i><span>Offers Accepted By Client</span></a>
                        </li>

                        <li class="dropdown ">
                            <a class="nav-link" href="{{ url('/rejectoffers') }}" >

                                <i data-feather="monitor"></i><span>Offers Rejected By Client</span></a>
                        </li>
                        <li class="dropdown ">
                            <a class="nav-link" href="{{ url('/teamreject') }}" >

                                <i data-feather="monitor"></i><span>Request Rejected By Team</span></a>
                        </li>

                        <li class="dropdown ">
                            <a class="nav-link" href="{{ url('/collabteam') }}" >

                                <i data-feather="monitor"></i><span>Send Your Work To Collab Request Sender</span></a>
                        </li>

                        <li class="dropdown">
                            <a href="{{ url('/chatpagedeveloper') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Chat</span></a>
                        </li>

                        <li class="dropdown">
                            <a href="{{ url('/collaborationwork') }}" class="nav-link">
                                <i data-feather="monitor"></i><span>Team Work</span></a>
                        </li>


                        {{-- <li class="dropdown">
                            <a href="#" class="menu-toggle nav-link has-dropdown">
                                <i class="fa fa-users" aria-hidden="true"></i><span>Developer Dashboard</span></a>
                                <li><i data-feather="monitor"></i></li>
                                <li><i data-feather="monitor"></i><a class="nav-link" href="{{ url('/aboutdeveloper') }}" >About You</a></li>
                                <li><i data-feather="monitor"></i><a class="nav-link" href="{{ url('/allprojects') }}" >Buyer Requests</a></li>
                                <li><i data-feather="monitor"></i><a class="nav-link" href="{{ url('/sendOffers') }}" >Send Offers</a></li>
                        </li> --}}
                </aside>
            </div>
