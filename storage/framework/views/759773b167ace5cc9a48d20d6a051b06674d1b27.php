<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="images/favicon.ico" type="image/ico" />

        <title>MeetDoc </title>

        <!-- Bootstrap -->
        <link href="<?php echo e(asset('css/bootstrap.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/bootstrap.min.css')); ?>" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="<?php echo e(('css/font-awesome.min.css')); ?>" rel="stylesheet">
        <!-- NProgress -->
        <link href="<?php echo e(('css/nprogress.css')); ?>" rel="stylesheet">
        <!-- iCheck -->
        <link href="<?php echo e(('css/green.css')); ?>" rel="stylesheet">

        <!-- bootstrap-progressbar -->
        <link href="<?php echo e(('css/bootstrap-progressbar-3.3.4.min.css')); ?>" rel="stylesheet">
        <!-- JQVMap -->
        <link href="<?php echo e(('css/jqvmap.min.css')); ?>" rel="stylesheet"/>
        <!-- bootstrap-daterangepicker -->
        <link href="<?php echo e(('css/daterangepicker.css')); ?>" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="css/custom.min.css" rel="stylesheet">
        <?php echo $__env->yieldContent('script'); ?>
    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="index.html" class="site_title"><i class="fa fa-paw"></i> <span>MeetDoc</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile clearfix">
                            <div class="profile_pic">
                                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Bienvenue,</span>
                                <h2>TRAORE Ibrahim</h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <h3>General</h3>
                                <ul class="nav side-menu">
                                    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="index.html">Tableau de Bord</a></li>

                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-edit"></i>Parametrage <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="form.html">Structure</a></li>
                                            <li><a href="form_advanced.html">Laboratoire</a></li>
                                            <li><a href="form_validation.html">Medecin</a></li>
                                            <li><a href="form_wizards.html">Patient</a></li>

                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-desktop"></i>Rendez vous<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="general_elements.html">Disponibilite</a></li>
                                            <li><a href="general_elements.html">Consultation</a></li>
                                            <li><a href="media_gallery.html">Examen</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-table"></i> Utilisateurs <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="tables.html">Tables</a></li>
                                            <li><a href="tables_dynamic.html">Table Dynamic</a></li>
                                        </ul>
                                    </li>



                                </ul>
                            </div>
                            <div class="menu_section">
                                <h3>Statistiques</h3>
                                <ul class="nav side-menu">

                                    <li><a><i class="fa fa-sitemap"></i> Statistiques <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">

                                            <li><a>Medecin<span class="fa fa-chevron-down"></span></a>
                                                <ul class="nav child_menu">
                                                    <li class="sub_menu"><a href="level2.html">Disponibilite</a>
                                                    </li>
                                                    <li><a href="#level2_1">Consultation</a>
                                                    </li>
                                                    <li><a href="#level2_2">Patient</a>
                                                    </li>
                                                </ul>
                                            </li>

                                        </ul>
                                    </li>                  

                                </ul>
                            </div>

                        </div>
                        <!-- /sidebar menu -->

                        <!-- /menu footer buttons -->
                        <div class="sidebar-footer hidden-small">
                            <a data-toggle="tooltip" data-placement="top" title="Settings">
                                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Lock">
                                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                            </a>
                            <a data-toggle="tooltip" data-placement="top" title="Logout" href="login.html">
                                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                            </a>
                        </div>
                        <!-- /menu footer buttons -->
                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>
                        <nav class="nav navbar-nav">
                            <ul class=" navbar-right">
                                <li class="nav-item dropdown open" style="padding-left: 15px;">
                                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                        <img src="images/img.jpg" alt="">TRAORE Ibrahim
                                    </a>
                                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item"  href="javascript:;"> Profile</a>
                                        <a class="dropdown-item"  href="javascript:;">
                                            <span class="badge bg-red pull-right">50%</span>
                                            <span>Settings</span>
                                        </a>
                                        <a class="dropdown-item"  href="javascript:;">Help</a>
                                        <a class="dropdown-item"  href="login.html"><i class="fa fa-sign-out pull-right"></i> Log Out</a>
                                    </div>
                                </li>

                                <li role="presentation" class="nav-item dropdown open">
                                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="badge bg-green">6</span>
                                    </a>
                                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                                        <li class="nav-item">
                                            <a class="dropdown-item">
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item">
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item">
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="dropdown-item">
                                                <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                                                <span>
                                                    <span>John Smith</span>
                                                    <span class="time">3 mins ago</span>
                                                </span>
                                                <span class="message">
                                                    Film festivals used to be do-or-die moments for movie makers. They were where...
                                                </span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <div class="text-center">
                                                <a class="dropdown-item">
                                                    <strong>See All Alerts</strong>
                                                    <i class="fa fa-angle-right"></i>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- /top navigation -->

                <!-- page content -->
                <div class="right_col" role="main">
                    <?php echo $__env->yieldContent('content'); ?>

                </div>
                <!-- /page content -->

                <!-- footer content -->
                <footer>
                    <div class="pull-right">
                        Tous droits reservés à la Societe NETFA @2020
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="<?php echo e(('js/jquery.min.js')); ?>"></script>
        <!-- Bootstrap -->
        <script src="<?php echo e(asset('js/bootstrap.min.js')); ?>"></script>
        <script src="<?php echo e(('js/bootstrap.bundle.min.js')); ?>"></script>
        <!-- FastClick -->
        <script src="<?php echo e(('js/fastclick.js')); ?>"></script>
        <!-- NProgress -->
        <script src="<?php echo e(('css/nprogress.js')); ?>"></script>
        <!-- Chart.js -->
        <script src="<?php echo e(('js/Chart.min.js')); ?>"></script>
        <!-- gauge.js -->
        <script src="<?php echo e(('js/gauge.min.js')); ?>"></script>
        <!-- bootstrap-progressbar -->
        <script src="<?php echo e(('js/bootstrap-progressbar.min.js')); ?>"></script>
        <!-- iCheck -->
        <script src="<?php echo e(('js/icheck.min.js')); ?>"></script>
        <!-- Skycons -->
        <script src="<?php echo e(('js/skycons.js')); ?>"></script>
        <!-- Flot -->
        <script src="<?php echo e(('js/jquery.flot.js')); ?>"></script>
        <script src="<?php echo e(('js/jquery.flot.pie.js')); ?>"></script>
        <script src="<?php echo e(('js/jquery.flot.time.js')); ?>"></script>
        <script src="<?php echo e(('js/jquery.flot.stack.js')); ?>"></script>
        <script src="<?php echo e(('js/jquery.flot.resize.js')); ?>"></script>
        <!-- Flot plugins -->
        <script src="<?php echo e(('js/jquery.flot.orderBars.js')); ?>"></script>
        <script src="<?php echo e(('js/jquery.flot.spline.min.js')); ?>"></script>
        <script src="<?php echo e(('js/curvedLines.js')); ?>"></script>
        <!-- DateJS -->
        <script src="<?php echo e(('js/date.js')); ?>"></script>
        <!-- JQVMap -->
        <script src="<?php echo e(('js/jquery.vmap.js')); ?>"></script>
        <script src="<?php echo e(('js/jquery.vmap.world.js')); ?>"></script>
        <script src="<?php echo e(('js/jquery.vmap.sampledata.js')); ?>"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="<?php echo e(('js/moment.min.js')); ?>"></script>
        <script src="<?php echo e(('js/daterangepicker.js')); ?>"></script>

        <!-- Custom Theme Scripts -->
        <script src="<?php echo e(('js/custom.min.js')); ?>"></script>

    </body>
</html>


<?php /**PATH C:\xampp\htdocs\montest6\resources\views/gentelella-master/production/template.blade.php ENDPATH**/ ?>