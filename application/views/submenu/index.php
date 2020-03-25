<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      
      <button class="btn btn-md bg-indigo" id="btn-cr_submenu">
        <i class="fas fa-pencil-alt"></i> tambah submenu
      </button>
      
      <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover"
        id="tabel">
          <thead class="text-center text-white bg-secondary">
            <tr>
              <th>No</th>
              <th>Submenu</th>
              <th>Menu</th>
              <th>Link</th>
              <th>Icon</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $i=1; foreach ($submenu_data as $submenu) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $submenu['submenu'] ?></td>
              <td><?= $submenu['menu'] ?></td>
              <td><?= $submenu['link'] ?></td>
              <td><i class="<?= $submenu['icon'] ?> fa-2x text-indigo"></i></td>
              <td>
                <?php if($submenu['is_active'] == 1) : ?>
                <div class="badge badge-info">Active</div>
                <?php else : ?>
                <div class="badge badge-danger">Not Active</div>
                <?php endif; ?>
              </td>
              <td class="mw_200">
                <a href="<?= site_url('submenu/delete/'.$submenu['id']) ?>" 
                class="btn btn-sm btn-danger btn_delete">
                  <i class="fas fa-trash-alt"></i> delete
                </a>
                <button type="button" data-id="<?= $submenu['id'] ?>" 
                class="btn btn-sm btn-info btn-up_submenu">
                  <i class="fas fa-edit"></i> update
                </button>
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