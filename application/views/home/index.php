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
  
  <div class="row text-dark px-2">
    <div class="col-md-8 offset-md-2 mt-5">
      <form action="<?= site_url('lapor') ?>" enctype="multipart/form-data"
      id="form_lapor">
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
          <button type="submit" class="btn btn-md bg-indigo mt-3 px-4 loading">
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