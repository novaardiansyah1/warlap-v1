<?php 
  $title = $this->session->flashdata('title');
  $html  = $this->session->flashdata('html');
  $type  = $this->session->flashdata('type');
?>
<div class="pesan" data-title="<?= $title ?>" data-html="<?= $html ?>"
data-type="<?= $type ?>"></div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-8">
      
      <a href="<?= site_url('submenu/create_view') ?>" 
      class="btn btn-sm bg-indigo">
        <i class="fas fa-pencil-alt"></i> create a new
      </a>
      
      <div class="table-responsive mt-3">
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
                class="btn btn-sm btn-danger tombol-hapus">
                  <i class="fas fa-trash-alt"></i> delete
                </a>
                <a href="<?= site_url('submenu/update_view/'.$submenu['id']) ?>" 
                class="btn btn-sm btn-info">
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