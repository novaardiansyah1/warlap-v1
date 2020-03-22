$(document).ready(function() {

/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// base url
let url = $('#base_url').attr('href');

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
// validasi update profile

// nama
$('#nama').keyup(function(){
  let nama = $(this).val();
  
  if(nama.length < 3 || nama.length > 120) 
  {
    invalid('#nama');
  } else {
    valid('#nama');
  }
});

// bio
$('#bio').keyup(function(){
  let bio = $(this).val();
  
  if(bio.length > 70) 
  {
    invalid('#bio');
  } else {
    valid('#bio');
  }
});

// tanggal lahir
$('#tgl_lahir').keyup(function(){
  let tgl_lahir = $(this).val();
  
  if(tgl_lahir.length > 10) 
  {
    invalid('#tgl_lahir');
  } else {
    valid('#tgl_lahir');
  }
});

// nomer ktp
$('#no_ktp').keyup(function(){
  let no_ktp = $(this).val();
  
  if(no_ktp.length > 16) 
  {
    invalid('#no_ktp');
  } else {
    valid('#no_ktp');
  }
});

// website
$('#website').keyup(function(){
  let website = $(this).val();
  
  if(website.length > 20) 
  {
    invalid('#website');
  } else {
    valid('#website');
  }
});



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/




});