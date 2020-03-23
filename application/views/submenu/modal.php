<!-- Modal Login -->
<div class="modal fade" id="modal_create" data-backdrop="static" 
tabindex="-1" role="dialog" aria-labelledby="modal_createLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="modal_createLabel">
          Tambah Data Submenu
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p><i class="fas fa-xs fa-check"></i> Pastikan semua kolom bertanda 
        <i class="fas fa-xs fa-asterisk text-danger mx-1"></i> diisi dengan
        nilai yang valid! <i class="fas fa-check text-success"></i></p>
        
        <form id="form_create">
          
          <div class="form-group">
            <label for="submenu">submenu <span class="text-danger">*</span></label>
            <input type="text" name="submenu" id="submenu" class="form-control">
          </div>
            
          <div class="form-group">
            <label for="menu_id">menu <span class="text-danger">*</span></label>
            <select name="menu_id" id="menu_id" class="custom-select">
              <option value="" selected>pilih disini</option>
              <?php foreach ($menu_data as $menu) : ?>
              <option value="<?= $menu['id'] ?>"><?= $menu['menu'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          
          <div class="form-group">
            <label for="link">link <span class="text-danger">*</span></label>
            <input type="text" name="link" id="link" class="form-control">
          </div>
          
          <div class="form-group">
            <label for="icon">icon <span class="text-danger">*</span></label>
            <input type="text" name="icon" id="icon" class="form-control"
            placeholder="fas fa-icon">
          </div>
          
          <div class="form-group">
            <label for="is_active">status</label>
            <select name="is_active" id="is_active" class="custom-select">
              <option value="0" selected>pilih disini</option>
              <option value="1">active</option>
              <option value="0">not active</option>
            </select>
          </div>
          
          <div class="mt-4">
            <button type="button" class="btn btn-info btn-block" id="sub_create">
              <i class="fas fa-paper-plane"></i> kirim
            </button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>
