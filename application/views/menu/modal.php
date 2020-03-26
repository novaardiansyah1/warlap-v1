<!-- Modal Tambah Menu -->
<div class="modal fade" id="modal-cr_menu" data-backdrop="static" 
tabindex="-1" role="dialog" aria-labelledby="modal-cr_menuLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="modal-cr_menuLabel">
          Tambah Data Menu
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p><i class="fas fa-xs fa-check"></i> Pastikan semua kolom bertanda 
        <i class="fas fa-xs fa-asterisk text-danger mx-1"></i> diisi dengan
        nilai yang valid! <i class="fas fa-check text-success"></i></p>
        
        <form id="form-cr_menu">
          
          <div class="form-group">
            <label for="menu">menu <span class="text-danger">*</span></label>
            <input type="text" name="menu" id="cr-menu" class="form-control">
          </div>

          <div class="form-group">
            <label for="is_active">status</label>
            <select name="is_active" id="cr-is_active" class="custom-select">
              <option value="0" selected>pilih disini</option>
              <option value="1">active</option>
              <option value="0">not active</option>
            </select>
          </div>
          
          <div class="mt-4">
            <button type="button" class="btn btn-info btn-block" 
            id="submit-cr_menu">
              <i class="fas fa-paper-plane"></i> kirim
            </button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>



<!-- Modal Update Menu -->
<div class="modal fade" id="modal-up_menu" data-backdrop="static" 
tabindex="-1" role="dialog" aria-labelledby="modal-up_menuLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="modal-up_menuLabel">
          Perbarui Data Menu
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p><i class="fas fa-xs fa-check"></i> Pastikan semua kolom bertanda 
        <i class="fas fa-xs fa-asterisk text-danger mx-1"></i> diisi dengan
        nilai yang valid! <i class="fas fa-check text-success"></i></p>
        
        <form id="form-up_menu">
          <input type="hidden" name="id" id="up-id" class="form-control">
          
          <div class="form-group">
            <label for="menu">menu <span class="text-danger">*</span></label>
            <input type="text" name="menu" id="up-menu" class="form-control">
          </div>

          <div class="form-group">
            <label for="is_active">status</label>
            <select name="is_active" id="up-is_active" class="custom-select">
              <option value="" selected>pilih disini</option>
              <option value="1">active</option>
              <option value="0">not active</option>
            </select>
          </div>
          
          <div class="mt-4">
            <button type="button" class="btn btn-info btn-block" 
            id="submit-up_menu">
              <i class="fas fa-paper-plane"></i> kirim
            </button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>





