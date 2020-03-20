$(document).ready(function(){
  
  // show / hide password
  $('#show_hide').click(function(){
    let check = $(this).data('check');
    if(check == 1)
    {
      $(this).removeClass('fa-eye');
      $(this).addClass('fa-eye-slash');
      $('#password').attr('type','text');
      check = $(this).data('check','0');
    } else {
      $(this).removeClass('fa-eye-slash');
      $(this).addClass('fa-eye');
      $('#password').attr('type','password');
      check = $(this).data('check','1');
    }
  });
  
  // username 
  $('#username').keyup(function(){
    let username = $(this).val().length;
    
    if(username < 9 || username > 30)
    {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  });
  
  // password
  $('#password').keyup(function(){
    let password = $(this).val().length;
    
    if(password < 9 || password > 30)
    {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  });
  
  $('.btn_kirim_laporan').click(function(e){
    e.preventDefault();
    let user = $(this).data('user');
    if(user)
    {
      
    } else {
      $('#modal_login').modal('show');
    }
  });
  
  // cek terms sudah diceklis belum
  $('.tombol_login').attr('disabled','true');
  $('#terms').click(function(){
    let check = $('#terms').attr('value');
    if(check == '')
    {
      $('.tombol_login').removeAttr('disabled');
      $('#terms').val(1);
    } else {
      $('.tombol_login').attr('disabled','true');
      $('#terms').val('');
    }
  });
  
  // cek jika user akses profile
  $('.nav-link.profile').click(function(e){
    e.preventDefault();
    let user = $('.btn_kirim_laporan').data('user');
    let url = $(this).attr('href');
    if(user)
    {
      $(location).attr('href',url);
    } else {
      $('#modal_login').modal('show');
    }
  });
  
  // login dengan modal
  $('.tombol_login').click(function(){
    let data = $('#form_login').serialize();
    let url  = $('#form_login').attr('action');
    let tombol = $('.tombol_login').html();
    $.ajax({
      url: url,
      type: 'post',
      data: data,
      beforeSend: function() {
        $('.tombol_login').html(`<span class="spinner-border spinner-border-sm"
        role="status" aria-hidden="true"></span> loading..`);
      },
      success: function(data) {
        if(data > 0)
        {
          $('#modal_login').modal('hide');
          
          Swal.fire({
            title: '',
            html: 'selamat anda berhasil login.', 
            type: 'success'
          });
          $('#user_id').val(data);
          $('.btn_kirim_laporan').data('user', data);
          $('.tombol_login').html(tombol);
        } else {
          Swal.fire({
            title: '',
            html: data,
            type: 'error'
          });
          
          $('.tombol_login').html(tombol);
        }
        
      }
    });
  });
   

});