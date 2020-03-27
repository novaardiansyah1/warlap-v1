<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      
      <button class="btn btn-md bg-indigo" id="btn-cr_menu">
        <i class="fas fa-pencil-alt"></i> tambah menu
      </button>
      
      <div class="table-responsive mt-4">
        <table class="table tazble-bordered table-hover"
        id="tabel">
          <thead class="text-center text-white bg-secondary">
            <tr>
              <th>No</th>
              <th>Menu</th>
              <th>Status</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $i=1; foreach ($menu_data as $menu) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $menu['menu'] ?></td>
              <td>
                <?php if($menu['is_active'] == 1) : ?>
                <div class="badge badge-info">Active</div>
                <?php else : ?>
                <div class="badge badge-danger">Not Active</div>
                <?php endif; ?>
              </td>
              <td class="mw_200">
                <a href="<?= site_url('menu/delete/'.$menu['id']) ?>" 
                class="btn btn-sm btn-danger btn-del_menu">
                  <i class="fas fa-trash-alt"></i> delete
                </a>
                <a href="<?= site_url('menu/get_by_id/'.$menu['id']) ?>"
                class="btn btn-sm btn-info btn-up_menu">
                  <i class="fas fa-edit"></i> update
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