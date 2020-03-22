<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= site_url() ?>" class="brand-link text-center bg-indigo text-uppercase">
    <i class="fas fa-city mr-2"></i>
    <span class="brand-text font-weight-light">WARLAP</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    
    <!-- ambil data user -->
    <?php $user = get_user(); ?>
    
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url('assets/owner/img/user/'.$user['foto']) ?>" 
        class="img-circle elevation-2 shadow-lg" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-white text-capitalize">
          <?= $user['nama'] ?> <small><i class="fas fa-circle fa-xs text-success"></i></small>
        </a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" 
      data-widget="treeview" role="menu" data-accordion="false">
        
        <?php 
          $menu_data = get_menu(); 
        ?>
        
        <?php foreach ($menu_data as $menu) : ?>
        <li class="nav-header text-uppercase ml-1 pt-1 pl-0">
          <?= $menu['menu'] ?>
        </li>

        <?php
          $menu_id = $menu['id'];
          $submenu_data = get_submenu($menu_id);
        ?>
        
        <?php foreach ($submenu_data as $submenu) : ?>
        <li class="nav-item">
          <?php if($title == $submenu['submenu']) : ?>
          <a class="nav-link active" href="<?= site_url().$submenu['link']; ?>">
          <?php else : ?>
          <a class="nav-link" href="<?= site_url().$submenu['link']; ?>">
          <?php endif; ?>
            <i class="nav-icon <?= $submenu['icon']; ?>"></i>
            <p>
              <?= $submenu['submenu']; ?>
            </p>
          </a>
        </li>
        <?php endforeach; ?>
        <?php endforeach; ?>
        
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
        <h4 class="m-0 text-dark"><?= $post_title ?></h4>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item">
            <a href="#"><?= get_breadcrumb($title) ?></a>
          </li>
          <li class="breadcrumb-item active"><?= $title?></li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
  
<!-- Main content -->
<section class="content">