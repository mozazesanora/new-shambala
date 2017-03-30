<!DOCTYPE html>
<!-- Template Name: Clip-One - Responsive Admin Template build with Twitter Bootstrap 3.x Version: 1.3 Author: ClipTheme -->
<!--[if IE 8]>
<html class="ie8 no-js" lang="en"><![endif]-->
<!--[if IE 9]>
<html class="ie9 no-js" lang="en"><![endif]-->
<!--[if !IE]><!-->
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- start: HEAD -->
<head>
    <title>i-Lab Admin - {web_title}</title>
    <!-- start: META -->
    <meta charset="utf-8"/>
    <!--[if IE]>
    <meta http-equiv='X-UA-Compatible' content="IE=edge,IE=9,IE=8,chrome=1"/><![endif]-->
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta content="" name="description"/>
    <meta content="" name="author"/>
    <link rel="icon" type="img/ico" href="http://infotech.umm.ac.id/assets/images/favico.png">
    <!-- end: META -->
    <!-- start: MAIN CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/adminside/plugins/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/fonts/style.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/css/main.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/css/main-responsive.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/plugins/iCheck/skins/all.css">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/adminside/plugins/bootstrap-colorpalette/css/bootstrap-colorpalette.css">
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/adminside/plugins/perfect-scrollbar/src/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/css/theme_light.css" type="text/css"
          id="skin_color">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/css/print.css" type="text/css"
          media="print"/>
    <!--[if IE 7]>
    <link rel="stylesheet"
          href="<?php echo base_url(); ?>assets/adminside/plugins/font-awesome/css/font-awesome-ie7.min.css">
    <![endif]-->
    <!-- end: MAIN CSS -->
    <!-- start: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminside/plugins/gritter/css/jquery.gritter.css">
    <!-- end: CSS REQUIRED FOR THIS PAGE ONLY -->
    <link rel="shortcut icon" href="favicon.ico"/>

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!--[if gte IE 9]><!-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <!--<![endif]-->

</head>
<!-- end: HEAD -->
<!-- start: BODY -->
<body>
<!-- start: HEADER -->
<div class="navbar navbar-inverse navbar-fixed-top">
    <!-- start: TOP NAVIGATION CONTAINER -->
    <div class="container">
        <div class="navbar-header">
            <!-- start: RESPONSIVE MENU TOGGLER -->
            <button data-target=".navbar-collapse" data-toggle="collapse" class="navbar-toggle" type="button">
                <span class="clip-list-2"></span>
            </button>
            <!-- end: RESPONSIVE MENU TOGGLER -->
            <!-- start: LOGO -->
            <a class="navbar-brand" href="<?php echo base_url(); ?>adm1n/dashboard" style="padding-top: 5px;">
                <img src="<?php echo base_url(); ?>assets/img/logo.png" alt="logo" height="40px">
            </a>
            <!-- end: LOGO -->
        </div>
        <div class="navbar-tools">          
            <!-- start: TOP NAVIGATION MENU -->
            <ul class="nav navbar-right">
                <!-- start: ner menu -->
                        <li class="dropdown">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true" href="#">
                                <i class="clip-stack-2"> Sub System</i>
                            </a>
                            <ul class="dropdown-menu todo">
                                <li>
                                    <span class="dropdown-menu-title"><i class="clip-list-6"> </i> You have a sub system</span>
                                </li>
                                <li>
                                    <div class="drop-down-wrapper">
                                        <ul>
                                            <li>
                                                <a class="todo-list" href="#">
                                                    <i class="fa fa-archive"></i> Inventory System
                                                </a>
                                            </li>
                                            <li>
                                                <a href="">
                                                    <i class="fa fa-user"></i> Manajemen Asistant
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </li>    
                <!-- start: USER DROPDOWN -->
                <li class="dropdown current-user">
                    <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" data-close-others="true"
                       href="#">
                        <img src="<?php
                        //load from session
                        $user_ses = $this->session->userdata(base_url() . '_user_adm1n');
                        $file_name = md5($user_ses->id . "photo") . $user_ses->id . ".jpg"; //make filename hashing
                        if (file_exists("./uploads/user_photos/$file_name")) {
                            echo base_url() . "uploads/user_photos/$file_name";
                        } else {
                            echo base_url() . "assets/img/avatar.png";
                        }
                        ?>" class="circle-img" alt="" height="30px">
                        <span class="username"><?php
                            $user_ses = $this->session->userdata(base_url() . '_user_adm1n');
                            echo $user_ses->user_name;
                            ?></span>
                        <i class="clip-chevron-down"></i>
                    </a>
                    <ul class="dropdown-menu" style="min-width: 210px;">
                        <li>
                            <a href="#" style="cursor: default;">Section : <?php echo $user_ses->section; ?> </a>
                        </li>
                        <li>
                            <a href="#" style="cursor: default;">Last Login : <?php echo $user_ses->last_login; ?> </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>adm1n/log"><i class="clip-health"></i>
                                &nbsp;Log </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>adm1n/lock"><i class="clip-locked"></i>
                                &nbsp;Lock Screen </a>
                        </li>
                        <li>
                            <a href="<?php echo base_url(); ?>adm1n/logout">
                                <i class="clip-exit"></i>
                                &nbsp;Log Out
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- end: USER DROPDOWN -->
            </ul>
            <!-- end: TOP NAVIGATION MENU -->
        </div>
    </div>
    <!-- end: TOP NAVIGATION CONTAINER -->
</div>
<!-- end: HEADER -->

<!-- start: MAIN CONTAINER -->
<div class="main-container">
    <div class="navbar-content">
        <!-- start: SIDEBAR -->
        <div class="main-navigation navbar-collapse collapse">
            <!-- start: MAIN MENU TOGGLER BUTTON -->
            <div class="navigation-toggler">
                <i class="clip-chevron-left"></i>
                <i class="clip-chevron-right"></i>
            </div>
            <!-- end: MAIN MENU TOGGLER BUTTON -->
            <?php
            //show menu restrict
            function restric($session, $list)
            {
                foreach ($list as $l) {
                    if (strcmp($l, $session) == 0) {
                        return true;
                    }
                }
                return false;
            }

            ?>

            <!-- start: MAIN NAVIGATION MENU -->
            <ul class="main-navigation-menu">
                <li class="{menu_dashboard}">
                    <a href="<?php echo base_url(); ?>adm1n/dashboard"><i class="clip-home-3"></i>
                        <span class="title"> Dashboard </span><span class="selected"></span>
                    </a>
                </li>
                <?php
                if (restric($user_ses->section, array("Super Admin", "Certification", "Research"))) {
                    ?>
                    <li class="{menu_certification}">
                        <a href="<?php echo base_url(); ?>adm1n/certification"><i class="clip-file-2"></i>
                            <span class="title"> Certification </span><span class="selected"></span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (restric($user_ses->section, array("Super Admin", "Receptionist", "Research"))) {
                    ?>
                    <li class="{menu_class}">
                        <a href="<?php echo base_url(); ?>adm1n/class"><i class="clip-tag"></i>
                            <span class="title"> Class </span><span class="selected"></span>
                        </a>
                    </li>
                    <li class="{menu_schedule}">
                        <a href="<?php echo base_url(); ?>adm1n/schedule"><i class="clip-calendar"></i>
                            <span class="title"> Schedule </span><span class="selected"></span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (restric($user_ses->section, array("Super Admin", "Receptionist", "Research", "Press"))) {
                    ?>
                    <li class="{menu_info}">
                        <a href="<?php echo base_url(); ?>adm1n/info"><i class="clip-note"></i>
                            <span class="title"> Info </span><span class="selected"></span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (restric($user_ses->section, array("Super Admin", "Receptionist", "Research", "Maintenance"))) {
                    ?>
                    <li class="{menu_left_stuff}">
                        <a href="<?php echo base_url(); ?>adm1n/left-stuff"><i class="clip-t-shirt"></i>
                            <span class="title"> Left Stuff </span><span class="selected"></span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (restric($user_ses->section, array("Super Admin", "Receptionist", "Research", "Maintenance"))) {
                    ?>
                    <li class="{menu_suggest_form}">
                        <a href="<?php echo base_url(); ?>adm1n/form_suggest"><i class="clip-bubbles"></i>
                            <span class="title"> Suggestion Form </span><span class="selected"></span>
                        </a>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (restric($user_ses->section, array("Super Admin", "Receptionist", "Research"))) {
                    ?>
                    <li class="{menu_inventory}">
                        <a href="javascript:void(0)"><i class="fa fa-archive"></i>
                            <span class="title"> Inventory </span><i class="icon-arrow"></i>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="{menu_inventory_item}">
                                <a href="<?php echo base_url(); ?>adm1n/inventory/item">
                                    <span class="title"> <i class="fa fa-legal"></i> Item and Tools</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="sub-menu">
                            <li class="{menu_room}">
                                <a href="<?php echo base_url(); ?>adm1n/inventory/room">
                                    <span class="title"><i class="fa fa-home"></i> Room Manajement</span>
                                </a>                                
                            </li>                            
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (restric($user_ses->section, array("Super Admin","Research", "Receptionist"))) {
                    ?>
                    <li class="{menu_user}">
                        <a href="javascript:void(0)"><i class="clip-users-3"></i>
                            <span class="title"> Users </span><i class="icon-arrow"></i>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="{menu_user_all}">
                                <a href="<?php echo base_url(); ?>adm1n/user">
                                    <span class="title"> <i class="clip-users-3"></i> All User</span>
                                </a>
                            </li>
                            <li class="{menu_user_student}">
                                <a href="<?php echo base_url(); ?>adm1n/user/student">
                                    <span class="title"> <i class="clip-user-2"></i> Students</span>
                                </a>
                            </li>
                            <li class="{menu_user_assistant}">
                                <a href="<?php echo base_url(); ?>adm1n/user/assistant">
                                    <span class="title"> <i class="clip-user-3"></i> Assistants</span>
                                </a>
                            </li>
                            <li class="{menu_user_instructor}">
                                <a href="<?php echo base_url(); ?>adm1n/user/instructor">
                                    <span class="title"> <i class="clip-user-4"></i> Teachers</span>
                                </a>
                            </li>
                            <?php
                            if (strcmp($user_ses->section, "Super Admin") == 0) {
                                ?>
                                <li class="{menu_user_admin}">
                                    <a href="<?php echo base_url(); ?>adm1n/user/admin">
                                        <span class="title"> <i class="clip-user-5"></i> Admins</span>
                                    </a>
                                </li>
                                <?php
                            }
                            ?>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <?php
                if (restric($user_ses->section, array("Super Admin","Research", "Receptionist"))) {
                    ?>
                    <li class="{menu_user}">
                        <a href="javascript:void(0)"><i class="fa fa-print"></i>
                            <span class="title"> Report </span><i class="icon-arrow"></i>
                            <span class="selected"></span>
                        </a>
                        <ul class="sub-menu">
                            <li class="{menu_user_all}">
                                <a href="<?php echo base_url(); ?>adm1n/user">
                                    <span class="title"> <i class="fa fa-print"></i> Fee Assistant</span>
                                </a>
                            </li>
                            <li class="{menu_user_student}">
                                <a href="<?php echo base_url(); ?>adm1n/user/student">
                                    <span class="title"> <i class="fa fa-print"></i> Fee Instructor</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <?php
                }
                ?>
                <li class="{menu_suggest}">
                    <a href="<?php echo base_url(); ?>adm1n/suggest"><i class="clip-lamp"></i>
                        <span class="title"> Suggest </span><span class="selected"></span>
                    </a>
                </li>
                <?php
                if (restric($user_ses->section, array("Super Admin", "Research"))) {
                    ?>
                    <li class="{menu_setting}">
                        <a href="<?php echo base_url(); ?>adm1n/setting"><i class="clip-cog"></i>
                            <span class="title">Setting</span>
                            <span class="selected"></span>
                        </a>
                    </li>
                    <?php
                }
                ?>


            </ul>
            <!-- end: MAIN NAVIGATION MENU -->
        </div>
        <!-- end: SIDEBAR -->
    </div>
    <!-- start: PAGE -->
    <div class="main-content">
        <!-- end: SPANEL CONFIGURATION MODAL FORM -->
        <div class="container">
            <!-- start: PAGE HEADER -->
            <div class="row">
                <div class="col-sm-12">
                    <!-- start: PAGE TITLE & BREADCRUMB -->
                    <ol class="breadcrumb">

                        <li>
                            <i class="clip-home-3"></i>
                            <a href="<?php echo base_url(); ?>adm1n/dashboard">
                                Dashboard
                            </a>
                        </li>
                        <?php
                        for ($i = 0; $i < count($tree_menu); $i++) {
                            ?>
                            <li><a href="<?php echo $tree_menu[$i]['link'] ?>"><?php echo $tree_menu[$i]['value'] ?></a>
                            </li>
                            <?php
                        }
                        ?>
                        <li>{web_title}</li>
                    </ol>
                    <div class="page-header">
                        <h1><i class="<?php echo $web_page_icon; ?>"></i> {web_title}
                            <small>{web_sub_title}</small>
                        </h1>
                    </div>
                    <!-- end: PAGE TITLE & BREADCRUMB -->
                </div>
            </div>
            <!-- end: PAGE HEADER -->
            <!-- start: PAGE CONTENT -->
            {web_body}
            <!-- end: PAGE CONTENT-->
        </div>
    </div>
    <!-- end: PAGE -->
</div>
<!-- end: MAIN CONTAINER -->
<!-- start: FOOTER -->
<div class="footer clearfix">
    <div class="footer-inner">
        2016 &copy; i-Lab Project.
    </div>
    <div class="footer-items">
        <span class="go-top"><i class="clip-chevron-up"></i></span>
    </div>
</div>
<!-- end: FOOTER -->
<!-- start: MAIN JAVASCRIPTS -->
<!--[if lt IE 9]>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/respond.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/excanvas.min.js"></script>
<![endif]-->
<script src="<?php echo base_url(); ?>assets/adminside/plugins/jquery-ui/jquery-ui-1.10.2.custom.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/bootstrap/js/bootstrap.min.js"></script>
<script
    src="<?php echo base_url(); ?>assets/adminside/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/blockUI/jquery.blockUI.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/iCheck/jquery.icheck.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/perfect-scrollbar/src/jquery.mousewheel.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/perfect-scrollbar/src/perfect-scrollbar.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/less/less-1.5.0.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/jquery-cookie/jquery.cookie.js"></script>
<script
    src="<?php echo base_url(); ?>assets/adminside/plugins/bootstrap-colorpalette/js/bootstrap-colorpalette.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/js/main.js"></script>
<!-- end: MAIN JAVASCRIPTS -->
<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script
    src="<?php echo base_url(); ?>assets/adminside/plugins/bootstrap-paginator/src/bootstrap-paginator.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/jquery.pulsate/jquery.pulsate.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/plugins/gritter/js/jquery.gritter.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminside/js/ui-elements.js"></script>
<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
<script>
    jQuery(document).ready(function () {
        Main.init();
        UIElements.init();
    });
</script>
</body>
<!-- end: BODY -->
</html>

<?php
require('footer_library.php');
?>