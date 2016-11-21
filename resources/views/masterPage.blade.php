<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title> HR Section - Home</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

@section('css_ref')
    <!-- Bootstrap 3.3.5 -->

        <link rel="stylesheet" href="{{asset('bootstrap/css/bootstrap.min.css')}}">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
        <!-- Theme style -->
        <link rel="stylesheet" href="{{asset('dist/css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{asset('dist/css/custom.css')}}">
        <link rel="stylesheet" href="{{asset('/plugins/sweetAlert/sweetalert.css')}}">

        <link rel="stylesheet" href="{{asset('/plugins/datatables/dataTables.bootstrap.css')}}">

        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

        <script src="http://code.jquery.com/jquery-3.1.1.min.js"></script>

        <script type="text/javascript" src="http://code.jquery.com/jquery-1.7.1.min.js"></script>

        <script type="text/javascript" charset="utf8"
                src="http://cdn.datatables.net/1.10.10/js/jquery.dataTables.js"></script>

        <link rel="stylesheet" type="text/css"
              href="{{asset('plugins/jquery.datepick.package-5.0.1/jquery.datepick.css')}}">

        <script type="text/javascript"
                src="{{asset('plugins/jquery.datepick.package-5.0.1/jquery.plugin.js')}}"></script>

        <script type="text/javascript"
                src="{{asset('plugins/jquery.datepick.package-5.0.1/jquery.datepick.js')}}"></script>


        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="{{asset('dist/css/skins/_all-skins.min.css')}}">

        <style>
            .small-box {
                border-radius: 1px;
                box-shadow: 0 3px 4px rgba(0, 0, 0, 0.3);
            }
        </style>

    @show

    {{--<link rel="stylesheet" href="{{asset('/sweetalert.css')}}">--}}
    {{--<script src="{{ asset("/sweetalert.min.js") }}">--}}

    {{--</script>--}}


    <link rel="stylesheet" href="{{asset('/plugins/jquery.dataTables/jquery.dataTables.css')}}">


@show





<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <header class="main-header">

        <!-- Logo -->
        <a href="{{action('HomeController@index')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>H</b>R</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>HOME</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('dist/img/user2-160x160.jpg')}}" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li><!-- end message -->
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('dist/img/user3-128x128.jpg')}}" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                AdminLTE Design Team
                                                <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('dist/img/user4-128x128.jpg')}}" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Developers
                                                <small><i class="fa fa-clock-o"></i> Today</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('dist/img/user3-128x128.jpg')}}" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Sales Department
                                                <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="pull-left">
                                                <img src="{{asset('dist/img/user4-128x128.jpg')}}" class="img-circle"
                                                     alt="User Image">
                                            </div>
                                            <h4>
                                                Reviewers
                                                <small><i class="fa fa-clock-o"></i> 2 days</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>
                    <!-- Notifications: style can be found in dropdown.less -->
                    <li class="dropdown notifications-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-bell-o"></i>
                            <span class="label label-warning">10</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 10 notifications</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-warning text-yellow"></i> Very long description here that
                                            may not fit into the page and may cause design problems
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-users text-red"></i> 5 new members joined
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-shopping-cart text-green"></i> 25 sales made
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-user text-red"></i> You changed your username
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="footer"><a href="#">View all</a></li>
                        </ul>
                    </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Design some buttons
                                                <small class="pull-right">20%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-aqua" style="width: 20%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">20% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Create a nice theme
                                                <small class="pull-right">40%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-green" style="width: 40%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">40% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Some task I need to do
                                                <small class="pull-right">60%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-red" style="width: 60%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">60% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                    <li><!-- Task item -->
                                        <a href="#">
                                            <h3>
                                                Make beautiful transitions
                                                <small class="pull-right">80%</small>
                                            </h3>
                                            <div class="progress xs">
                                                <div class="progress-bar progress-bar-yellow" style="width: 80%"
                                                     role="progressbar" aria-valuenow="20" aria-valuemin="0"
                                                     aria-valuemax="100">
                                                    <span class="sr-only">80% Complete</span>
                                                </div>
                                            </div>
                                        </a>
                                    </li><!-- end task item -->
                                </ul>
                            </li>
                            <li class="footer">
                                <a href="#">View all tasks</a>
                            </li>
                        </ul>
                    </li>
                    @if (Auth::guest())

                        <li><a href="{{url('/login')}}">Login</a></li>
                @else
                    <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="@if(Auth::user()->image != "null"){{asset('/profile_images/'.Auth::user()->image )}}@else{{asset('dist/img/bgImage.png')}}@endif"
                                     class="user-image" alt="User Image">
                                <span class="hidden-xs">Assistant Manager</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="@if(Auth::user()->image != "null"){{asset('/profile_images/'.Auth::user()->image )}}@else{{asset('dist/img/bgImage.png')}}@endif"
                                         class="img-circle" alt="User Image">
                                    <p>
                                        {{ Auth::user()->name }}

                                        <small>Member since Nov. 2012</small>
                                    </p>
                                </li>


                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{url('/EditProfile')}}" class="btn btn-default btn-flat">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>

                            </ul>
                </ul>
            </div>
            @endif

        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->

            <!-- search form -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                            class="fa fa-search"></i></button>
              </span>
                </div>
            </form>


            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="header">MAIN NAVIGATION</li>

                <li class="active treeview">

                <li><a href="#"><i class="fa fa-circle-o text-red"></i>

                        <span>HR Management</span> <i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="">
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i><span>Manage My Employees</span>
                                <i class="fa fa-angle-left pull-right"></i></a>

                            <ul class="treeview-menu ">
                                <li><a href="{{action('HRController@addEmployee')}}"><i
                                                class="fa fa-circle-o"></i>Add Employees</a></li>
                                <li><a href="{{action('HRController@loadUpdateEmployees')}}"><i
                                                class="fa fa-circle-o"></i> Update Employee Details</a></li>
                                <li><a href="{{action('HRController@searchEmployee')}}"><i
                                                class="fa fa-circle-o"></i> View All</a></li>
                            </ul>
                        </li>
                        </li>
                        <li class="">
                            <a href="{{action('PageController@yearly_Increment_Calculator')}}"><i
                                        class="fa fa-circle-o text-red"></i><span>Yearly increment Calculator</span>
                                <i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu menu-open">
                                <li><a href="{{action('HRController@loadEmpSalary')}}"><i
                                                class="fa fa-circle-o"></i> Add Employee Salary Details</a></li>
                                <li><a href="{{action('HRController@searchSalaryDetails')}}"><i class="fa fa-circle-o"></i>View Salary Details</a></li>

                            </ul>
                        </li>
                        <li class="active treeview">
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i>
                                <span>Loan Request</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">

                                <li><a href="{{action('LoanPagesController@addLoan')}}"><i class="fa fa-circle-o"></i>Add Loan Details</a></li>
                                <li><a href="{{action('LoanPagesController@loadUpdateLoan')}}"><i class="fa fa-circle-o"></i>Update Loan Details</a></li>
                                <li><a href="{{action('LoanPagesController@viewLoans')}}"><i class="fa fa-circle-o"></i>View Loan Details</a></li>


                            </ul>
                        </li>

                    </ul>


                </li>


                <li class="active treeview">
                <li><a href="#"><i class="fa fa-circle-o text-purple"></i>
                        <span>Leave Management</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{url('/LeaveMgt/applyleave')}}"><i
                                        class="fa fa-circle-o text-purple"></i>Apply leave</a></li>
                        <li><a href="{{url('/view_remaining')}}"><i
                                        class="fa fa-circle-o text-purple"></i>View remaining leaves</a></li>

                        <li class="active treeview">
                        <li><a href="#"><i class="fa fa-circle-o text-purple"></i>
                                <span>Maternity Leaves</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">

                                <li><a href="{{action('MleavesController@addMleaves')}}"><i class="fa fa-circle-o"></i>Add Leave</a></li>
                                <li><a href="{{action('MleavesController@loadUpdateMleaves')}}"><i class="fa fa-circle-o"></i>Update Leave Details</a></li>
                                <li><a href="{{action('MleavesController@viewMleaves')}}"><i class="fa fa-circle-o"></i>View Leave Details</a></li>


                            </ul>
                        </li>
                    </ul>
                </li>


                <li><a href="{{action('UserRegisterController@index')}}"><i
                                class="fa fa-circle-o text-green"></i>
                        <span>User Management</span></a>




                <li class="active treeview">
                <li><a href="#"><i class="fa fa-circle-o text-yellow"></i>
                        <span>Population Details</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{action('DetailController@loadAddDetail')}}"><i
                                        class="fa fa-circle-o text-yellow"></i>Add Birth Certificate Details</a></li>
                        <li><a href="{{action('DetailController@loadBCDetails')}}"><i
                                        class="fa fa-circle-o text-yellow"></i>View Birth Certificates </a></li>

                    </ul>
                </li>

                <li class="active treeview">
                <li><a href="#"><i class="fa fa-circle-o text-blue"></i>
                        <span>Land Division</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">


                        <li class="active treeview">
                        <li><a href="#"><i class="fa fa-circle-o text-blue"></i>
                                <span>LDO Permit</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">

                                <li><a href="{{action('LDOPermitController@index')}}"><i class="fa fa-circle-o"></i>Add, Delete & Update</a></li>


                            </ul>
                        </li>


                        <li class="active treeview">
                        <li><a href="#"><i class="fa fa-circle-o text-blue"></i>
                                <span>Deed</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">

                                <li><a href="{{action('DeedController@index')}}"><i class="fa fa-circle-o"></i>Add, Delete & Update</a></li>


                            </ul>
                        </li>


                        <li class="active treeview">
                        <li><a href="#"><i class="fa fa-circle-o text-blue"></i>
                                <span>Middle Class</span><i class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">

                                <li><a href="{{action('MiddleClassController@index')}}"><i class="fa fa-circle-o"></i>Add, Delete & Update</a></li>


                            </ul>
                        </li>


                    </ul>
                </li>

                <li class="active treeview">
                <li><a href="#"><i class="fa fa-circle-o text-green"></i>
                        <span>Broadcast Note</span><i class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">


                        <li class="active treeview">
                        <li><a href="{{action('EditorController@addNote')}}"><i class="fa fa-circle-o text-green"></i>
                                <span>New Note</span></a>

                        </li>



                    </ul>
                </li>


            </ul>

        </section>
        <!-- /.sidebar -->
    </aside>


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content-header">
            @yield('content_header')
        </section>

        <section class="content">
            @yield('content')


        </section>
    </div>

    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.3.0
        </div>
        <strong>Copyright &copy; 2015-2016 <a href="http://almsaeedstudio.com">Wanathawilluwa Secretariat
                Office</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="menu-icon fa fa-user bg-yellow"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>
                                <p>New phone +1(800)555-1234</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>
                                <p>nora@example.com</p>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="menu-icon fa fa-file-code-o bg-green"></i>
                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>
                                <p>Execution time 5 seconds</p>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h4 class="control-sidebar-subheading">
                                Update Resume
                                <span class="label label-success pull-right">95%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h4 class="control-sidebar-subheading">
                                Laravel Integration
                                <span class="label label-warning pull-right">50%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <h4 class="control-sidebar-subheading">
                                Back End Framework
                                <span class="label label-primary pull-right">68%</span>
                            </h4>
                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
                            </div>
                        </a>
                    </li>
                </ul><!-- /.control-sidebar-menu -->

            </div><!-- /.tab-pane -->

            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>
                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Some information about this general settings option
                        </p>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Allow mail redirect
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Other sets of options are available
                        </p>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Expose author name in posts
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                        <p>
                            Allow the user to show his name in blog posts
                        </p>
                    </div><!-- /.form-group -->

                    <h3 class="control-sidebar-heading">Chat Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Show me as online
                            <input type="checkbox" class="pull-right" checked>
                        </label>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Turn off notifications
                            <input type="checkbox" class="pull-right">
                        </label>
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Delete chat history
                            <a href="" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                        </label>
                    </div><!-- /.form-group -->
                </form>
            </div><!-- /.tab-pane -->
        </div>

    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
         immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>

</div><!-- ./wrapper -->
@section('js_ref')
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>

    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('bootstrap/js/bootstrap.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('plugins/fastclick/fastclick.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <!-- Sparkline -->
    <script src="{{asset('plugins/sparkline/jquery.sparkline.min.js')}}"></script>
    <!-- jvectormap -->
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="{{asset('plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
    {{--<!-- ChartJS 1.0.1 -->--}}
    {{--<script src="{{asset('plugins/chartjs/Chart.min.js')}}"></script>--}}
    {{--<!-- AdminLTE dashboard demo (This is only for demo purposes) -->--}}
    {{--<script src="{{asset('dist/js/pages/dashboard2.js')}}"></script>--}}
    <!-- AdminLTE for demo purposes -->
    <script src="{{asset('dist/js/demo.js')}}"></script>
    <script src="{{asset('/plugins/sweetAlert/sweetalert.min.js')}}"></script>


    <script src="{{asset('/plugins/jquery.dataTables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/plugins/jquery.dataTables/dataTables.bootstrap.min.js')}}"></script>



@show
<script>
    @if (Notify::has('success'))
     swal("success!", "{{ Notify::first('success') }}", "success");
    @endif
    @if (Notify::has('error'))
        swal("error!", "{{ Notify::first('error') }}", "error");
    @endif
    @if (Notify::has('warning'))
        swal("warning!", "{{ Notify::first('warning') }}", "warning");
    @endif
    @if (Notify::has('info'))
        swal("info!", "{{ Notify::first('info') }}", "info");
    @endif

</script>



</body>
</html>
