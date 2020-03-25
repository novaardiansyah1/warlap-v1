$(document).ready(function() {


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// base url
let base_url = $('#base_url').attr('href');
let url = base_url + 'submenu/';

// autocomplete off 
$('input').each(function(){
  $(this).attr('autocomplete','off');
});

// function invalid 
function invalid(selector) {
  $(selector).removeClass('is-valid');
  $(selector).addClass('is-invalid');
}

// function valid 
function valid(selector) {
  $(selector).removeClass('is-invalid');
  $(selector).addClass('is-valid');
}

// function loading button
function loading(selector, stop = null) {
  if(stop == null) {
    $(selector).html(`<span class="spinner-border spinner-border-sm"
    role="status" aria-hidden="true"></span> loading..`);
  } else {
    $(selector).html(stop);
  }
}
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// show modal create
$('#btn_create').click(function(){
  $('#modal_create').modal('show');
});
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// validasi insert submenu

// submenu
$('#cr-submenu').keyup(function(){
  let submenu = $(this).val();
  let href    = url + 'is_submenu';
  let data    = $('#form_create').serialize();
  
  $.ajax({
    url: href,
    type: 'post',
    data: data,
    success: function(result) {
      if(result > 0) {
        invalid('#cr-submenu');
      } else {
        if (submenu.length < 3 || submenu.length > 20) {
          invalid('#cr-submenu');
        } else {
          valid('#cr-submenu');
        }
      }
    }
  });
});

// menu
$('#cr-menu_id').change(function(){
  let menu = $(this).val();
  if(menu.length < 1){
    invalid('#cr-menu_id');
  } else {
    valid('#cr-menu_id');
  }
});

// link
$('#cr-link').keyup(function(){
  let link = $(this).val();
  let href = url + 'is_link';
  let data = $('#form_create').serialize();
  
  $.ajax({
    url: href,
    type: 'post',
    data: data,
    success: function(result) {
      if(result > 0) {
        invalid('#cr-link');
      } else {
        if (link.length < 3 || link.length > 120) {
          invalid('#cr-link');
        } else {
          valid('#cr-link');
        }
      }
    }
  });
});

// icon 
$('#cr-icon').keyup(function(){
  let icon = $(this).val();
  
  if(icon.length < 8 || icon.length > 30) {
    invalid('#cr-icon');
  } else {
    valid('#cr-icon');
  }
});

// kirim data
$('#cr-create_submenu').click(function(){
  let href = url + 'create';
  let data = $('#form_create').serialize();
  let tombol = $(this).html();
  
  $.ajax({
    url: href,
    data: data,
    type: 'post',
    beforeSend: function() {
      loading('#cr-create_submenu');
    },
    success: function(result) {
      if(result == 'true') {
        Swal.fire({
          title: '',
          html: 'submenu berhasil ditambahkan.',
          type: 'success'
        });
        
        setTimeout(function() {
          $(location).attr('href', href);
        }, 2000);
      } else {
        Swal.fire({
          title: '',
          html: 'gagal menambahkan submenu, mohon cek kembali formulir anda.',
          type: 'error'
        });
      }
      
      loading('#cr-create_submenu', tombol);
    }
  });
  
});
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
$('.btn_delete').click(function(e) {
  e.preventDefault();
  // simpan link
  let href = $(this).attr('href');
  // tampilkan konfirmasi
  Swal.fire({
    title: '',
    html: 'apakah anda yakin? data akan dihapus permanen!',
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'hapus'
  }).then((result => {
    if(result.value) {
      Swal.fire({
        title: '',
        html: 'data berhasil dihapus permanen.',
        type: 'success'
      });
      
      setTimeout(function() {
        $(location).attr('href', href);
      }, 2000);
    }
  }));
  
});
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/

/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/







});