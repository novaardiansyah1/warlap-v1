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