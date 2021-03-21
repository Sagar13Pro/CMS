<?php
use App\Models\User;
use App\Models\userComp;
$avatar = User::select('avatar')->where('email',session()->get('session_mail'))->get();
$IDs = userComp::select(['Complaint_ID','id','status'])->where('ForeignEmail',session()->get('session_mail'))->get();
?>
<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png">
    <title>Track Complaint</title>
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" crossorigin="anonymous">


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
                                <h2 class="page-title text-truncate text-dark font-weight-medium mb-1">Welcome</h2>
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
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">{{ session()->get('session_name') }}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
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
                        <li class="sidebar-item"> <a class="sidebar-link sidebar-link" href="{{ route('dashboard.user') }}" aria-expanded="false"><i data-feather="home" class="feather-icon"></i><span class="hide-menu">Dashboard</span></a></li>
                        <li class="list-divider"></li>
                        <li class="nav-small-cap"><span class="hide-menu">Manage Complaint</span></li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('complaintlist.view') }}" aria-expanded="false">
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
                            <a class="sidebar-link sidebar-link" href="javascript:void(0)" aria-expanded="false">

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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Update Complaint</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="index.html" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">Update Complaint</li>
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
                <div id="Error"></div>
                <x-alert type="ErrorMsg" />
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="col-sm-12 col-md-6 col-lg-6" id="append">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Enter Complaint I'd</h4>
                            <div class="form-group">
                                {{-- <input id="complaint" type="number" name="CompID" class="form-control" placeholder="Complaint I'd"> --}}
                                <select name="CompID" id="complaint" class="form-control">
                                    <option value="">Select</option>
                                    @foreach($IDs as $id)
                                    @if($id->status != 'Closed')
                                    <option value="{{ $id->Complaint_ID }}">{{ $id->Complaint_ID }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <center>
                                <button id="btn" class="btn btn-dark ml-1 get" type="button" data-toggle="collapse" data-target="#UpdateComplaint" aria-expanded="false" aria-controls="UpdateComplaint">
                                    Show Details
                                </button>
                            </center>
                        </div>
                    </div>
                </div>
                <!-- order table -->
                <div id="UpdateComplaint" class="collapse">
                    <div class="row">
                        <div class="col-12">
                            <div class="card mb-3">
                                <div class="card-header">
                                    <i class="fas fa-table"></i>
                                    Complaint Details</div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" width="80%" cellspacing="0">
                                            <tr>
                                                <th>Complaint I'd</th>
                                                <td id="data1">xxxxxx</td>
                                                <th>Complaint Date</th>
                                                <td id="data2">xxxxxxxxxxxxx</td>
                                            </tr>
                                            <tr>
                                                <th>Catogory</th>
                                                <td id="data3">xxxxxxxxxxxxxx</td>
                                                <th>Sub-Catogory</th>
                                                <td id="data4">xxxxxxxxxxxxx</td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered" width="50%" cellspacing="0">
                                            <tr>
                                                <th>Nature of Complaint</th>
                                                <td id="data5">xxxxxxxxxxxx</td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered">
                                            <tr>
                                                <th>Department</th>
                                                <td id="data6">xxxxxxxxxxxxx</td>
                                                <th>Departmental Admin</th>
                                                <td id="data7">xxxxxxxxxxxxx</td>
                                            </tr>
                                            <tr>
                                                <th>Last Update</th>
                                                <td id="data8">xxxxxxxxxxxxxx</td>
                                                <th>Current Status</th>
                                                <td id="data9">xxxxxxxxxxxxx</td>
                                            </tr>
                                        </table>
                                        <table class="table table-bordered" width="50%" cellspacing="0">
                                            <tr>
                                                <th>Remarks</th>
                                                <td id="data10">xxxxxxxxxxxx</td>
                                            </tr>
                                        </table>
                                        <button class="btn btn-danger" data-toggle="modal" data-target="#danger-alert-modal">Close Complaint</button>
                                        &emsp;
                                        <button id="btnRecomplaint" class="btn btn-primary" data-toggle="modal" data-target="#info-alert-modal" style="display: none;">Re-Complaint</button>

                                        <form id="form-recomplaint" action="{{ route('user.recomplaint.init') }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('put')
                                        </form>
                                    </div>
                                </div>
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

        <!-- Info Alert Modal -->
        <div id="info-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-information h1 text-info"></i>
                            <h4 class="mt-2">Heads up!</h4>
                            <p class="mt-3">Cras mattis consectetur purus sit amet fermentum.
                                Cras justo odio, dapibus ac facilisis in, egestas eget quam.</p>
                            <button id="continueBtn" type="button" class="btn btn-info my-2" data-dismiss="">Continue</button>
                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->


        <!-- Danger Alert Modal -->
        <div id="danger-alert-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content modal-filled bg-danger">
                    <div class="modal-body p-4">
                        <div class="text-center">
                            <i class="dripicons-wrong h1"></i>
                            <h4 class="mt-2">Are You Sure?</h4>
                            <p class="mt-3">Please Provide Feedback for Our Services</p>
                            <form id="form-close" action="" method="POST">
                                @csrf
                                @method('put')
                                <input type="text" name="feedback" class="form-control" placeholder="Provide Your Feedback" required />
                            </form>
                            <button type="button" id="closeBtn" class="btn btn-light my-2" data-toggle="modal" data-dismiss="modal" data-target="#centermodal">Continue</button>

                        </div>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <div class="modal fade" id="centermodal" tabindex="-1" role="dialog" aria-modal="true">
            <div class="modal-dialog modal-dialog-centered">
                <img src="../assets/images/success.gif" width="450" height="350">

            </div><!-- /.modal-dialog-->
        </div>
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
                        <a href="/logout" type="button" class="btn btn-primary"><i data-feather="log-out" class="feather-icon"></i> Logout</a>
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
        let form = document.getElementById('form-recomplaint');
        let closeForm = document.getElementById('form-close');
        let close = document.getElementById('closeBtn');
        $(document).ready(function() {
            $('.get').click(function() {
                var $id = document.getElementById('complaint').value;
                let errorTag = document.getElementById("Error");
                let removeModel = document.getElementById("btn");
                if ($id == '') {
                    removeModel.removeAttribute("data-target");
                    errorTag.setAttribute("class", "alert alert-danger");
                    errorTag.innerHTML = "Provide Complaint ID";
                    console.log("if")
                } else {
                    removeModel.setAttribute("data-target", "#UpdateComplaint");
                    $.get('/get/trackComplaint/' + $id, function(response) {
                        if (response.success) {
                            console.log(response.complaint);
                            document.getElementById('data1').innerHTML = response.complaint[0]['Complaint_ID'];
                            document.getElementById('data2').innerHTML = response.complaint[0]['ComplaintDate'];
                            document.getElementById('data3').innerHTML = response.complaint[0]['ComplaintCategory'];
                            document.getElementById('data4').innerHTML = response.complaint[0]['SubCategory'];
                            document.getElementById('data5').innerHTML = response.complaint[0]['ComplaintNature'];
                            document.getElementById('data6').innerHTML = response.complaint[0]['AuthDept'];
                            document.getElementById('data7').innerHTML = 'xxxxxxxxxx';
                            document.getElementById('data8').innerHTML = response.complaint[0]['updated_at'];
                            document.getElementById('data9').innerHTML = response.complaint[0]['status'];
                            document.getElementById('data10').innerHTML = response.complaint[0]['Remarks'];
                            if (response.complaint[0]['status'] != 'Registered') {
                                document.getElementById('btnRecomplaint').style.display = 'inline-block';
                                form.action = '{{ route("user.recomplaint.init") }}' + '/' + response.complaint[0]['id'];
                            } else {
                                document.getElementById('btnRecomplaint').style.display = 'none';
                            }
                            close.setAttribute('data-id', response.complaint[0]['id']);
                            console.log(close);
                        }
                    });

                }
            });
            setInterval(() => {
                if ($("#Error").length > 0) {
                    $("#Error").remove();
                }
                $("#append").before("<div id='Error'></div>");
            }, 4000);
        });
        let rebtn = document.getElementById('continueBtn');
        rebtn.onclick = () => {
            form.submit();
        }
        close.onclick = () => {
            closeForm.action = '{{ route("user.complaint.close") }}' + '/' + close.getAttribute('data-id');
            closeForm.submit()
        }

    </script>
</body>

</html>
