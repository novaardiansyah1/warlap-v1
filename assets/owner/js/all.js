$(document).ready(function() {


/*==============================
  DataTable
  ==============================*/
  let tabel = $('#tabel').html();
  if(tabel) {
    $('#tabel').DataTable();
  }

});

/*==============================
  jika inputan tidak valid
  ==============================*/
  function invalid(selector) {
    $(selector).removeClass('is-valid');
    $(selector).addClass('is-invalid');
  }

/*==============================
  jika inputan valid
  ==============================*/
  function valid(selector) {
    $(selector).removeClass('is-invalid');
    $(selector).addClass('is-valid');
  }

/*==============================
  semua inputan autocomplete off
  ==============================*/ 
  $('input').each(function(){
    $(this).attr('autocomplete','off');
  });

/*==============================
  loading animasi tombol
  ==============================*/
  function loading(selector, stop = null) {
    if(stop == null) {
      $(selector).html(`<span class="spinner-border spinner-border-sm"
      role="status" aria-hidden="true"></span> loading..`);
    } else {
      $(selector).html(stop);
    }
  }

/*==============================
  base_url
  ==============================*/
  function base_url(selector)
  {
    let base_url = $('#base_url').attr('href');
    let url = base_url+selector;
    return url;
  }

/*==============================
  konfirmasi perintah delete
  ==============================*/
  function confirm_delete(href)
  {
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
  }

/*==============================
  pesan sweetalert
  ==============================*/
  function sweetalert(html,type) {
    Swal.fire({
      title: '',
      html: html,
      type: type
    });
  }


