<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <!-- pesan sweetalert -->
      <div class="pesan" data-html="<?= $this->session->flashdata('html') ?>"
      data-type="<?= $this->session->flashdata('type') ?>"></div>
      
      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
            src="<?= base_url('assets/owner/img/user/'.$user->foto) ?>">
          </div>

          <h3 class="profile-username text-center mt-3 text-capitalize">
            <?= $user->nama ?>
          </h3>

          <p class="text-muted text-center">
            <?php if(!empty($user->bio)) : ?>
            <i class="fas fa-quote-left"></i> <?= $user['bio'] ?>
            <?php endif; ?>
          </p>

          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Laporan</b> <a class="float-right">
                <?= $laporan ?>
              </a>
            </li>
            <li class="list-group-item">
              <b>Mengikuti</b> <a class="float-right">0</a>
            </li>
            <li class="list-group-item">
              <b>Pengikut</b> <a class="float-right">0</a>
            </li>
          </ul>
          
          <?php if($user->is_active == 0 || $user->is_active == 1) : ?>
          <a href="#" class="btn bg-danger btn-block btn-blokir">
            <i class="fas fa-lock"></i> blokir
          </a>
          <?php else : ?>
          <a href="#" class="btn bg-primary btn-block btn-buka_blokir">
            <i class="fas fa-lock-open"></i> buka blockir
          </a>
          <?php endif; ?>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.col-md-4 -->
    
    <div class="col-md-8">
      <div class="card">
        <div class="card-header p-2">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link active" href="#info" data-toggle="tab">Info</a>
            </li>
          </ul>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane active" id="info">
              <h3 class="pb-2">Informasi Publik</h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Nama Lengkap</b>
                  <a class="float-right">
                    <?= $user->nama ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Username</b> 
                  <a class="float-right">
                    <?= $user->username ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Bio</b> 
                  <a class="float-right">
                    <?= $user->bio ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Foto Profile</b> 
                  <a class="float-right">
                    <img src="<?= base_url('assets/owner/img/user/'.$user->foto) ?>"
                    width="40" class="img-circle">
                  </a>
                </li>
              </ul>
              
              <h3 class="pb-2">Informasi Pribadi</h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b>
                  <a class="float-right">
                    <?= $user->email ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>No. Telpon</b>
                  <a class="float-right">
                    <?= $user->no_telp ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b>
                  <a class="float-right">
                    <?= $user->tgl_lahir ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b>
                  <a class="float-right">
                    <?php if($user->jenkel == 1) : ?>
                    Laki-Laki
                    <?php else : ?>
                    Perempuan
                    <?php endif; ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>No. KTP</b>
                  <a class="float-right">
                    <?= $user->no_ktp ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Website</b>
                  <a class="float-right">
                    <?= $user->website ?>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->
          </div>
          <!-- /.tab-content -->
        </div><!-- /.card-body -->
      </div>
      <!-- /.nav-tabs-custom -->
    </div>
    <!-- /.col-md-8 -->
  </div>
  <!-- /.row -->
  <div class="pb-5"></div>
</div>
<!-- /.container-fluid -->