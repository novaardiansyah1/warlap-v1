$(document).ready(function() {


// data table
let tabel = $('#tabel').html();
if(tabel) {
  $('#tabel').DataTable();
}

// pesan sweetalert
let pesan = $('.pesan').data('html');
let type  = $('.pesan').data('type');

if (pesan !== '') {
  Swal.fire({
    title: '',
    html: html,
    type: type
  });
}

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

// autocomplete off 
$('input').each(function(){
  $(this).attr('autocomplete','off');
});

// function loading button
function loading(selector, stop = null) {
  if(stop == null) {
    $(selector).html(`<span class="spinner-border spinner-border-sm"
    role="status" aria-hidden="true"></span> loading..`);
  } else {
    $(selector).html(stop);
  }
}

// function base_url 
function base_url(selector)
{
  let base_url = $('#base_url').attr('href');
  let url = base_url+selector;
  return url;
}



