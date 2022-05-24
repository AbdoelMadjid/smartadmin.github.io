<div class="flash-data-logout" data-flashdatalogout="<?= $this->session->flashdata('myflashlogout'); ?>"></div>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <!-- <li class="nav-item d-none d-sm-inline-block">
          <a href="index3.html" class="nav-link">Home</a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Contact</a>
        </li> -->
        <li class="nav-item d-none d-sm-inline-block">
          <a href="#" class="nav-link">Welcome, <?= $menuData['fullname']; ?> </a>
        </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
        <!-- Navbar Search -->
        <!-- <li class="nav-item">
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
        </li> -->
        <!-- Messages Dropdown Menu -->
        <!-- <li class="nav-item dropdown">
          <a class="nav-link text-danger" data-toggle="dropdown" href="#">
            User Access : 'User'
          </a>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li> -->
      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index3.html" class="brand-link">
        <!-- <img src="<?= base_url('assets/template/') ?>dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
        <img src="<?= base_url('assets/template/') ?>dist/img/smLogo-iconTitle.png" alt="SmartAdmin Logo" class="brand-image img-circle elevation-3" style="opacity: .8; background:white">
        <span class="brand-text font-weight-light">Smart Admin</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-1 d-flex">
          <div class="image">
            <!-- <img src="<?= base_url('assets/template/') ?>dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image"> -->
            <img src="<?= base_url('assets/template/') ?>dist/img/userDefault2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $menuData['fullname']; ?></a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <!-- <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div> -->

        <!-- Sidebar Menu -->

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

            <li class="nav-item">
            <li class="nav-header nav-item">MENU</li>

            <?php
            //Get user Menu based on User Role
            $userRoleId = $this->session->userdata('role_id');
            $queryMenu = "SELECT a.menu_id, b.title, b.title, b.url, b.icon, b.is_active
                FROM user_access_menu a
                JOIN user_submenu b ON a.menu_id = b.menu_id
                WHERE role_id =  $userRoleId
                AND b.is_active = 1 ";
            $GetMenu = $this->db->query($queryMenu)->result_array();
            ?>
            <?php foreach ($GetMenu as $GetMyMenu) : ?>
              <?php if ($menuData['title'] == $GetMyMenu['title']) : ?>
                <a href="<?= base_url($GetMyMenu['url']); ?>" class="nav-link active">
                <?php else : ?>
                  <a href="<?= base_url($GetMyMenu['url']); ?>" class="nav-link">
                  <?php endif; ?>
                  <i class="<?= base_url($GetMyMenu['icon'] . ' '); ?>"></i>
                  <p class="pl-2">
                    <?= $GetMyMenu['title']; ?>
                  </p>
                  </a>
                <?php endforeach; ?>
                <li class="nav-header user-panel"></li>
                <a href="<?= base_url('Auth/logout'); ?>" class="nav-link mt-2 mb-3 logout_btn">
                  <i class="nav-icon fas fa-sign-out-alt"></i>
                  <p>
                    Logout
                  </p>
                </a>
                </li>
          </ul>
        </nav>


        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <!-- <h1 class="m-0"><?= $menuData['title'] ?></h1> -->
              <!-- <button class="btn btn-primary">Menu <?= $menuData['title'] ?></button> -->
            </div><!-- /.col -->
            <div class="col-sm-6">
              <!-- <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active"><?= $menuData['title'] ?></li>
              </ol> -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">