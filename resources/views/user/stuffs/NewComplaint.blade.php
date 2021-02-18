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
    <title>New Complaint</title>
    <!-- Custom CSS -->
    <link href="../assets/extra-libs/c3/c3.min.css" rel="stylesheet">
    <link href="../assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <link href="../assets/extra-libs/jvector/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
    <!-- Custom CSS -->
    <link href="../dist/css/style.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
                        <a href="index.html">
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
                                <span class="ml-2 d-none d-lg-inline-block"><span>Hello,</span> <span class="text-dark">{{ session()->get('session_name')}}</span> <i data-feather="chevron-down" class="svg-icon"></i></span>
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
                            <a class="sidebar-link" href="{{ route('complaintlist.view') }}" aria-expanded="false">
                                <i data-feather="tag" class="feather-icon"></i>
                                <span class="hide-menu">Complaints List</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="javasrcipt:void(0)" aria-expanded="false">
                                <i data-feather="file-plus" class="feather-icon"></i>
                                <span class="hide-menu">New Complaint</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link sidebar-link" href="{{ route('trackcomplaint.view') }}" aria-expanded="false">

                                <i data-feather="trending-up" class="feather-icon"></i>
                                <span class="hide-menu">Track Complaint </span>
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
                        <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">New Complaint</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb m-0 p-0">
                                    <li class="breadcrumb-item"><a href="{{ route('dashboard.user') }}" class="text-muted">Home</a></li>
                                    <li class="breadcrumb-item text-muted active" aria-current="page">New Complaint</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-4">
                                    <h4 class="card-title">Complaint Registration Form</h4>
                                </div>
                                <x-alert />
                                <div class="table-responsive">
                                    <form action="{{ route('newcomplaint.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <table class="table table-bordered" width="80%" cellspacing="0">
                                            <tr>
                                                <th>Complaint Type</th>
                                                <td>
                                                    <select class="form-control" id="Complaint Type" name="complaintType">
                                                        <option value="">Select Type</option>
                                                        <option value="Complaint" {{old('complaintType') == 'Complaint' ? 'selected' :''}}>Complaint</option>
                                                        <option value="Query" {{old('complaintType') == 'Query' ? 'selected' :''}}>Query</option>
                                                    </select>
                                                </td>
                                                <th>Complaint Category</th>
                                                <td>
                                                    <select class="form-control" id="Complaint Category" name="complaintCategory">
                                                        <option value="">Select Category</option>
                                                        <option value="Government" {{old('complaintCategory') == 'Government' ? 'selected' :''}}>Government</option>

                                                        <option value="Non-Government" {{old('complaintCategory') == 'Non-Government' ? 'selected' :''}}>Non-Government</option>

                                                    </select>
                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Sub-Catogory</th>
                                                <script type="text/javascript" src="../Data/SubCategory.js"></script>
                                                <td>
                                                    <select name="subCategory" class="form-control" id="Sub_Category"></select>
                                                </td>
                                                <th>Authority Department/Company</th>

                                                <td>
                                                    <script type="text/javascript" src="Data/SubCategory.js"></script>
                                                    <select name="AuthDept" class="form-control" id="AuthDept"></select>
                                                </td>
                                            </tr>
                                            <script language="javascript">
                                                SubCategory("Sub_Category", "AuthDept");

                                            </script>
                                            <tr>
                                                <th>Nature of Complaint
                                                <td> <input type="text" class="form-control" name="complaintNature" id="Nature" placeholder="Nature Of Complaint" value="{{ old('complaintNature') }}"></td>

                                                </th>
                                                <th>Date of Complaint</th>
                                                <td><input type="date" name="complaintDate" class="form-control" id="DateOfComp" value="{{ old('complaintDate') }}"></td>


                                            </tr>

                                            <tr>
                                                <th>District</th>
                                                <td>
                                                    <script type="text/javascript" src="../dist/js/countries.js"></script>
                                                    <select id="District" name="district" class="form-control"></select>
                                                </td>


                                                <th>City</th>
                                                <td>
                                                    <script type="text/javascript" src="../dist/js/countries.js"></script>
                                                    <select class="form-control" id="City" name="city"></select>
                                                </td>
                                                <script language="javascript">
                                                    populateDistricts("District", "City");

                                                </script>

                                            </tr>

                                            <tr>
                                                <th>Pincode</th>
                                                <td> <input type="number" class="form-control" id="Pincode" placeholder="Pincode" name="pincode" value="{{ old('pincode') }}"></td>




                                                <th>Ref. No</th>
                                                <td>
                                                    <p>Ex.- Doc. NO.,Order No.,Customer Id,etc.</p><input name="refNo" type="text" class="form-control" id="Refno" placeholder="Ref.No" value="{{ old('refNo') }}">


                                                </td>
                                            </tr>

                                            <tr>
                                                <th>Complaint Details</th>
                                                <td><textarea rows="3" cols="40" name="complaintDetails" class="form-control" placeholder="Please Enter Complaint Details">{{ old('complaintDetails') }}</textarea> </td>


                                            </tr>

                                            <tr>
                                                <th>Document 1</th>
                                                <td> <input type="file" class="form-control-file" id="Doc1" placeholder="Doc1" name="document1" accept="application/pdf,.doc,.docx"></td>


                                                <th>Document 2</th>
                                                <td> <input type="file" class="form-control-file" id="Doc2" placeholder="Doc2" name="document2" accept="application/pdf,.doc,.docx"></td>
                                            </tr>

                                        </table>
                                        <br><br>

                                        <button class="btn btn-success"> <i data-feather="check-circle" class="feather-icon"></i>&nbsp;&nbsp;Register Complaint</button>
                                    </form>
                                </div>

                            </div> <!-- end card-body-->
                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
                <!-- end row -->



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
                                <button class="btn btn-info my-2" data-dismiss="modal">Continue</button>
                            </div>
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
    <!-- This Page JS -->
    <script src="../assets/extra-libs/prism/prism.js"></script>
</body>

</html>
