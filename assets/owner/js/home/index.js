$(document).ready(function(){

// base url
let base_url = $('.base_url').data('url');

// autocomplete off 
$('input').each(function(){
  $(this).attr('autocomplete','off');
});


// loading 
let loading = `<span class="spinner-border spinner-border-sm"
               role="status" aria-hidden="true"></span> loading..`;
/*========================================================================================================*/  
  // show / hide password login
  $('#l_show').click(function(){
    let check = $(this).data('check');
    if(check == 1)
    {
      $(this).removeClass('fa-eye');
      $(this).addClass('fa-eye-slash');
      $('#l_password').attr('type','text');
      check = $(this).data('check','0');
    } else {
      $(this).removeClass('fa-eye-slash');
      $(this).addClass('fa-eye');
      $('#l_password').attr('type','password');
      check = $(this).data('check','1');
    }
  });
  
  // show / hide password register
  $('#r_show').click(function(){
    let check = $(this).data('check');
    if(check == 1)
    {
      $(this).removeClass('fa-eye');
      $(this).addClass('fa-eye-slash');
      $('#r_password, #r_password1').attr('type','text');
      check = $(this).data('check','0');
    } else {
      $(this).removeClass('fa-eye-slash');
      $(this).addClass('fa-eye');
      $('#r_password, #r_password1').attr('type','password');
      check = $(this).data('check','1');
    }
  });
/*========================================================================================================*/  


/*========================================================================================================*/  
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
  
  // link login 
  $('#login').click(function(e){
    e.preventDefault();
    $('#modal_register').modal('hide');
    $('#modal_login').modal('show');
  });
  
  // validasi login
  
  // username 
  $('#l_username').keyup(function(){
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
  $('#l_password').keyup(function(){
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
  
  // cek terms login
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
/*========================================================================================================*/  


/*========================================================================================================*/
  // link daftar
  $('#daftar').click(function(e){
    e.preventDefault();
    $('#modal_login').modal('hide');
    $('#modal_register').modal('show');
  });
  
  // register 
  $('.tombol_register').click(function(){
    let data = $('#form_register').serialize();
    let url  = $('#form_register').attr('action');
    let tombol = $('.tombol_register').html();
    $.ajax({
      url: url,
      type: 'post',
      data: data,
      beforeSend: function() {
        $('.tombol_register').html(`<span class="spinner-border spinner-border-sm"
        role="status" aria-hidden="true"></span> loading..`);
      },
      success: function(data) {
        if(data == 'true')
        {
          $('#modal_register').modal('hide');
          
          Swal.fire({
            title: '',
            html: 'selamat anda berhasil registrasi.', 
            type: 'success'
          });
          
          $('.tombol_register').html(tombol);
        } else {
          Swal.fire({
            title: '',
            html: data,
            type: 'error'
          });
          
          $('.tombol_register').html(tombol);
        }
        
      }
    });
  });
  
  // validasi registrasi
  
  // nama 
  $('#r_nama').keyup(function(){
    let nama = $(this).val().length;
    
    if(nama < 3 || nama > 120)
    {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  });
  
  // username 
  $('#r_username').keyup(function(){
    let username = $(this).val();
    let data = $('#form_register').serialize();
    let url = base_url + 'auth/cek_username';
    
    $.ajax({
      url: url,
      type: 'post',
      data: data,
      success: function(data) {
        if(data > 0)
        {
          $('#r_username').removeClass('is-valid');
          $('#r_username').addClass('is-invalid');
        } else {
          if(username.length < 9 || username.length > 30)
          {
            $('#r_username').removeClass('is-valid');
            $('#r_username').addClass('is-invalid');
          } else {
            $('#r_username').removeClass('is-invalid');
            $('#r_username').addClass('is-valid');
          }
        }
      }
    });
    
  });
  
  // email
  $('#r_email').keyup(function(){
    let data = $('#form_register').serialize();
    let url = base_url + 'auth/cek_email';
    let email = $(this).val();
    
    $.ajax({
      url: url,
      type: 'post',
      data: data,
      success: function(data) {
        if(data > 0)
        {
          $('#r_email').removeClass('is-valid');
          $('#r_email').addClass('is-invalid');
        } else {
          if(email.length < 6 || email.length > 60 || !email.
          match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
          {
            $('#r_email').removeClass('is-valid');
            $('#r_email').addClass('is-invalid');
          } else {
            $('#r_email').removeClass('is-invalid');
            $('#r_email').addClass('is-valid');
          }
        }
      }  
    });
    
  });
  
  // no. telepon
  $('#r_no_telp').keyup(function(){
    let data = $('#form_register').serialize();
    let url = base_url + 'auth/cek_no_telp';
    let no_telp = $(this).val();
    
    $.ajax({
      url: url,
      type: 'post',
      data: data,
      success: function(data) {
        if (data > 0)
        {
          $('#r_no_telp').removeClass('is-valid');
          $('#r_no_telp').addClass('is-invalid');
        } else {
          if(no_telp.length < 11 || no_telp.length > 16)
          {
            $('#r_no_telp').removeClass('is-valid');
            $('#r_no_telp').addClass('is-invalid');
          } else {
            $('#r_no_telp').removeClass('is-invalid');
            $('#r_no_telp').addClass('is-valid');
          }
        }
      }  
    });

  });
  
  // password
  $('#r_password').keyup(function(){
    let password  = $(this).val().length;
    let pass      = $(this).val();
    let password1 = $('#r_password1').val();
    
    if(password1 != pass)
    {
      $('#r_password1').removeClass('is-valid');
      $('#r_password1').addClass('is-invalid');
    } else {
      $('#r_password1').removeClass('is-invalid');
      $('#r_password1').addClass('is-valid');
    }
    
    if(password < 6 || password > 30)
    {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  });
  
  // konfirmasi password
  $('#r_password1').keyup(function(){
    let password = $('#r_password').val();
    let password1 = $(this).val();
    
    if(password1 != password)
    {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  });
  
  // cek terms1 register
  $('.tombol_register').attr('disabled','true');
  $('#terms1').click(function(){
    let check = $('#terms1').attr('value');
    if(check == '')
    {
      $('.tombol_register').removeAttr('disabled');
      $('#terms1').val(1);
    } else {
      $('.tombol_register').attr('disabled','true');
      $('#terms1').val('');
    }
  });
/*========================================================================================================*/


/*========================================================================================================*/
// validasi form laporan
  
  // kategori
  $('#kategori_id').change(function(){
    let kategori = $(this).val();
    if(kategori == '') 
    {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  });
  
  // judul 
  $('#judul').keyup(function(){
    let judul = $(this).val().length;
    if(judul < 20 || judul > 100 ) 
    {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  });
  
  // laporan 
  $('#laporan').keyup(function(){
    let laporan = $(this).val().length;
    if(laporan < 50 || laporan > 500 ) 
    {
      $(this).removeClass('is-valid');
      $(this).addClass('is-invalid');
    } else {
      $(this).removeClass('is-invalid');
      $(this).addClass('is-valid');
    }
  });
/*========================================================================================================*/

  // tombol kirim laporan
  $('.btn_kirim_laporan').click(function(e){
    e.preventDefault();
    let user = $(this).data('user');
    let data = $('#form_lapor').serialize();
    let url = base_url + 'lapor';
    let button = $('.btn_kirim_laporan').html();
    
    if(user)
    {
       $.ajax({
         url: url,
         type: 'post',
         data: data,
         beforeSend: function() {
           $('.btn_kirim_laporan').html(loading);
         }, 
         success: function(data) {
           $('.btn_kirim_laporan').html(button);
           if(data == 'true') {
             Swal.fire({
               title: '',
               html: 'laporan/keluhan anda berhasil dikirim.',
               type: 'success'
             });
             setTimeout(function() {
               $(location).attr('href',base_url+'member');
             }, 5000);
           } else {
             Swal.fire({
               title: '',
               html: data,
               type: 'error'
             });
           }
         }
       });
    } else {
      $('#modal_login').modal('show');
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
  
});