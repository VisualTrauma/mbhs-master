<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- META SECTION -->
        <title>MBHS Enrollment System | Login</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- END META SECTION -->
        @yield('links')
        <style>
            .alert {
                position: fixed;
                float: left;
                max-width: 350px;
                width: 100%;
                margin-right: 20px;
                line-height: 21px;
                bottom: 0;
                right: 0;
                z-index: 20;
            }
        </style>
        <!-- CSS INCLUDE -->
        <link rel="stylesheet" type="text/css" href="/noti/css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="/noti/css/demo.css" />
		<link rel="stylesheet" type="text/css" href="/noti/css/ns-default.css" />
		<link rel="stylesheet" type="text/css" href="/noti/css/ns-style-attached.css" />
        <link rel="stylesheet" type="text/css" href="/noti/css/ns-style-growl.css" />
		<script src="/noti/js/modernizr.custom.js"></script>
        <link rel="icon" href="{{ URL::to('favicon.ico') }}" type="image/x-icon" />
        <link rel="stylesheet" type="text/css" id="theme" href="{{ URL::to('css/theme-serenity-head-light.css') }}"/>
        <!-- EOF CSS INCLUDE -->
    </head>
    <body class="page-container-boxed @yield('toggled')">
        <!-- START PAGE CONTAINER -->
        <div class="page-container">
            <!-- START PAGE SIDEBAR -->
            <div class="page-sidebar">
                <!-- START X-NAVIGATION -->
                <ul class="x-navigation">
                    <li class="xn-profile">
                        <a href="#" class="profile-mini">
                            <img src="{{ URL::to('assets/images/users/no-image.jpg') }}"/>
                        </a>
                        <div class="profile">
                            <div class="profile-image">
                                <img src="{{ URL::to('assets/images/users/no-image.jpg') }}" alt="User"/>
                            </div>
                            <div class="profile-data">
                                <div class="profile-data-name">{{ strtoupper(Auth::user()->first_name) }}  {{ strtoupper(Auth::user()->last_name) }}</div>
                                <div class="profile-data-title">{{ strtoupper(Auth::user()->access_level) }}</div>
                            </div>
                        </div>
                    </li>
                    <li class="xn-title">Navigation</li>
                     <li class="@yield('nav-dashboard')">
                        <a href="{{ URL::route('dashboard') }}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>
                    </li>
                     <li class="@yield('nav-summary') hidden">
                        <a href="{{ URL::route('summary') }}"><span class="fa fa-check-square-o"></span> <span class="xn-text">Enrollment Summary</span></a>
                    </li>
                    <li class="@yield('nav-start-enrollment')">
                        <a href="{{ URL::route('enrollments.index') }}"><span class="fa fa-info-circle"></span> <span class="xn-text">Enrollment</span></a>
                    </li>
                     <li class="@yield('nav-students')">
                        <a href="{{ URL::route('students.index') }}"><span class="fa fa-graduation-cap"></span> <span class="xn-text">Students</span></a>
                    </li>
                     <li class="@yield('nav-teachers')">
                        <a href="{{ URL::route('teachers.index') }}"><span class="fa fa-user"></span> <span class="xn-text">Teachers</span></a>
                    </li>
                    <li class="xn-title">Maintenance</li>
                    <li class="@yield('nav-user-accounts')">
                        <a  href="{{ URL::route('users.index') }}"><span class="fa fa-users"></span> <span class="xn-text">User Accounts</span></a>
                    </li>
                    <li class="@yield('nav-subjects')">
                        <a  href="{{ URL::route('subjects.index') }}"><span class="fa fa-book"></span> <span class="xn-text">Subjects</a>
                    </li>
                     <li class="@yield('nav-sections')">
                        <a  href="{{ URL::route('sections.index') }}"><span class="fa fa-qrcode"></span> <span class="xn-text">Sections</span></a>
                    </li>
                    <li class="@yield('nav-schedules')">
                        <a  href="{{ URL::route('schedules.index') }}"><span class="fa fa-calendar"></span> <span class="xn-text">Schedules</a>
                    </li>
                    <li class="xn-title">Others</li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-bar-chart-o"></span> <span class="xn-text">Reports</span></a>
                        <ul>
                            <li class="@yield('nav-enollment')">
                                <a href="/reports/student-enrollment"><span class="fa fa-circle"></span> <span class="xn-text">Student List</span></a>
                                <a href="/reports/teachers-list"><span class="fa fa-circle"></span> <span class="xn-text">Teacher List</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <!-- END X-NAVIGATION -->
            </div>
            <!-- END PAGE SIDEBAR -->

            <!-- PAGE CONTENT -->
            <div class="page-content">

                <!-- START X-NAVIGATION VERTICAL -->
                <ul class="x-navigation x-navigation-horizontal x-navigation-panel"> 

                    <!-- TOGGLE NAVIGATION -->  
                    <li>
                       <span style="color: white; font-size: 30px; padding-left: 10px;" id="annoucement">Pre-Enrollment On-Going</span>
                    </li>

                    <!-- SIGN OUT -->
                    <li class="xn-icon-button pull-right">
                        <a href="#" class="mb-control" data-box="#mb-signout"><span class="fa fa-sign-out"></span></a>
                    </li>
                    <!-- END SIGN OUT -->
                </ul>
                <!-- END X-NAVIGATION VERTICAL -->

                <!-- START BREADCRUMB -->
                @yield('breadcrumb')
                <!-- END BREADCRUMB -->

                <!-- PAGE TITLE -->
                @yield('page-title')
                <!-- END PAGE TITLE -->

                <!-- PAGE CONTENT WRAPPER -->
                @yield('page-content-wrapper')
                <!-- END PAGE CONTENT WRAPPER -->
            </div>
            <!-- END PAGE CONTENT -->
        </div>
        <!-- END PAGE CONTAINER -->
        @yield('message-box')
        <!-- MESSAGE BOX-->
        <div class="message-box animated fadeIn" data-sound="alert" id="mb-signout">
            <div class="mb-container">
                <div class="mb-middle">
                    <div class="mb-title"><span class="fa fa-sign-out"></span> Log <strong>Out</strong> ?</div>
                    <div class="mb-content">
                        <p>Are you sure you want to log out?</p>
                        <p>Press No if youwant to continue work. Press Yes to logout current user.</p>
                    </div>
                    <div class="mb-footer">
                        <div class="pull-right">
                            <a href="{{ URL::to('logout') }}" class="btn btn-success btn-lg">Yes</a>
                            <button class="btn btn-default btn-lg mb-control-close">No</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END MESSAGE BOX-->
        @yield('modals')

        @yield('noty')
        <!-- START PRELOADS -->
        <audio id="audio-alert" src="{{ URL::to('audio/alert.mp3') }}" preload="auto"></audio>
        <audio id="audio-fail" src="{{ URL::to('audio/fail.mp3') }}" preload="auto"></audio>
        <!-- END PRELOADS -->

    <!-- START SCRIPTS -->
        <!-- START PLUGINS -->
        <script type="text/javascript" src="{{ URL::to('js/plugins/jquery/jquery.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/plugins/jquery/jquery-ui.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/plugins/bootstrap/bootstrap.min.js') }}"></script>
        <!-- END PLUGINS -->

        <!-- START THIS PAGE PLUGINS-->
        <script type="text/javascript" src="{{ URL::to('js/plugins/icheck/icheck.min.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js') }}"></script>
        <script type='text/javascript' src="{{ URL::to('js/plugins/noty/jquery.noty.js') }}"></script>
        <script type='text/javascript' src="{{ URL::to('js/plugins/noty/layouts/topCenter.js') }}"></script>
        <script type='text/javascript' src="{{ URL::to('js/plugins/noty/layouts/topLeft.js') }}"></script>
        <script type='text/javascript' src="{{ URL::to('js/plugins/noty/layouts/topRight.js') }}"></script>
        <script type='text/javascript' src="{{ URL::to('js/plugins/noty/themes/default.js') }}"></script>
        @yield('this-page-plugins')
        <!-- END THIS PAGE PLUGINS-->

        <!-- START TEMPLATE -->
        <script type="text/javascript" src="{{ URL::to('js/plugins.js') }}"></script>
        <script type="text/javascript" src="{{ URL::to('js/actions.js') }}"></script>
        <!-- END TEMPLATE -->

        <script src="/noti/js/classie.js"></script>
		<script src="/noti/js/notificationFx.js"></script>

        <!-- CDN -->

        <script>
            $('#li-modal a').click(function(){
                $('#modal-id').modal();
            });
        </script>

        @if(session('success'))
            @include('layouts.success')
        @endif

        @if(session('errors'))
            @include('layouts.errors')
        @endif

        @yield('scripts')
    <!-- END SCRIPTS -->
    </body>
</html>
