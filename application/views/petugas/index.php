<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      
      <div class="table-responsive mt-4">
        <table class="table tazble-bordered table-hover"
        id="tabel">
          <thead class="text-center text-white bg-secondary">
            <tr>
              <th>ID</th>
              <th>Kategori</th>
              <th>Judul</th>
              <th>Lampiran</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php foreach ($laporan_data as $laporan) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $laporan->id ?></td>
              <td><?= $laporan->kategori ?></td>
              <td><?= $laporan->judul ?></td>
              <td>
                <img src="<?= base_url('assets/owner/img/laporan/'.$laporan->lampiran) ?>">
              </td>
              <td>
                
              </td>
            </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  <!-- /.row -->
  <div class="pb-5"></div>
</div>
<!-- /.container-fluid -->