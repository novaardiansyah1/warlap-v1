<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon bg-info elevation-1">
            <i class="fas fa-edit"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">
              Permintaan Laporan
            </span>
            <span class="info-box-number">
              <?= $request_laporan ?>
              <small>laporan</small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-success elevation-1">
            <i class="fas fa-book"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">
              Laporan Selesai
            </span>
            <span class="info-box-number">
              <?= $laporan_selesai ?>
              <small>laporan</small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->

      <!-- fix for small devices only -->
      <div class="clearfix hidden-md-up"></div>

      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-primary elevation-1">
            <i class="fas fa-user-tie"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">Administrator</span>
            <span class="info-box-number">
              <?= $user_admin ?>
              <small>akun</small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box mb-3">
          <span class="info-box-icon bg-warning elevation-1">
            <i class="fas fa-users"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">
              Pengguna
            </span>
            <span class="info-box-number">
              <?= $user_user ?>
              <small>akun</small>
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
    
    <div class="row">
      <div class="col-sm-6">
      <div class="card">
        <div class="card-header bg-info">
          <h3 class="card-title">Latest Members</h3>

          <div class="card-tools">
            <span class="badge badge-danger">8 New Members</span>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body p-0">
          <ul class="users-list clearfix px-2">
            <?php foreach ($user_data as $user): ?>
              <li class="mt-3">
                <img src="<?= base_url('assets/owner/img/user/'.$user->foto) ?>">
                <a class="users-list-name" href="#"><?= $user->nama ?></a>
                <span class="users-list-date"><?= date('d/m/Y', $user->date_created) ?></span>
              </li>
            <?php endforeach; ?>
          </ul>
          <!-- /.users-list -->
        </div>
        <!-- /.card-body -->
        <div class="card-footer text-center">
          <a href="#">View All Users</a>
        </div>
        <!-- /.card-footer -->
      </div>
      <!--/.card -->
    </div>
    </div>
    <!-- /.col-sm-6 -->
    <!-- /.row -->
    <div class="pb-5"></div>
  </div>
  <!-- /.container-fluid -->
</section>