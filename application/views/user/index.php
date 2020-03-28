<div class="container-fluid">
  <div class="row">
    <div class="col-lg-8 offset-lg-2">
      <!-- pesan sweetalert -->
      <div class="pesan" data-html="<?= $this->session->flashdata('html') ?>"
      data-type="<?= $this->session->flashdata('type') ?>"></div>
      
      <div class="table-responsive mt-4">
        <table class="table table-bordered table-hover"
        id="tabel">
          <thead class="text-center text-white bg-secondary">
            <tr>
              <th>No</th>
              <th class="mw_100">Username</th>
              <th>Bergabung</th>
              <th>Foto</th>
              <th>Status</th>
              <th class="mw_150">Aksi</th>
            </tr>
          </thead>
          <tbody class="text-center">
            <?php $i=1; foreach ($user_data as $user) : ?>
            <tr>
              <td><?= $i++ ?></td>
              <td><?= $user->username ?></td>
              <td><?= date('d/m/Y', $user->date_created) ?></td>
              <td>
                <img src="<?= base_url('assets/owner/img/user/'.$user->foto) ?>"
                class="rounded-circle" width="50" height="50">
              </td>
              <td>
                <?php if($user->is_active == 1) : ?>
                <div class="badge badge-info">Active</div>
                <?php elseif($user->is_active == 0) : ?>
                <div class="badge badge-danger">Not Active</div>
                <?php else : ?>
                <div class="badge badge-danger">Blocked</div>
                <?php endif; ?>
              </td>
              <td>
                <?php if($user->is_active == 0 || $user->is_active == 1) : ?>
                <a href="<?= site_url('user/blokir/'.$user->id) ?>" 
                class="btn btn-sm bg-danger btn_blokir">
                  <i class="fas fa-lock"></i> blokir
                </a>
                <?php else : ?>
                <a href="<?= site_url('user/buka_blokir/'.$user->id) ?>" 
                class="btn btn-sm bg-primary btn_buka_blokir">
                  <i class="fas fa-lock-open"></i> buka
                </a>
                <?php endif; ?>
                <a href="<?= site_url('user/detail/'.$user->id) ?>" class="btn btn-sm bg-info btn-detail">
                  <i class="fas fa-search"></i> detail
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