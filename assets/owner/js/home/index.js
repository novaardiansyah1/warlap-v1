$(document).ready(function(){
  
  // show / hide password
  $('#show_hide').click(function(){
    let check = $(this).data('check');
    if(check == 1)
    {
      $(this).removeClass('fa-eye');
      $(this).addClass('fa-eye-slash');
      $('.password').attr('type','text');
      check = $(this).data('check','0');
    } else {
      $(this).removeClass('fa-eye-slash');
      $(this).addClass('fa-eye');
      $('.password').attr('type','password');
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
  
  // login 
  $('.tombol_login').click(function(){
    let data = $('#form_login').serialize();
    let url = $('#form_login').attr('action');
    let tombol = $(this).html();
    
    $.ajax({
      url: url,
      type: 'post',
      data: data,
      beforeSend: function() {
        $('.tombol_login').html(`<span class="spinner-border spinner-border-sm"
        role="status" aria-hidden="true"></span> loading..`);
      },
      success: function() {
        
      }
    });
  });
   

});