$(document).ready(function() {
/*==============================
  base_url
  ==============================*/
  let url = base_url('user');
    
/*==============================
  jika klik blokir
  ==============================*/
  $('.btn_blokir').click(function(e) {
    e.preventDefault();
    let href = $(this).attr('href');
    
    sweet_confirm('apakah anda yakin? akun pengguna akan diblokir dari layanan.',
    'blokir', href);  
  });

/*==============================
  jika klik buka blokir
  ==============================*/
  $('.btn_buka_blokir').click(function(e) {
    e.preventDefault();
    let href = $(this).attr('href');
    
    sweet_confirm('apakah anda yakin? akun pengguna akan diaktifkan kembali.',
    'aktifkan', href);
  });



});