$(document).ready(function() {

/*============================
  base url
  ============================*/
  let url = base_url('menu/');

/*============================
  show modal create menu
  ============================*/
  $('#btn-cr_menu').click(function() {
    $('#modal-cr_menu').modal('show');
  });

/*============================
  validation create menu
  ============================*/
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

/*============================
  insert new menu
  ============================*/
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


/*============================
  show modal create menu
  ============================*/
  $('.btn-up_menu').click(function(e) {
    e.preventDefault();
    let href = $(this).attr('href');
    
    $.ajax({
      url: href,
      data: null,
      type: 'post',
      success: function(result) {
        let data = JSON.parse(result);
        $('#up-id').val(data.id);
        $('#up-menu').val(data.menu);
        $('#up-is_active').val(data.is_active);
      }
    });
    
    $('#modal-up_menu').modal('show');
  });

/*============================
  validation update menu
  ============================*/
  $('#up-menu').keyup(function() {
    let href = url + 'is_up_menu';
    let id   = $('#up-id').val();
    let menu = $(this).val();
    
    $.ajax({
      url: href,
      type: 'post',
      data: {
        id: id,
        menu: menu
      },
      success: function(result) {
        if(result == 'false') {
          invalid('#up-menu');
        } else {
          if(menu.length < 3 || menu.length > 20) {
            invalid('#up-menu');
          } else {
            valid('#up-menu');
          }
        }
      }
    });
  });

/*============================
  delete menu
  ============================*/
  $('.btn-del_menu').click(function(e) {
    e.preventDefault();
    
    let href = $(this).attr('href');
    confirm_delete(href);
  });

});