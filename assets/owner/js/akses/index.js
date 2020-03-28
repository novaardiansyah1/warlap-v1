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
  
  
  
  
  
  
  
});  