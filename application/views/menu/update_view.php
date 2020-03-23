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
            <span>update menu</span>
          </div>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
              <i class="fas fa-minus"></i>
            </button>
            <a href="<?= site_url('menu') ?>" class="btn btn-tool">
              <i class="fas fa-times"></i>
            </a>
          </div>
        </div>
        <div class="card-body">
          <?= form_open('menu/update_action/'.$menu['id']) ?>
            
            <div class="form-group">
              <label for="menu">menu <span class="text-danger">*</span></label>
              <input type="text" name="menu" id="menu" class="form-control" 
              value="<?= $menu['menu'] ?>">
              <?= form_error('menu','<small class="text-danger pl-1">','</small>') ?>
            </div>
            
            <div class="form-group">
              <label for="is_active">status</label>
              <select name="is_active" id="is_active" class="form-control">
                <option value="<?= $menu['is_active'] ?>">pilih disini</option>
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
  </div>
</div>