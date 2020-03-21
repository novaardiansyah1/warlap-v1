<section id="report">

<div class="base_url" data-url="<?= site_url() ?>"></div>
  
<div class="container py-5">
  <div class="row">
    <div class="col-md-8 offset-md-2 text-dark">
      <h1 class="cRliw text-center">suara anda adalah perubahan</h1>
      <hr class="tjuLv">
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
  
  <?php 
    $user     = get_user();
    $username = $user['username'];
  ?>
  
  <div class="row text-dark px-2">
    <div class="col-md-8 offset-md-2 mt-5">
      <form action="<?= site_url('lapor') ?>" enctype="multipart/form-data"
      id="form_lapor">
        <input type="hidden" name="user_id" id="user_id" value="<?= $user['id'] ?>">
        <!-- /.user_id -->
        <div class="form-group mb-4">
          <label for="kategori">kategori</label>
          <select name="kategori" id="kategori" class="form-control custom-select">
            <option value="">pilih disini</option>
          </select>
        </div>
        <!-- /.kategori -->
        <div class="form-group mb-4">
          <label for="judul">judul</label>
          <input type="text" name="judul" id="judul" class="form-control">
        </div>
        <!-- /.judul -->
        <div class="form-group mb-4">
          <label for="laporan">laporan</label>
          <textarea name="laporan" id="laporan" class="form-control" rows="6"></textarea>
        </div>
        <!-- /.laporan -->
        <div class="form-group mb-4">
          <label for="lampiran">Lampiran</label>
          <input type="file" class="form-control-file" name="lampiran" id="lampiran">
        </div>
        <!-- /.lampiran -->
        <div class="text-right">
          <!-- tombol kirim laporan -->
          <button type="submit" class="btn btn-md bg-indigo mt-3 px-4 
          btn_kirim_laporan" data-user="<?= $username ?>">
            <i class="fas fa-paper-plane"></i> Kirim Laporan
          </button>
        </div>
      </form>
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</div> 
<!-- /.container -->
  
</section>

<!-- Modal Login -->
<div class="modal fade" id="modal_login" data-backdrop="static" 
tabindex="-1" role="dialog" aria-labelledby="modal_loginLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="modal_loginLabel">
          Login Masyarakat
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p><i class="fas fa-check"></i> untuk dapat menggunakan layanan kami, 
        anda diharuskan login terlebih dahulu!</p>
        <form action="<?= site_url('auth') ?>" id="form_login">
          
          <!-- Username --> 
          <div class="input-group mb-3 mt-4">
            <input type="text" class="form-control" id="l_username"
            placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
          
          <!-- Password -->
          <div class="input-group mb-4">
            <input type="password" class="form-control" id="l_password" 
            placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-eye" id="l_show" data-check="1"></i>
              </div>
            </div>
          </div>
          
          <div class="icheck-primary">
            <input type="checkbox" id="terms" value="">
            <label for="terms">
             <small> Saya telah membaca dan menyetujui
             <a href="#">Syarat dan Ketentuan Layanan</a> </small>
            </label>
          </div>
          
          <div class="mt-4">
            <button type="button" class="btn btn-danger btn-block tombol_login">
              <i class="fas fa-sign-in-alt"></i> login
            </button>
          </div>
          <hr>
          <div class="text-center">
            <small>belum punya akun? <a href="" id="daftar">daftar</a> sekarang!</small>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>

<!-- Modal Register -->
<div class="modal fade" id="modal_register" data-backdrop="static" 
tabindex="-1" role="dialog" aria-labelledby="modal_registerLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-danger">
        <h5 class="modal-title" id="modal_registerLabel">
          Register Masyarakat
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p><i class="fas fa-check"></i> untuk dapat mengirim laporan, anda harus 
        menjadi anggota yang terdaftar dilayanan kami!</p>
        <form action="<?= site_url('auth/register') ?>" id="form_register">
          
          <!-- Nama Lengkap -->
          <div class="input-group mb-3 mt-4">
            <input type="text" class="form-control" id="r_nama" 
            placeholder="Nama Lengkap" name="nama">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>
            
          <!-- Username -->
          <div class="input-group mb-3 mt-4">
            <input type="text" class="form-control" id="r_username"
            placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user-lock"></i>
              </div>
            </div>
          </div>
            
          <!-- Email -->
          <div class="input-group mb-3 mt-4">
            <input type="text" class="form-control" id="r_email" 
            placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-envelope"></i>
              </div>
            </div>
          </div>
          
          <!-- No. Telepon -->
          <div class="input-group mb-3 mt-4">
            <input type="text" class="form-control" id="r_no_telp" 
            placeholder="No. Telepon" name="no_telp">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-phone"></i>
              </div>
            </div>
          </div>
          
          <!-- Password -->  
          <div class="input-group mb-4">
            <input type="password" class="form-control" id="r_password"
            placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-lock" data-check="1"></i>
              </div>
            </div>
          </div>
          
          <!-- Konfirmasi Password -->  
          <div class="input-group mb-4">
            <input type="password" class="form-control" id="r_password1"
            placeholder="Konfirmasi Password" name="password1">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-eye" id="r_show" data-check="1"></i>
              </div>
            </div>
          </div>
          
          <div class="icheck-primary">
            <input type="checkbox" id="terms1" value="">
            <label for="terms1">
             <small> Saya telah membaca dan menyetujui
             <a href="#">Syarat dan Ketentuan Layanan</a> </small>
            </label>
          </div>
          
          <div class="mt-4">
            <button type="button" class="btn btn-danger btn-block tombol_register">
              <i class="fas fa-paper-plane"></i> Register
            </button>
          </div>
          <hr>
          <div class="text-center">
            <small>sudah punya akun? <a href="" id="login">login</a> sekarang!</small>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>

