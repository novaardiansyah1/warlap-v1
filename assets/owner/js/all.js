$(document).ready(function() {


// data table
let tabel = $('#tabel').html();
if(tabel) {
  $('#tabel').DataTable();
}

// pesan sweetalert
let pesan = $('.pesan').data('pesan');
let type  = $('.pesan').data('type');

if (pesan) {
  Swal.fire({
    title: '',
    html: pesan,
    type: type
  });
}


});