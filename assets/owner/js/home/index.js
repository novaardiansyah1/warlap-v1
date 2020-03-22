$(document).ready(function(){

// base url
let base_url = $('.base_url').data('url');

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

// function show password
function show_pass(check, selector) {
  $(check).removeClass('fa-eye');
  $(check).addClass('fa-eye-slash');
  $(selector).attr('type','text');
  check = $(check).data('check','0');
}

// function hide password
function hide_pass(check, selector) {
  $(check).removeClass('fa-eye-slash');
  $(check).addClass('fa-eye');
  $(selector).attr('type','password');
  check = $(check).data('check','1');
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

// navbar 
$('a.nav-link').click(function(){
  $('a.nav-link').removeClass('active');
  $(this).addClass('active');
});

// pesan success
let pesan = $('.pesan').data('pesan');
if (pesan) {
  Swal.fire({
    title: '',
    html: pesan,
    type: 'success'
  });
}

/*===========================================================================*/
  // show / hide password login
  $('#l_show').click(function(){
    let check = $(this).data('check');
    
    if(check == 1)
    {
      show_pass('#l_show','#l_password');
    } else {
      hide_pass('#l_show','#l_password');
    }
  });
  
  // show / hide password register
  $('#r_show').click(function(){
    let check = $(this).data('check');
    if(check == 1)
    {
      show_pass('#r_show','#r_password, #r_password1');
    } else {
      hide_pass('#r_show','#r_password, #r_password1');
    }
  });
/*===========================================================================*/


/*===========================================================================*/
  // login dengan modal
  $('.tombol_login').click(function(){
    let data   = $('#form_login').serialize();
    let url    = base_url + 'auth';
    let tombol = $('.tombol_login').html();
    
    $.ajax({
      url: url,
      type: 'post',
      data: data,
      beforeSend: function() {
        loading('.tombol_login');
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
          
          loading('.tombol_login', tombol);
        } else {
          Swal.fire({
            title: '',
            html: data,
            type: 'error'
          });
          
          loading('.tombol_login', tombol);
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
    let username = $(this).val();
    let url = base_url + 'auth/cek_username';
    let data = $('#form_login').serialize();

    $.ajax({
      url: url,
      type: 'post',
      data: data,
      success: function(data) {
        if (data < 1) {
          invalid('#l_username');
        } else {
          valid('#l_username');
        }
      }
    });
  });
  
  // password
  $('#l_password').keyup(function(){
    let password = $(this).val().length;
    
    if(password < 9 || password > 30)
    {
      invalid('#l_password')
    } else {
      valid('#l_password')
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
/*===========================================================================*/


/*========================================================================================================*/
  // link daftar
  $('#daftar').click(function(e){
    e.preventDefault();
    $('#modal_login').modal('hide');
    $('#modal_register').modal('show');
  });
  
  // register 
  $('.tombol_register').click(function(){
    let data   = $('#form_register').serialize();
    let url    = $('#form_register').attr('action');
    let tombol = $('.tombol_register').html();
    
    $.ajax({
      url: url,
      type: 'post',
      data: data,
      beforeSend: function() {
        loading('.tombol_register');
      },
      success: function(data) {
        if(data == 'true')
        {
          $('#modal_register').modal('hide');
          
          Swal.fire({
            title: '',
            html: 'selamat anda berhasil registrasi, silahkan login.', 
            type: 'success'
          });
          
          loading('.tombol_register', tombol);
          
          $('#modal_login').modal('show');
        } else {
          Swal.fire({
            title: '',
            html: data,
            type: 'error'
          });
          
          loading('.tombol_register', tombol);
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
      invalid('#r_nama')
    } else {
      valid('#r_nama')
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
          invalid('#r_username');
        } else {
          if(username.length < 9 || username.length > 30)
          {
            invalid('#r_username');
          } else {
            valid('#r_username');          
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
          invalid('#r_email');
        } else {
          if(email.length < 6 || email.length > 60 || !email.
          match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/))
          {
            invalid('#r_email');
          } else {
            valid('#r_email');
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
          invalid('#r_no_telp');
        } else {
          if(no_telp.length < 11 || no_telp.length > 16)
          {
            invalid('#r_no_telp');
          } else {
            valid('#r_no_telp');
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
      invalid('#r_password1');
    } else {
      valid('#r_password1');
    }
    
    if(password < 6 || password > 30)
    {
      invalid('#r_password')
    } else {
      valid('#r_password')
    }
  });
  
  // konfirmasi password
  $('#r_password1').keyup(function(){
    let password = $('#r_password').val();
    let password1 = $(this).val();
    
    if(password1 != password)
    {
      invalid('#r_password1')
    } else {
      valid('#r_password1')
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
      invalid('#kategori_id')
    } else {
      valid('#kategori_id')
    }
  });
  
  // judul 
  $('#judul').keyup(function(){
    let judul = $(this).val().length;
    if(judul < 20 || judul > 100 ) 
    {
      invalid('#judul')
    } else {
      valid('#judul')
    }
  });
  
  // laporan 
  $('#laporan').keyup(function(){
    let laporan = $(this).val().length;
    if(laporan < 50 || laporan > 500 ) 
    {
      invalid('#laporan')
    } else {
      valid('#laporan')
    }
  });
/*========================================================================================================*/

  // tombol kirim laporan
  $('.btn_kirim_laporan').click(function(e){
    e.preventDefault();
    let user   = $(this).data('user');
    let data   = $('#form_lapor').serialize();
    let url    = base_url + 'lapor';
    let tombol = $('.btn_kirim_laporan').html();
    
    if(user)
    {
      $.ajax({
        url: url,
        type: 'post',
        data: data,
        beforeSend: function() {
          loading('.btn_kirim_laporan');
        }, 
        success: function(data) {
          loading('.btn_kirim_laporan', tombol);
          
          if(data == 'true') {
            Swal.fire({
              title: '',
              html: 'laporan/keluhan anda berhasil dikirim.',
              type: 'success'
            });
            setTimeout(function() {
              $(location).attr('href',base_url+'profile');
            }, 2000);
          } else {
            loading('.btn_kirim_laporan', tombol);
            
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