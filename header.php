<?php 
  include 'config/sessions.php'; 
?>
<!DOCTYPE html>
<html lang="es">
<header>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>IFTS N°4 | Terciarios</title>
  <?php 

  $file = basename($_SERVER['PHP_SELF']);
  include "styles/style-$file";

  ?>
</header>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" href="login.php?cerrar_sesion=true">
           <i class="fas fa-sign-out-alt text-danger"></i>
        </a>

      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
      <img src="dist/img/iftsn4.jpg" alt="iftsn4.jpg" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">IFTS N°4</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="info">
          <a href="#" class="d-block"><?php echo $_SESSION['email'];?></a>
        </div>
      </div>
  
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
          with font-awesome or any other icon font library -->

          <!-- inicio usuarios (administrador) -->
          <?php if ($_SESSION['role'] == 'Regente' || $_SESSION['role'] == 'Bedel' ) { ?> 
          <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-bookmark"></i>
                <p>
                  Usuarios
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
             <ul class="nav nav-treeview">
              <li>
                <a href="users-list.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Lista de usuarios
                  </p>
                </a>
              </li>
              <li class="nav-item">
                <a href="users-form.php" class="nav-link">
                  <i class="nav-icon fas fa-edit"></i>
                  <p>
                    Alta de usuarios
                  </p>
                </a>
              </li>
            </ul>
          </li>
          <?php } ?>
          <!-- inicio carreras -->
          <li class="nav-item">
              <a href="users-form.php" class="nav-link">
              <i class="nav-icon fas fa-bookmark"></i>
                <p>
                  Carreras
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
             <ul class="nav nav-treeview">
              <li>
                <a href="course-list.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Lista de carreras
                  </p>
                </a>
              </li>
              <?php if ($_SESSION['role'] == 'Regente' || $_SESSION['role'] == 'Bedel') { ?>
                <li class="nav-item">
                  <a href="course-form.php" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Alta de carreras
                    </p>
                  </a>
                </li>
              <?php } ?>    
            </ul>
          </li>
          <!-- inicio materias -->
          <li class="nav-item">
          <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
                <p>
                  Materias
                  <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
              <li>
                <a href="matter-list.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Lista materias
                  </p>
                </a>
              </li>
              <?php if ($_SESSION['role'] == 'Regente'  || $_SESSION['role'] == 'Bedel' ) { ?>
                <li class="nav-item">
                  <a href="matter-form.php" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Alta de materias
                    </p>
                  </a>
                </li>
              <?php } ?>    
            </ul>
          </li>
          <!-- inicio profesores -->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Profesores
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li>
                <a href="teacher-list.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Lista de profesores
                  </p>
                </a>
              </li>
              <?php if ($_SESSION['role'] == 'Regente' || $_SESSION['role'] == 'Bedel' ) { ?>
                <li class="nav-item">
                  <a href="teacher-form.php" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Alta de profesores
                    </p>
                  </a>
              <?php } ?>    
            </ul>
          </li>
          <!-- inicio alumnos -->
          <li class="nav-item"> 
            <a href="teacher-form" class="nav-link">
              <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Alumnos
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li>
                <a href="students-list.php" class="nav-link">
                  <i class="nav-icon fas fa-th"></i>
                  <p>
                    Lista de alumnos
                  </p>
                </a>
              </li>
              <?php if ($_SESSION['role'] == 'Regente' || $_SESSION['role'] == 'Bedel' ) { ?>
                <li class="nav-item">
                  <a href="students-form.php" class="nav-link">
                    <i class="nav-icon fas fa-edit"></i>
                    <p>
                      Alta de alumnos
                    </p>
                  </a>
                </li>
              <?php } ?>    
            </ul>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>