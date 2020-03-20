<section id="report">
  
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

<!-- Modal -->
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
        <p><i class="fas fa-check"></i> untuk mengirimkan laporan anda harus login terlebih dahulu.</p>
        <form action="<?= site_url('auth') ?>" id="form_login">
          <div class="input-group mb-3 mt-4">
            <input type="text" class="form-control" id="username" 
            placeholder="Username" name="username">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-user"></i>
              </div>
            </div>
          </div>

          <div class="input-group mb-4">
            <input type="password" class="form-control" id="password" 
            placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <i class="fas fa-eye" id="show_hide" data-check="1"></i>
              </div>
            </div>
          </div>
          
          <div class="icheck-primary">
            <input type="checkbox" id="terms" name="terms" value="">
            <label for="terms">
             <small> Saya telah membaca dan menyetujui
             <a href="#">Syarat dan Ketentuan Layanan</a> </small>
            </label>
          </div>
          
          <hr>
          <div class="text-right">
            <button type="button" class="btn btn-danger px-5 tombol_login">
              <i class="fas fa-sign-in-alt"></i> login
            </button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>



