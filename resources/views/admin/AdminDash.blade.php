@php
use App\Models\userComp;
use App\Models\Admin;
$admin = Admin::where('email',session('admin_mail'))->get()[0];
@endphp
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Admin Panel</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">

</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-theme="light" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <div class="navbar-brand">
                        <!-- Logo icon -->
                        <a href="javascript:void(0);">
                            <!-- Logo text -->
                            <span class="logo-text">
                                <h2 class="page-title text-truncate text-dark font-weight-medium mb-1"> Welcome</h2>
                            </span>
                        </a>
                    </div>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto ml-3 pl-1">
                        <!-- Notification -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle pl-md-3 position-relative" id="read" href="javascript:void(0)" id="bell" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span><i data-feather="bell" class="svg-icon"></i></span>
                                @if (!count($admin->unreadNotifications) == 0)
                                <span class="badge badge-primary notify-no rounded-circle">
                                    {{ count($admin->unreadNotifications) }}
                                </span>
                                @endif
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-left mailbox animated bounceInDown">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="message-center notifications position-relative">
                                            <!-- Message -->
                                            @if (count($admin->unreadNotifications) > 0)
                                            @foreach($admin->unreadNotifications as $item)
                                            <a href="{{ route('superadmin.notified.read',['id'=>$item->notifiable_id,'slug'=>$item->id]) }}" class="message-item d-flex align-items-center border-bottom px-3 py-2">
                                                <div class="btn btn-danger rounded-circle btn-circle"><i data-feather="airplay" class="text-white"></i></div>
                                                <div class="w-75 d-inline-block v-middle pl-2">
                                                    <h6 class="message-title mb-0 mt-1">Status changed to {{ $item->data['Status'] }}</h6>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{ $item->data['Status'] }} for Complaint with ID: {{ $item->data['Complaint_ID'] }}</span>
                                                    <span class="font-12 text-nowrap d-block text-muted">{{ $item->created_at }}</span>
                                                </div>
                                            </a>
                                            @endforeach
                                            @else
                                            <div class="w-100 d-inline-block v-middle pl-2 my-2 mx-1">
                                                <h6 class="message-title mb-0 mt-1 text-dark">No Notifications </h6>
                                            </div>
                                            @endif
                                        </div>
                                    </li>
                                    <!-- <li>
                                        <a class="nav-link pt-3 text-center text-dark" href="javascript:void(0);">
                                            <strong>Check all notifications</strong>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </li> -->
                                </ul>
                            </div>
                        </li>


                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <li class="nav-item d-none d-md-block">
                            <a class="nav-link" href="javascript:void(0)">
                                <form>
                                    <div class="customize-input">
                                        <input class="form-control custom-shadow custom-radius border-0 bg-white" type="search" placeholder="Search" aria-label="Search">
                                        <i class="form-control-icon" data-feather="search"></i>
                                    </div>
                                </form>
                            </a>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="40">
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">{{ session()->get('admin_name') }}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>

                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                    My Profile</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="settings" class="svg-icon mr-2 ml-1"></i>
                                    Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#bs-example-modal-lg"><i data-feather="power" class="svg-icon mr-2 ml-1"></i>
                                    Logout</a>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="javascript:void(0);" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage Complaint</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.compliantlist.view') }}" aria-expanded="false">
                                <i data-feather="tag" class="feather-icon"></i>
                                <span class="hide-menu">Complaints List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.updatecomplaint.view') }}" aria-expanded="false">
                                <i data-feather="edit" class="feather-icon"></i>
                                <span class="hide-menu">Update Complaints</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.merge.view') }}" aria-expanded="false">
                                <i data-feather="link" class="feather-icon"></i>
                                <span class="hide-menu">Merge Complaint</span>
                            </a>
                        </li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage Departments</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="{{ route('admin.compliantlist.view') }}" aria-expanded="false">
                                <i data-feather="server" class="feather-icon"></i>
                                <span class="hide-menu">Department List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.updatecomplaint.view') }}" aria-expanded="false">
                                <i data-feather="user-plus" class="feather-icon"></i>
                                <span class="hide-menu">Admin List</span>
                            </a>
                        </li>
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('admin.merge.view') }}" aria-expanded="false">
                                <i data-feather="link" class="feather-icon"></i>
                                <span class="hide-menu">Merge Complaint</span>
                            </a>
                        </li> -->
                        <li class="list-divider"></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-7 align-self-center">
                        <h3 class="page-title text-truncate text-dark font-weight-medium mb-1"><span id="greetings">Good Morning</span> {{ session()->get('admin_name') }}</h3>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0);">Dashboard</a>
                                    </li>
                                </ol>
                            </nav>
                        </div>

                    </div>
                    <div class="col-5 align-self-center">
                        <div class="customize-input float-right">
                            <div class="bg-white border-0 custom-shadow custom-radius" style="padding: 10px 30px 10px 30px;">
                                <span class="foo text-dark font-weight-medium" style="letter-spacing: 1.5px;"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- *************************************************************** -->
                <!-- Start First Cards -->
                <!-- *************************************************************** -->
                <div class="card-group">
                    <div class="card blue">
                        <div class="card-body ">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-orange mb-1 font-weight-medium count">{{ userComp::select('id')->count() }}</h2>

                                    </div>
                                    <h6 class="text-white font-weight-medium mb-0 w-100 text-truncate">Total Complaint</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-white"><i data-feather="save"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card green">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-green mb-1 w-100 text-truncate font-weight-medium count">{{ userComp::select('id')->where('status','Solved')->count() }}</h2>
                                    <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Complaints Solved
                                    </h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-white"><i data-feather="check-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card pink">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <div class="d-inline-flex align-items-center">
                                        <h2 class="text-primary mb-1 font-weight-medium count">{{ userComp::select('id')->where('status','Pending')->count() }}</h2>

                                        <!--span
                                            class="badge bg-danger font-12 text-white font-weight-medium badge-pill ml-2 d-md-none d-lg-block">-18.33%</span-->
                                    </div>
                                    <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Pending Complaints</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-white"><i data-feather="info"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card red">
                        <div class="card-body">
                            <div class="d-flex d-lg-flex d-md-block align-items-center">
                                <div>
                                    <h2 class="text-danger mb-1 font-weight-medium count">{{ userComp::select('id')->where('status','Closed')->count() }}</h2>
                                    <h6 class="text-white font-weight-normal mb-0 w-100 text-truncate">Closed Complaints</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0">
                                    <span class="opacity-7 text-white"><i data-feather="x-circle"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="p-2 bg-dark text-center d-flex d-lg-flex  align-items-center" style="border-radius: 10px;">

                                <div class="align-items-center" style="width: 100%;">
                                    <h1 class="font-light text-orange">2,064</h1>
                                    <h6 class="text-white">Total Users</h6>
                                </div>

                                <div class="ml-auto mt-md-3 mt-lg-0" style="margin-right: 15px;">
                                    <span class="opacity-7 text-white"><i data-feather="users" width="40" height="40"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="p-2 bg-dark text-center d-flex d-lg-flex  align-items-center" style="border-radius: 10px;">
                                <div class="align-items-center" style="width: 100%;">
                                    <h1 class="font-light text-success">2,064</h1>
                                    <h6 class="text-white">Total Admins</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0" style="margin-right: 15px;">
                                    <span class="opacity-7 text-white"><i data-feather="users" width="40" height="40"></i></span>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-lg-3 col-xlg-3">
                        <div class="card card-hover">
                            <div class="p-2 bg-dark text-center d-flex d-lg-flex  align-items-center" style="border-radius: 10px;">
                                <div class="align-items-center" style="width: 100%;">
                                    <h1 class="font-light text-danger">2,064</h1>
                                    <h6 class="text-white">Total Re-Complaint</h6>
                                </div>
                                <div class="ml-auto mt-md-3 mt-lg-0" style="margin-right: 15px;">
                                    <span class="opacity-7 text-white"><i data-feather="repeat" width="40" height="40"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End First Cards -->
                <!-- *************************************************************** -->
                <!-- *************************************************************** -->
                <!-- Start Sales Charts Section -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Complaints</h4>
                                <div id="net" class="mt-2" style="height:283px; width:100%;"></div>
                                <!-- <ul class="list-style-none mb-0">
                                    <li>
                                        <i class="fas fa-circle text-green font-10 mr-2"></i>
                                        <span class="text-muted">Solved Complaints</span>
                                        <span class="text-dark float-right font-weight-medium">{{ userComp::select('id')->where('status','Solved')->count() }}</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-primary font-10 mr-2"></i>
                                        <span class="text-muted">Pending Complaints</span>
                                        <span class="text-dark float-right font-weight-medium">{{ userComp::select('id')->where('status','Pending')->count() }}</span>
                                    </li>
                                    <li class="mt-3">
                                        <i class="fas fa-circle text-danger font-10 mr-2"></i>
                                        <span class="text-muted">Closed Complaints</span>
                                        <span class="text-dark float-right font-weight-medium">{{ userComp::select('id')->where('status','Closed')->count() }}</span>
                                    </li>
                                </ul> -->


                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title mb-4">Complaints by Location</h4>
                                <!--  <div class="" style="height:180px">
                                    <div id="visitbylocate" style="height:100%"></div>
                                </div> -->
                                <!-- php code by shyam patel 07/03/2021 start-->
                                <?php

                                    $model = userComp::pluck('District');

                                    $district_arr = [];
                                    foreach ($model as $key => $value) 
                                    {
                                        if(array_key_exists ($value, $district_arr))
                                        {
                                            $district_arr[$value] =  $district_arr[$value] + 1 ;
                                        }
                                        else{
                                            $district_arr[$value] = 1;
                                        }
                                    }
                                    $percent_arr = [];
                                    foreach ($district_arr as $key => $value) {
                                        $percent_arr[$key] = (int) (($value/sizeof($model))*100);
                                    }
                                     arsort($percent_arr);
                                    $i = 0;
                                        foreach ($percent_arr as $key => $value) {
                                            if($i<4){
                                    ?>
                                <div class="row mb-3 align-items-center mt-1 mt-5">
                                    <div class="col-4 text-center">
                                        <span class="text-dark font-16"><?php echo $key;?></span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 10px;">
                                            <div class="progress-bar bg-primary" role="progressbar" style="width:<?php echo $value;?>%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <span class="mb-0 font-14 text-dark font-weight-medium"><?php echo $value;?>%</span>
                                    </div>
                                </div>
                                <?php 
                                        }
                                        $i++;
                                    }
                                ?>

                                <!-- shyam patel end -->




                                <!-- <div class="row mb-3 align-items-center">
                                    <div class="col-4 text-center">
                                        <span class="text-muted font-14">UK</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 74%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">21%</span>
                                    </div>
                                </div>
                                <div class="row mb-3 align-items-center">
                                    <div class="col-4 text-center">
                                        <span class="text-muted font-14">USA</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-cyan" role="progressbar" style="width: 60%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">18%</span>
                                    </div>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-4 text-center">
                                        <span class="text-muted font-14">China</span>
                                    </div>
                                    <div class="col-5">
                                        <div class="progress" style="height: 5px;">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 12%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    </div>
                                    <div class="col-3 text-center">
                                        <span class="mb-0 font-14 text-dark font-weight-medium">12%</span>
                                    </div>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Sales Charts Section -->
                <!-- *************************************************************** -->

                <!-- *************************************************************** -->
                <!-- Start Top Leader Table -->
                <!-- *************************************************************** -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Departmental Statistics</h4>
                                    <div class="ml-auto">
                                        <div class="dropdown sub-dropdown">
                                            <button class="btn btn-link text-muted dropdown-toggle" type="button" id="dd1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i data-feather="more-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd1">
                                                <a class="dropdown-item" href="#">Insert</a>
                                                <a class="dropdown-item" href="#">Update</a>
                                                <a class="dropdown-item" href="#">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table class="table no-wrap v-middle mb-0">
                                        <thead>
                                            <tr class="border-0">
                                                <th class="border-0 font-14 font-weight-medium text-muted">Departmental Admin
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted px-2">Department
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                    Last Complaint Status
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted text-center">
                                                    Days
                                                </th>
                                                <th class="border-0 font-14 font-weight-medium text-muted">Total Complaints Solved </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="border-top-0 px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-3"><img src="../assets/images/users/widget-table-pic1.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Hanna
                                                                Gover</h5>
                                                            <span class="text-muted font-14">hgover@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="border-top-0 text-muted px-2 py-4 font-14">Elite Admin</td>

                                                <td class="border-top-0 text-center px-2 py-4"><i class="fa fa-circle text-primary font-12" data-toggle="tooltip" data-placement="top" title="In Testing"></i></td>
                                                <td class="border-top-0 text-center font-weight-medium text-muted px-2 py-4">
                                                    35
                                                </td>
                                                <td class="text-center font-weight-medium text-dark border-top-0 px-2 py-4"><b>86</b>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-3"><img src="../assets/images/users/widget-table-pic2.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Daniel
                                                                Kristeen
                                                            </h5>
                                                            <span class="text-muted font-14">Kristeen@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted px-2 py-4 font-14">Real Homes WP Theme</td>

                                                <td class="text-center px-2 py-4"><i class="fa fa-circle text-success font-12" data-toggle="tooltip" data-placement="top" title="Done"></i>
                                                </td>
                                                <td class="text-center text-muted font-weight-medium px-2 py-4">32</td>
                                                <td class="text-center font-weight-medium text-dark px-2 py-4"><b>86</b></td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-3"><img src="../assets/images/users/widget-table-pic3.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Julian
                                                                Josephs
                                                            </h5>
                                                            <span class="text-muted font-14">Josephs@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted px-2 py-4 font-14">MedicalPro WP Theme</td>

                                                <td class="text-center px-2 py-4"><i class="fa fa-circle text-primary font-12" data-toggle="tooltip" data-placement="top" title="Done"></i>
                                                </td>
                                                <td class="text-center text-muted font-weight-medium px-2 py-4">29</td>
                                                <td class="text-center font-weight-medium text-dark px-2 py-4"><b>86</b></td>
                                            </tr>
                                            <tr>
                                                <td class="px-2 py-4">
                                                    <div class="d-flex no-block align-items-center">
                                                        <div class="mr-3"><img src="../assets/images/users/widget-table-pic4.jpg" alt="user" class="rounded-circle" width="45" height="45" /></div>
                                                        <div class="">
                                                            <h5 class="text-dark mb-0 font-16 font-weight-medium">Jan
                                                                Petrovic
                                                            </h5>
                                                            <span class="text-muted font-14">hgover@gmail.com</span>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-muted px-2 py-4 font-14">Hosting Press HTML</td>

                                                <td class="text-center px-2 py-4"><i class="fa fa-circle text-danger font-12" data-toggle="tooltip" data-placement="top" title="In Progress"></i></td>
                                                <td class="text-center text-muted font-weight-medium px-2 py-4">23</td>
                                                <td class="text-center font-weight-medium text-dark px-2 py-4"><b>86</b></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- *************************************************************** -->
                <!-- End Top Leader Table -->
                <!-- *************************************************************** -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!--  Modal content for the above example -->
            <div class="modal fade" id="bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myLargeModalLabel">Logout</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal"><i data-feather="x" class="feather-icon"></i> Close</button>
                            <a href="{{ route('admin.logout') }}" type="button" class="btn btn-primary"><i data-feather="log-out" class="feather-icon"></i> Logout</a>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center text-muted">
                All Rights Reserved by <b> Complaint Management System</b>
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <script src="../assets/extra-libs/c3/d3.min.js"></script>
    <script src="../assets/extra-libs/c3/c3.min.js"></script>
    <script src="../assets/libs/chartist/dist/chartist.min.js">

    </script>
    <script src="../assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../assets/extra-libs/jvector/jquery-jvectormap-in-mill.js"></script>
    <script src="../dist/js/pages/dashboards/dashboard1.js"></script>


    <?php 
		//echo date('F, Y');
		$month = array();
		for ($i = 0; $i < 6; $i++) {

		  $month[date('M-Y', strtotime("-$i month"))] = 0;
		}
		$all_date = userComp::pluck('ComplaintDate');

		
		foreach ($all_date as $key => $value) {
			
			if(array_key_exists(date('M-Y',strtotime($value)),$month)){
				$month[date('M-Y',strtotime($value))] = $month[date('M-Y',strtotime($value))] + 1;
			}
		}
		$month_key = array_keys($month);
		$month_value = array_values($month);
    ?>

    <script>
        var data = {
            labels: < ? php echo json_encode($month_key); ? > 
            , series : [ <
                ?
                php echo json_encode($month_value); ? >
            ]

        };

        var options = {
            axisX: {
                showGrid: false
            }
            , seriesBarDistance: 1
            , chartPadding: {
                top: 15
                , right: 15
                , bottom: 5
                , left: 0
            }
            , plugins: [
                Chartist.plugins.tooltip()
            , ]
            , color: {
                pattern: ["#edf2f6", "#5f76e8", "#ff4f70", "#01caf1"]
            }
            , width: '100%'
        };


        var responsiveOptions = [
            ['screen and (max-width: 640px)', {
                seriesBarDistance: 5
                , axisX: {

                    labelInterpolationFnc: function(value) {
                        return value[0];
                    }
                }
            }]
        ];
        var ctx = document.getElementById("net");

    </script>
    <script>
        const date = new Date;
        //console.log(date.getHours());
        let hour = date.getHours();
        if (hour == 00) {
            document.getElementById('greetings').innerHTML = 'Good Evening' + ',';
        } else {
            let status = (hour <= 11 && hour > 5) ? 'Good Morning' : ((hour < 17 && hour >= 12) ? "Good Afternoon" : "Good Evening");

            document.getElementById("greetings").innerHTML = status + ',';
        }

    </script>
    <script>
        function timeClock() {
            setTimeout(timeClock, 1000);
            now = new Date();

            f_date = now.getDate();
            f_date += "/" + ("0" + now.getMonth()).slice(-2);
            f_date += "/" + now.getFullYear();
            f_date += " | Time: " + ("0" + now.getHours()).slice(-2) + ':' + ("0" + now.getMinutes()).slice(-2) + ':' + ("0" + now.getSeconds()).slice(-2);
            $('.foo').html('Date: ' + f_date);
            return f_date;
        }
        $(function() {
            $('.foo').html(timeClock());
        });

    </script>
</body>

</html>
