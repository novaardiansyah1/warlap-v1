<?php 
  $title = $this->session->flashdata('title');
  $html  = $this->session->flashdata('html');
  $type  = $this->session->flashdata('type');
?>
<div class="pesan" data-title="<?= $title ?>" data-html="<?= $html ?>"
data-type="<?= $type ?>"></div>

<div class="container-fluid">
  <div class="row">
    <div class="col-md-6">
      
      <div class="card">
        <div class="card-header bg-primary">
          <div class="card-title">
            <span>create new submenu</span>
          </div>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <a href="<?= site_url('submenu') ?>" class="btn btn-tool">
              <i class="fas fa-times"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <?= form_open('submenu/create_action') ?>
            
            <div class="form-group">
              <label for="submenu">submenu <span class="text-danger">*</span></label>
              <input type="text" name="submenu" id="submenu" class="form-control" 
              value="<?= set_value('submenu') ?>" placeholder="submenu">
              <?= form_error('submenu','<small class="text-danger pl-1">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label for="menu_id">menu <span class="text-danger">*</span></label>
              <select name="menu_id" id="menu_id" class="form-control">
                <option value="">pilih disini</option>
                <?php foreach ($menu_data as $menu) : ?>
                <option value="<?= $menu['id'] ?>"><?= $menu['menu'] ?></option>
                <?php endforeach; ?>
              </select>
              <?= form_error('menu_id','<small class="text-danger pl-1">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label for="link">link <span class="text-danger">*</span></label>
              <input type="text" name="link" id="link" class="form-control" 
              value="<?= set_value('link') ?>" placeholder="controller/method">
              <?= form_error('link','<small class="text-danger pl-1">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label for="icon">icon <span class="text-danger">*</span></label>
              <input type="text" name="icon" id="icon" class="form-control" 
              value="<?= set_value('icon') ?>" placeholder="fas fa-icon">
              <?= form_error('icon','<small class="text-danger pl-1">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label for="is_active">status</label>
              <select name="is_active" id="is_active" class="form-control">
                <option value="0">pilih disini</option>
                <option value="1">active</option>
                <option value="0">not active</option>
              </select>
            </div>
            
            <div class="text-right">
              <button type="submit" class="btn btn-sm bg-indigo">
                <i class="fas fa-paper-plane"></i> back & save
              </button>
              <button type="submit" class="btn btn-sm btn-primary" name="save">
                <i class="fas fa-paper-plane"></i> save
              </button>
            </div>
            
          <?= form_close(); ?>
        </div>
      </div>
      
    </div>
    <!-- /.col-md-6 -->
  </div>
  <!-- /.row -->
  <div class="pb-5"></div>
</div>
<!-- /.container-fluid -->