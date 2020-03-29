$(document).ready(function() {

/*============================
  base url
  ============================*/
  let url = base_url('akses/');
  
/*============================
  hapus role
  ============================*/
  $('.btn-del_role').click(function(e) { 
    e.preventDefault();
    let href = $(this).attr('href');
    
    sweet_confirm('apakah anda yakin? hak akses akan dihapus permanen.',
    'hapus', href);    
  });

/*============================
  tampilkan modal create role
  ============================*/
  $('.btn-cr_role').click(function() {
    $('#modal-cr_role').modal('show');
  });

/*============================
  validasi role
  ============================*/
  $('#cr-role').keyup(function() {
    let role = $(this).val();
    let href = url + 'is_cr_role';
    
    $.ajax({
      url: href,
      type: 'post',
      data: {role: role},
      success: function(result) {
        if(result == false) {
          invalid('#cr-role');
        } else {
          if(role.length < 5 || role.length > 30) {
            invalid('#cr-role');
          } else {
            valid('#cr-role');
          }
        }
      }
    });
  });

/*============================
  proses tambah role
  ============================*/  
  $('#submit-cr_role').click(function(e) {
    let href = url + 'create_role';
    let data = $('#form-cr_role').serialize();
    let tombol = $(this).html();
    
    $.ajax({
      url: href,
      type: 'post',
      data: data,
      beforeSend: function() {
        loading('#submit-cr_role');
      },
      success: function(result) {
        if(result == false) {
          sweetalert('gagal menambahkan hak akses, mohon cek kembali formulir anda.',
          'error');
        } else {
          sweetalert('berhasil menambahkan hak akses',
          'success');
          setTimeout(function() {
            $(location).attr('href', href);
          }, 1500);
        }
        loading('#submit-cr_role', tombol);
      }
    });
    
  });
  
  
  
  
});  