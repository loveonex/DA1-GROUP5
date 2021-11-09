<?php
session_start();
include_once('./../connect_DB.php');
if(!isset($_SESSION['admin'])){
    header("Location: $website/layout/login-admin.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin | Dashboard</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
    <link rel="stylesheet" href="<?=$website?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$website?>/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?=$website?>/css/AdminLTE.css">
    <link rel="stylesheet" href="<?=$website?>/css/_all-skins.min.css">
    <link rel="stylesheet" href="<?=$website?>/css/jquery-ui.css">
    <link rel="stylesheet" href="<?=$website?>/css/style.css" />
    <script src="<?=$website?>/js/angular.min.js"></script>
    <script src="<?=$website?>/js/app.js"></script>
</head>

<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="<?=$website?>/User/home-user.php" class="logo">
                <span class="glyphicon glyphicon-home"></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?php echo $url_images . $_SESSION['admin']['anh'] ?>" class="user-image" alt="User Image">
                                <span class="hidden-xs"><?php echo $_SESSION['admin']['ten'] ?></span>

                            </a>

                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="<?php echo $url_images . $_SESSION['admin']['anh'] ?>" class="img-circle"
                                        alt="User Image">

                                    <p>
                                    <?php echo $_SESSION['admin']['ten'] ?> - Web Developer
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-right">
                                        <form action="<?="$website/admin/layout/log-out.php"?>" method="POST">
                                            <button class="btn btn-default btn-flat">Log Out</button>
                                        </form>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <!-- =============================================== -->

        <!-- Left side column. contains the sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo $url_images . $_SESSION['admin']['anh'] ?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $_SESSION['admin']['ten'] ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i
                                    class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">

                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-cog"></i> <span>Quản Lí Admin</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=$website ?>/admin/admins/list-admin.php"><i
                                        class="fa fa-circle-o"></i> Danh sách Admin</a></li>
                            <li><a href="<?=$website ?>/admin/admins/add-admin.php"><i
                                        class="fa fa-circle-o"></i> Thêm mới Admin</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-user"></i> <span>Quản Lí User</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=$website ?>/admin/users/list-user.php"><i
                                        class="fa fa-circle-o"></i> Danh sách User</a></li>
                            <li><a href="<?=$website ?>/admin/users/add-user.php"><i class="fa fa-circle-o"></i>
                                    Thêm mới User</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-list-alt"></i> <span>Quản Lí Sản Phẩm</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=$website ?>/admin/goods/list-product.php"><i
                                        class="fa fa-circle-o"></i> Danh sách sản phẩm</a></li>
                            <li><a href="<?=$website ?>/admin/goods/add-product.php"><i
                                        class="fa fa-circle-o"></i> Thêm mới Sản phẩm</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-list-alt"></i> <span>Quản Lí Loại Sản Phẩm</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="<?=$website ?>/admin/catetory/list-catetory.php"><i
                                        class="fa fa-circle-o"></i> Danh sách Loại sản phẩm</a></li>
                            <li><a href="<?=$website ?>/admin/catetory/add-catetory.php"><i
                                        class="fa fa-circle-o"></i> Thêm mới Loại Sản phẩm</a></li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="glyphicon glyphicon-list-alt"></i> <span>Quản Lí Bình Luận</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li>
                                <a href="<?=$website?>/admin/comment/list-comment.php"><i class="fa fa-circle-o"></i>Danh sách Bình Luận</a>
                                </li>
                        </ul>
                    </li>
                </ul>
            </section>
        </aside>