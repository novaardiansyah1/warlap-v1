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
      
      <a href="<?= site_url('menu/create_view') ?>" 
      class="btn btn-sm bg-indigo">
        <i class="fas fa-pencil-alt"></i> create a new
      </a>
      
      <div class="table-responsive mt-3">
        <table class="table table-bordered table-hover"
        id="tabel">
          <thead class="text-center text-white bg-secondary">
            <tr>
              <th>No</th>
              <th>Menu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $i=1; foreach ($menu_data as $menu) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $menu['menu'] ?></td>
              <td class="mw_200">
                <a href="<?= site_url('menu/delete/'.$menu['id']) ?>" 
                class="btn btn-sm btn-danger tombol-hapus">
                  <i class="fas fa-trash-alt"></i> delete
                </a>
                <a href="<?= site_url('menu/update_view/'.$menu['id']) ?>" 
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