<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      
      <!-- pesan sweetalert -->
      <div class="pesan" data-html="<?= $this->session->flashdata('html') ?>"
      data-type="<?= $this->session->flashdata('type') ?>"></div>
      
      <div class="table-responsive mt-4">
        <table class="table tazble-bordered table-hover"
        id="tabel">
          <thead class="text-center text-white bg-secondary">
            <tr>
              <th>No</th>
              <th>Menu</th>
              <th>Akses</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $i=1; foreach ($menu_data as $menu) : ?>
            <?php if($menu['menu'] !== 'admin') : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td>
                <?= $menu['menu'] ?>
              </td>
              <td>
                <div class="form-check">
                  <input type="checkbox" class="form-check-input check" 
                  name="check" <?= cek_hak_akses($role->id, $menu['id']) ?>
                  data-role="<?= $role->id ?>" data-menu="<?= $menu['id'] ?>">
                </div>
              </td>
            </tr>
            <?php endif; ?>
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