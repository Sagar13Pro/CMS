@php
use App\Models\userComp as uc;
use App\Models\User;
$avatar = User::select('avatar')->where('email',session()->get('session_mail'))->get();
$getComplaints = uc::select()->where('foreignEmail',session()->get('session_mail'))->get();
@endphp

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Complaint List</title>
    <!-- This page plugin CSS -->
    <link href="../assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
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
                        <!-- ============================================================== -->
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
                                @if(!is_null($avatar[0]->avatar))
                                <img src="{{ $avatar[0]->avatar }}" alt="user" class="rounded-circle" width="40">
                                @else
                                <img src="../assets/images/users/profile-pic.jpg" alt="user" class="rounded-circle" width="40">
                                @endif
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">{{ session()->get('session_name')}}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated flipInY">
                                <a class="dropdown-item" href="javascript:void(0)"><i data-feather="user" class="svg-icon mr-2 ml-1"></i>
                                    My Profile
                                </a>

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
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('dashboard.user') }}" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage Complaint</span></li>


                        <li class="sidebar-item">
                            <a class="sidebar-link" href="javascript:void(0)" aria-expanded="false">
                                <i data-feather="tag" class="feather-icon"></i>
                                <span class="hide-menu">Complaints List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('newcomplaint.view') }}" aria-expanded="false">
                                <i data-feather="file-plus" class="feather-icon"></i>
                                <span class="hide-menu">New Complaints</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('trackcomplaint.view') }}" aria-expanded="false">

                                <i data-feather="trending-up" class="feather-icon"></i>
                                <span class="hide-menu">Track Complaint</span>
                            </a>
                        </li>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Complaints List</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Complaints List</li>
                                </ol>
                            </nav>
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
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- order table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Complaints List</h4>

                                <div class="table-responsive">
                                    <table id="default_order" class="table table-striped table-bordered display no-wrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Complaint I'd</th>
                                                <th>Nature of Complaint</th>
                                                <th>Complaint Date</th>
                                                <th>Complaint Status</th>
                                                <th>View Details</th>
                                            </tr>
                                        </thead>
                                        @if(count($getComplaints) >= 1)
                                        <tbody>
                                            @foreach($getComplaints as $item)
                                            <tr>
                                                <td>{{ $item->Complaint_ID }}</td>
                                                <td>{{ $item->ComplaintNature }} </td>
                                                <td>{{ $item->ComplaintDate }}</td>
                                                <td>Dummy</td>
                                                <td><button class="btn waves-effect waves-light btn-rounded btn-dark getID" data-id={{$item->Complaint_ID}} data-toggle="modal" data-target="#full-width-modal">View Full Details</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                        @endif
                                        <tfoot>
                                            <tr>
                                                <th>Complaint I'd</th>
                                                <th>Nature of Complaint</th>
                                                <th>Complaint Date</th>
                                                <th>Complaint Status</th>
                                                <th>View Details</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->

            <!-- Full width modal content -->



            <div id="full-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="fullWidthModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-full-width">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="fullWidthModalLabel"></h4>
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        </div>
                        <div class="modal-body" id="load_data">

                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-table"></i>
                                    Complaint Details</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="80%" cellspacing="0">
                                            <tr>
                                                <th>Compalint I'D</th>
                                                <td id="Details_1"></td>
                                                <th>Complait Date</th>
                                                <td id="Details_2"></td>
                                            </tr>
                                            <tr>
                                                <th>Complaint Type</th>
                                                <td id="Details_3"></td>
                                                <th>Complaint Category</th>
                                                <td id="Details_4"></td>
                                            </tr>
                                            <tr>
                                                <th>Complaint Sub-Category</th>
                                                <td id="Details_5"></td>
                                                <th>Authority Dept/Company</th>
                                                <td id="Details_6"></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered" width="50%" cellspacing="0">
                                            <tr>
                                                <th>Nature of Complaint</th>
                                                <td id="Details_7"></td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>District</th>
                                                <td id="Details_8"></td>
                                                <th>City</th>
                                                <td id="Details_9"></td>
                                            </tr>
                                            <tr>
                                                <th>Pincode</th>
                                                <td id="Details_10"></td>
                                                <th>Ref. No</th>
                                                <td id="Details_11"></td>

                                            </tr>

                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Complaint Details</th>
                                                <td id="Details_12"></td>
                                            </tr>
                                        </table>


                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>

                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->


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
                            <a href="/logout" class="btn btn-primary"><i data-feather="log-out" class="feather-icon"></i> Logout</a>
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
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- apps -->
    <!-- apps -->
    <script src="../dist/js/app-style-switcher.js"></script>
    <script src="../dist/js/feather.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <!-- themejs -->
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <!--This page plugins -->
    <script src="../assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $(document).ready(function() {
            $('.getID').click(function() {
                var ids = $(this).data('id');
                $.get('/UserCompList/' + ids, function(response) {
                    console.log(ids);
                    if (response.success) {
                        var CompId = document.getElementById('Details_1');
                        var CompDate = document.getElementById('Details_2');

                        var CompType = document.getElementById('Details_3');
                        var CompCategory = document.getElementById('Details_4');

                        var CompSubCategory = document.getElementById('Details_5');
                        var CompAuth = document.getElementById('Details_6');

                        var CompNature = document.getElementById('Details_7');

                        var CompDistrict = document.getElementById('Details_8');
                        var CompCity = document.getElementById('Details_9');

                        var CompPinCode = document.getElementById('Details_10');
                        var CompRefNo = document.getElementById('Details_11');

                        var CompDetails = document.getElementById('Details_12');

                        CompId.innerHTML = response.List[0]['Complaint_ID'];
                        CompDate.innerHTML = response.List[0]['ComplaintDate'];
                        CompType.innerHTML = response.List[0]['ComplaintType'];
                        CompCategory.innerHTML = response.List[0]['ComplaintCategory'];
                        CompSubCategory.innerHTML = response.List[0]['SubCategory'];
                        CompAuth.innerHTML = response.List[0]['AuthDept'];
                        CompNature.innerHTML = response.List[0]['ComplaintNature'];
                        CompDistrict.innerHTML = response.List[0]['District'];
                        CompCity.innerHTML = response.List[0]['City'];
                        CompPinCode.innerHTML = response.List[0]['Pincode'];
                        CompRefNo.innerHTML = response.List[0]['ReferenceNo'];
                        CompDetails.innerHTML = response.List[0]['ComplaintDetails'];

                    }
                }, 'json');
            });
        });

    </script>
</body>

</html>
