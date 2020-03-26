$(document).ready(function() {


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// base url
let url = base_url('menu/');
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// show modal
$('#btn-cr_menu').click(function() {
  $('#modal-cr_menu').modal('show');
});

// validation menu
$('#cr-menu').keyup(function() {
  let href = url + 'is_cr_menu';
  let menu = $(this).val();
  
  $.ajax({
    url: href,
    data: {
      menu: menu
    },
    type: 'post',
    success: function(result) {
      if(result == 'false') {
        invalid('#cr-menu');
      } else {
        if(menu.length < 3 || menu.length > 20) {
          invalid('#cr-menu');
        } else {
          valid('#cr-menu');
        }
      }
    }
  });
});

// submit cr_menu
$('#submit-cr_menu').click(function() {
  let href   = url + 'create';
  let data   = $('#form-cr_menu').serialize();
  let tombol = $(this).html();
  
  $.ajax({
    url: href,
    type: 'post',
    data: data,
    beforeSend: function() {
      loading('#submit-cr_menu');
    },
    success: function(result) {
      if(result == 'false') {
        sweetalert(`gagal menambahkan menu baru! mohon cek 
        kembali formulir anda.`, 'error');
      } else {
        sweetalert(`berhasil menambahkan menu baru.`, 'success');
        setTimeout(function() {
          $(location).attr('href', href);
        }, 2000);
      }
      loading('#submit-cr_menu', tombol);
    }
  });
});
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
function sweetalert(html,type) {
  Swal.fire({
    title: '',
    html: html,
    type: type
  });
}
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



});