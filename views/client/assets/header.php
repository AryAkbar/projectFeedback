<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width initial-scale=1.0">
    <link rel="icon" type="image/png" href="./views/client/assets/img/icon.png" />
    <title>Sistem Manajemen Keluhan</title>
    <!-- GLOBAL MAINLY STYLES-->
    <link href="./views/client/assets/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/line-awesome/css/line-awesome.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/themify-icons/css/themify-icons.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/animate.css/animate.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/toastr/toastr.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet" />
    <!-- PLUGINS STYLES-->
    <link href="./views/client/assets/vendors/summernote/dist/summernote.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/dataTables/datatables.min.css" rel="stylesheet" />
    <link href="./views/client/assets/vendors/jvectormap/jquery-jvectormap-2.0.3.css" rel="stylesheet" />
    <!-- THEME STYLES-->
    <link href="./views/client/assets/css/main.min.css" rel="stylesheet" />
    <link href="./views/client/assets/css/custom.css" rel="stylesheet" />    
    <!-- PAGE LEVEL STYLES-->
</head>


<body class="fixed-navbar">
    <div class="page-wrapper">
        <!-- START HEADER-->
        <header class="header">
            <div class="page-brand bg-danger">
                <a href="index.php?url=dashboard">
                    <span class="brand"><i class="fa fa-laugh"></i>Kritikku</span>
                </a>
            </div>
            <div class="flexbox flex-1">
                <!-- START TOP-LEFT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li>
                        <a class="nav-link search-toggler js-search-toggler"><i class="ti-search"></i>
                            <span>Cari Disini...</span>
                        </a>
                    </li>
                </ul>
                <!-- END TOP-LEFT TOOLBAR-->
                <!-- START TOP-RIGHT TOOLBAR-->
                <ul class="nav navbar-toolbar">
                    <li class="dropdown dropdown-inbox ntap">
                        <a class="ww nav-link dropdown-toggle toolbar-icon ntap" id="gar" data-toggle="dropdown"><i class="ti-bell"></i>
                            <!-- <span class="envelope-badge"></span> -->
                        </a>
                        <div class="dropdown-menu dropdown-menu-right dropdown-menu-media">
                            <div class="dropdown-arrow"></div>
                            <div class="p-3">
                                <div class="media-list media-list-divider scroller notif"  data-notifes="<?=$_SESSION['id']?>" data-height="350px" data-color="#71808f">
                                    
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown dropdown-user">
                        <a class="nav-link dropdown-toggle link" data-toggle="dropdown">
                            <span><?php echo $_SESSION['nama']; ?></span>
                            <img src="./views/client/assets/img/users/<?=$_SESSION['gbr']?>" alt="image" />
                        </a>
                        <div class="dropdown-menu dropdown-arrow dropdown-menu-right admin-dropdown-menu ">
                            <div class="dropdown-arrow"></div>
                            <div class="dropdown-header bg-danger">
                                <div class="admin-avatar ">
                                    <img src="./views/client/assets/img/users/<?=$_SESSION['gbr']?>" alt="image" />
                                </div>
                                <div>
                                    <h5 class="font-strong text-white"><?=$_SESSION['nama']; ?></h5>
                                </div>
                            </div>
                            <div class="admin-menu-features">
                                <a class="admin-features-item" href="<?php echo 'index.php?url=profile&id='.$_SESSION['id'] ?>"><i class="ti-user"></i>
                                    <span>PROFIL</span>
                                </a>
                                <a class="admin-features-item" href="<?php echo 'index.php?url=profile&id='.$_SESSION['id'].'#tab1-3' ?>"><i class="ti-clipboard"></i>
                                    <span>KELUHAN SAYA</span>
                                </a>
                                <a class="admin-features-item" href="javascript:;"><i class="ti-settings"></i>
                                    <span>PENGATURAN</span>
                                </a>
                            </div>
                            <div class="admin-menu-content">
                                
                                <div class="d-flex justify-content-between mt-2">
                                    <a class="d-flex align-items-center" data-toggle="modal" data-target="#myModal">Logout<i class="ti-shift-right ml-2 font-20"></i></a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </header>