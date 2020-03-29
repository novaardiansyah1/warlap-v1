<!-- Modal Tambah Menu -->
<div class="modal fade" id="modal-cr_role" data-backdrop="static" 
tabindex="-1" role="dialog" aria-labelledby="modal-cr_roleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="modal-cr_roleLabel">
          Tambah Hak Akses
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p><i class="fas fa-xs fa-check"></i> Pastikan semua kolom bertanda 
        <i class="fas fa-xs fa-asterisk text-danger mx-1"></i> diisi dengan
        nilai yang valid! <i class="fas fa-check text-success"></i></p>
        
        <form id="form-cr_role">
          <div class="form-group">
            <label for="role">Hak Akses / Jabatan <span class="text-danger">*</span></label>
            <input type="text" name="role" id="cr-role" class="form-control">
          </div>
            
          <div class="mt-4">
            <button type="button" class="btn btn-info btn-block" 
            id="submit-cr_role">
              <i class="fas fa-paper-plane"></i> kirim
            </button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>




<!-- Modal Tambah Menu -->
<div class="modal fade" id="modal-up_role" data-backdrop="static" 
tabindex="-1" role="dialog" aria-labelledby="modal-up_roleLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header bg-info">
        <h5 class="modal-title" id="modal-up_roleLabel">
          Perbarui Jabatan
        </h5>
        <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-dark">
        <p><i class="fas fa-xs fa-check"></i> Pastikan semua kolom bertanda 
        <i class="fas fa-xs fa-asterisk text-danger mx-1"></i> diisi dengan
        nilai yang valid! <i class="fas fa-check text-success"></i></p>
        
        <form id="form-up_role">
          
          <input type="hidden" name="id" id="up-id">
          <div class="form-group">
            <label for="role">Hak Akses / Jabatan <span class="text-danger">*</span></label>
            <input type="text" name="role" id="up-role" class="form-control">
          </div>
            
          <div class="mt-4">
            <button type="button" class="btn btn-info btn-block" 
            id="submit-up_role">
              <i class="fas fa-paper-plane"></i> kirim
            </button>
          </div>
        </form>
      </div>
      <!-- /.card-body -->
    </div>
  </div>
</div>




