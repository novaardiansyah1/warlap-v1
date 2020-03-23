<?php $user = get_user() ?>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-4">
      <!-- Profile Image -->
      <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle"
            src="<?= base_url('assets/owner/img/user/'.$user['foto']) ?>">
          </div>

          <h3 class="profile-username text-center mt-3 text-capitalize">
            <?= $user['nama'] ?>
          </h3>

          <p class="text-muted text-center">
            <?php if(!empty($user['bio'])) : ?>
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
          
          <a href="<?= site_url('home/index#report') ?>"
          class="btn btn-primary btn-block">
            <i class="fas fa-edit"></i> buat laporan
          </a>
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
              <a class="nav-link" href="#info" data-toggle="tab">Info</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="#settings" data-toggle="tab">Settings</a>
            </li>
          </ul>
        </div><!-- /.card-header -->
        <div class="card-body">
          <div class="tab-content">
            <div class="tab-pane" id="info">
              <h3 class="pb-2">Informasi Publik</h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Nama Lengkap</b>
                  <a class="float-right">
                    <?= $user['nama'] ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Username</b> 
                  <a class="float-right">
                    <?= $user['username'] ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Bio</b> 
                  <a class="float-right">
                    <?= $user['bio'] ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Foto Profile</b> 
                  <a class="float-right">
                    <img src="<?= base_url('assets/owner/img/user/'.$user['foto']) ?>"
                    width="40" class="img-circle">
                  </a>
                </li>
              </ul>
              
              <h3 class="pb-2">Informasi Pribadi</h3>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Email</b>
                  <a class="float-right">
                    <?= $user['email'] ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>No. Telpon</b>
                  <a class="float-right">
                    <?= $user['no_telp'] ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Tanggal Lahir</b>
                  <a class="float-right">
                    <?= $user['tgl_lahir'] ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Jenis Kelamin</b>
                  <a class="float-right">
                    <?php if($user['jenkel'] == 1) : ?>
                    Laki-Laki
                    <?php else : ?>
                    Perempuan
                    <?php endif; ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>No. KTP</b>
                  <a class="float-right">
                    <?= $user['no_ktp'] ?>
                  </a>
                </li>
                <li class="list-group-item">
                  <b>Website</b>
                  <a class="float-right">
                    <?= $user['website'] ?>
                  </a>
                </li>
              </ul>
            </div>
            <!-- /.tab-pane -->
            
            <div class="active tab-pane" id="settings">
              <h3 class="pb-2">informasi pengguna</h3>
              
              <form class="form-horizontal" method="post" enctype="multipart/form-data"
              action="<?= site_url('profile/update_action/'.$user['id']) ?>">
                
                <div class="form-group row">
                  <label for="nama" class="col-sm-3 col-form-label text-sm-right">
                    Nama Lengkap
                  </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="nama" name="nama"
                    value="<?= $user['nama'] ?>">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="username" class="col-sm-3 col-form-label text-sm-right">
                    Username
                  </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="username" name="username"
                    value="<?= $user['username'] ?>" readonly>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="bio" class="col-sm-3 col-form-label text-sm-right">
                    Bio
                  </label>
                  <div class="col-sm-8">
                    <textarea name="bio" id="bio" rows="3" 
                    class="form-control"><?= $user['bio'] ?></textarea>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="foto" class="col-sm-3 col-form-label text-sm-right">
                    Foto Profile
                  </label>
                  <div class="col-sm-2 mb-2">
                    <img src="<?= base_url('assets/owner/img/user/'.$user['foto']) ?>"
                    width="100" class="img-fluid">
                  </div>
                  <div class="col-sm-6">
                    <input type="file" class="form-control-file mb-2" id="foto" name="foto">
                    <small>pilih foto yang memiliki ukuran pajang dan lebar yang sama.</small>
                  </div>
                </div>
                
                <input type="hidden" name="old_foto" id="old_foto" value="<?= $user['foto'] ?>">
                
                <div class="form-group row">
                  <label for="email" class="col-sm-3 col-form-label text-sm-right">
                    Email
                  </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="email" name="email"
                    value="<?= $user['email'] ?>" readonly>
                  </div>
                </div>
                  
                <div class="form-group row">
                  <label for="no_telp" class="col-sm-3 col-form-label text-sm-right">
                    No. Telepon
                  </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="no_telp" name="no_telp"
                    value="<?= $user['no_telp'] ?>" readonly>
                  </div>
                </div>
                  
                <div class="form-group row">
                  <label for="tgl_lahir" class="col-sm-3 col-form-label text-sm-right">
                    Tanggal Lahir
                  </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control datepicker datetimepicker-input" 
                    data-toggle="datetimepicker" data-target=".datepicker" 
                    id="tgl_lahir" name="tgl_lahir"
                    placeholder="<?= $user['tgl_lahir'] ?>">
                  </div>
                </div>
                  
                <div class="form-group row">
                  <label for="jenkel" class="col-sm-3 col-form-label text-sm-right">
                    Jenis Kelamin
                  </label>
                  <div class="col-sm-8">
                    <select name="jenkel" id="jenkel" class="form-control">
                      <?php if($user['jenkel'] == 1) : ?> 
                        <option value="1">Laki-Laki</option>
                        <option value="0">Perempuan</option>
                      <?php else : ?>
                        <option value="0">Perempuan</option>
                        <option value="1">Laki-Laki</option>
                      <?php endif; ?>
                    </select>
                  </div>
                </div>
                  
                <div class="form-group row">
                  <label for="no_ktp" class="col-sm-3 col-form-label text-sm-right">
                    No. KTP
                  </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="no_ktp" name="no_ktp"
                    value="<?= $user['no_ktp'] ?>">
                  </div>
                </div>
                    
                <div class="form-group row">
                  <label for="website" class="col-sm-3 col-form-label text-sm-right">
                    Website
                  </label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="website" name="website"
                    value="<?= $user['website'] ?>">
                  </div>
                </div>
                    
                <div class="row">
                  <div class="col-sm-3 offset-sm-8">
                    <button type="submit" class="btn btn-primary btn-block">
                      <i class="fas fa-paper-plane"></i> Simpan
                    </button>
                  </div>
                </div>
                
              </form>
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