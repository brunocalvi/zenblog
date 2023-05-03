<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Gerencial 2.0</title>

    <link rel="shortcut icon" type="image/x-icon" href="<?php echo PATH_DEFAULT; ?>/img/favicon.png">
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="css/style.css" rel="stylesheet">
    <!-- plugin de editor de texto -->
    <script src="ckeditor/ckeditor.js"></script>
</head>

<body id="page-top">

    <div id="wrapper">
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Gerencial</div>
            </a>

            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Sistema</div>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo PATH_DEFAULT ?>list-user.php">
                    <i class="fa fa-user-plus" aria-hidden="true"></i><span>Usuarios</span>
                </a>
            </li>

            <hr class="sidebar-divider">
            <div class="sidebar-heading">Funções</div>
			      <li class="nav-item">
                <a class="nav-link" href="<?php echo PATH_DEFAULT ?>list-post.php">
                    <i class="fa fa-newspaper-o" aria-hidden="true"></i><span>Postagens</span>
                </a>
            </li>
           
            <hr class="sidebar-divider d-none d-md-block">

            <div class="sidebar-heading">Uploads</div>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo PATH_DEFAULT ?>image.php">
                    <i class="fa fa-upload" aria-hidden="true"></i><span>Upload de Imagens</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
            <li class="nav-item">
                <a class="nav-link" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i><span>Sair</span>
                </a>
            </li>

        </ul>

        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-sm-block"></div>

                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-lg-inline text-gray-600 small">Olá <?php echo $_SESSION['userLogin']; ?></span> 
                            </a>

                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="visualise-user.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Sair
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>