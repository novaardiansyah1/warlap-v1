$(document).ready(function() {


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// base url
let url = base_url('submenu/');
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// show modal create
$('#btn-cr_submenu').click(function(){
  $('#modal-cr_submenu').modal('show');
});

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
$('#submit-cr_submenu').click(function(){
  let href = url + 'create';
  let data = $('#form_create').serialize();
  let tombol = $(this).html();
  
  $.ajax({
    url: href,
    data: data,
    type: 'post',
    beforeSend: function() {
      loading('#submit-cr_submenu');
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
      
      loading('#submit-cr_submenu', tombol);
    }
  });
  
});
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
$('.btn-up_submenu').click(function(e) {
  e.preventDefault();
  let href = $('.btn-up_submenu').attr('href');
  //let id   = $('.btn-up_submenu').attr('href');
  
  //siapkan data untuk modal
  $.ajax({
    url: href,
    data: null,
    type: 'post',
    success: function(result) {
      let data = JSON.parse(result);
      $('#up-id').val(data.id);
      $('#up-submenu').val(data.submenu);
      $('#up-link').val(data.link);
      $('#up-icon').val(data.icon);
      $('#up-menu_id').val(data.menu_id);
      $('#up-is_active').val(data.is_active);
    }
  });
  
  $('#modal-up_submenu').modal('show');
});

// validasi update submenu

// submenu
$('#up-submenu').keyup(function(){
  let id      = $('.btn-up_submenu').data('id');
  let submenu = $(this).val();
  let href    = url + 'is_up_submenu';
  
  $.ajax({
    url: href,
    data: {
      id: id,
      submenu: submenu
    },
    type: 'post',
    success: function(result) {
      if(result == 'false') {
        invalid('#up-submenu');
      } else {
        if (submenu.length < 3 || submenu.length > 20) {
          invalid('#up-submenu');
        } else {
          valid('#up-submenu');
        }
      }
    }
  });
});

// menu
$('#up-menu_id').change(function(){
  let menu = $(this).val();
  if(menu.length < 1){
    invalid('#up-menu_id');
  } else {
    valid('#up-menu_id');
  }
});

// link
$('#up-link').keyup(function(){
  let link = $(this).val();
  
  if (link.length < 3 || link.length > 120) {
    invalid('#up-link');
  } else {
    valid('#up-link');
  }
});

// icon 
$('#up-icon').keyup(function(){
  let icon = $(this).val();
  
  if(icon.length < 8 || icon.length > 30) {
    invalid('#up-icon');
  } else {
    valid('#up-icon');
  }
});

$('#submit-up_submenu').click(function(){
  let href   = url + 'update';
  let data   = $('#form-up_submenu').serialize();
  let tombol = $(this).html();
  
  $.ajax({
    url: href,
    data: data,
    type: 'post',
    beforeSend: function() {
      loading('#submit-up_submenu');
    },
    success: function(result) {
      if(result == 'true') {
        Swal.fire({
          title: '',
          html: 'submenu berhasil diperbarui.',
          type: 'success'
        });
        
        setTimeout(function() {
          $(location).attr('href', href);
        }, 2000);
      } else {
        Swal.fire({
          title: '',
          html: 'gagal memperbarui submenu, mohon cek kembali formulir anda.',
          type: 'error'
        });
      }
      
      loading('#submit-up_submenu', tombol);
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