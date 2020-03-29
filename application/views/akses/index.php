<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      
      <!-- pesan sweetalert -->
      <div class="pesan" data-html="<?= $this->session->flashdata('html') ?>"
      data-type="<?= $this->session->flashdata('type') ?>"></div>
      
      <button type="button" class="btn btn-md bg-indigo btn-cr_role">
        <i class="fas fa-sm fa-plus"></i> Tambah Akses
      </button>
      
      <div class="table-responsive mt-4">
        <table class="table tazble-bordered table-hover"
        id="tabel">
          <thead class="text-center text-white bg-secondary">
            <tr>
              <th>No</th>
              <th>Jabatan</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $i=1; foreach ($role_data as $role) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $role->role ?></td>
              <td class="mw_200">
                <a href="<?= site_url('akses/delete_role/'.$role->id) ?>" 
                class="btn btn-sm btn-danger mb-1 btn-del_role">
                  <i class="fas fa-trash-alt"></i> hapus
                </a>
                <a href="<?= site_url('menu/delete/'.$role->id) ?>" 
                class="btn btn-sm btn-primary mb-1 btn-del_menu">
                  <i class="fas fa-edit"></i> edit
                </a>
                <a href="<?= site_url('menu/get_by_id/'.$role->id) ?>"
                class="btn btn-sm btn-info mb-1 btn-up_menu">
                  <i class="fas fa-key"></i> akses
                </a>
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