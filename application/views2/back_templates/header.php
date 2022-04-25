<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>RPC Agence Immobilier</title>
		<link rel="shortcut icon" type="image/png" href="<?php echo base_url('assets/images/logo.png') ?>"/>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('back_assets/css/bootstrap.min.css') ?>" />
        <!-- Font Awesome -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('back_assets/css/font-awesome.min.css') ?>" />
        <!-- Ionicons -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('back_assets/css/ionicons.min.css') ?>" />
        <!-- Theme style -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('back_assets/css/AdminLTE.min.css') ?>" />
        <!-- folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('back_assets/css/skins/_all-skins.min.css') ?>" />
        <!-- Date Picker -->
        <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url('back_assets/css/bootstrap-datepicker.min.css') ?>" />
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <!-- Logo -->
                <a href="<?php echo site_url('back_ctrl'); ?>" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>A</b>IMO</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Agence </b>Immobilier</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- User Account: style can be found in dropdown.less -->
                            <li class="dropdown user user-menu">
                                <div class="dropdown">
                                    <a href="javascript:myFunction()" class="dropbtn" >
                                        <img src="<?php echo base_url('back_assets/img/User_Avatar_2.png'); ?>" class="user-image" alt="User Image">
                                        <span class="hidden-xs"><i class="fa fa-angle-down"></i><?php echo $admin->getPrenom() . " " . $admin->getNom(); ?></span>
                                    </a>
                                    <div id="myDropdown" class="dropdown-content">
                                        <a href="<?php echo site_url('back_ctrl/index/logout') ?>" >Déconnexion</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <!-- MENU -->
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="<?php if ('Bien' == $menu_actif) echo "active"; ?> treeview">
                            <a href="#">
                                <i class="fa fa-dashboard"></i> <span> Annonce</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php foreach ($menu as $key => $value): ?>
                                    <li class="<?php if ($value == $sous_menu_actif) echo "active"; ?> "><a href="<?php echo site_url('back_ctrl/Annonce_Ctrl/' . $value); ?>"><i class="fa fa-circle-o"></i> <?php echo $value ?></a></li>
                                <?php endforeach; ?>
                            </ul>
                        </li>
                        <li class="<?php if ('Alertemail' == $menu_actif) echo "active"; ?>">
                            <a href="<?php echo site_url('back_ctrl/Alertemail'); ?>">
                                <i  class="fa fa-th"></i> <span>Alert Email</span>
                            </a>
                        </li>
                        <li class="<?php if ('Estimationbien' == $menu_actif) echo "active"; ?>">
                            <a href="<?php echo site_url('back_ctrl/Estimationbien'); ?>">
                                <i class="fa fa-th"></i> <span>Estimation bien</span>
                            </a>
                        </li>
                        <li class="<?php if ('Notificationbien' == $menu_actif) echo "active"; ?>">
                            <a href="<?php echo site_url('back_ctrl/Notificationbien'); ?>">
                                <i class="fa fa-th"></i> <span>Notification</span>
                            </a>
                        </li>
                        <li class="<?php if ('Actualite' == $menu_actif) echo "active"; ?>">
                            <a href="<?php echo site_url('back_ctrl/Actualite_Ctrl'); ?>">
                                <i class="fa fa-th"></i> <span>Actualite</span>
                            </a>
                        </li>
                        <li class="<?php if ('Texte_defilante' == $menu_actif) echo "active"; ?>">
                            <a href="<?php echo site_url('back_ctrl/Texte_Ctrl'); ?>">
                                <i class="fa fa-th"></i> <span>Texte défilante</span>
                            </a>
                        </li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>
            <!-- END-MENU -->
            <style>
                /* Dropdown Button */
                .dropbtn {
                    /*background-color: #3498DB;*/
                    color: black;
                    padding: 16px;
                    font-size: 16px;
                    border: none;
                    cursor: pointer;
                }

                /*                 Dropdown button on hover & focus
                                .dropbtn:hover, .dropbtn:focus {
                                    background-color: #2980B9;
                                }*/

                /* The container <div> - needed to position the dropdown content */
                /*                .dropdown {
                                    position: relative;
                                    display: inline-block;
                                }*/

                /* Dropdown Content (Hidden by Default) */
                .dropdown-content {
                    display: none;
                    position: absolute;
                    background-color: #f1f1f1;
                    min-width: 160px;
                    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                    z-index: 1;
                }

                /* Links inside the dropdown */
                .dropdown-content a {
                    color: black;
                    padding: 12px 16px;
                    text-decoration: none;
                    display: block;
                }

                /* Change color of dropdown links on hover */
                .dropdown-content a:hover {background-color: #ddd}

                /* Show the dropdown menu (use JS to add this class to the .dropdown-content container when the user clicks on the dropdown button) */
                .show {display:block;}
            </style>
            <script>
                /* When the user clicks on the button,
                 toggle between hiding and showing the dropdown content */
                function myFunction() {
                    document.getElementById("myDropdown").classList.toggle("show");
                }

                // Close the dropdown menu if the user clicks outside of it
                window.onclick = function (event) {
                    if (!event.target.matches('.dropbtn')) {

                        var dropdowns = document.getElementsByClassName("dropdown-content");
                        var i;
                        for (i = 0; i < dropdowns.length; i++) {
                            var openDropdown = dropdowns[i];
                            if (openDropdown.classList.contains('show')) {
                                openDropdown.classList.remove('show');
                            }
                        }
                    }
                }
            </script>