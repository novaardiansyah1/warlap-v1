$(document).ready(function() {
/*==============================
  base_url
  ==============================*/
  let url = base_url('user');
    
/*==============================
  jika click blokir
  ==============================*/
  $('.btn_blokir').click(function(e) {
    e.preventDefault();
    let href = $(this).attr('href');
    
    Swal.fire({
      title: '',
      html: 'apakah anda yakin? user terkait akan dilarang login!',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'blokir'
    }).then((result => {
      if(result.value) {
        $(location).attr('href', href);
      }
    }));
  });



});