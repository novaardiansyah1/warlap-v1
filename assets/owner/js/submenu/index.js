$(document).ready(function() {


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// base url
let base_url = $('#base_url').attr('href');
let url = base_url + 'submenu/';

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
// show modal create
$('#btn_create').click(function(){
  $('#modal_create').modal('show');
});
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/



/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
// validasi create submenu

// submenu
$('#submenu').keyup(function(){
  let submenu = $(this).val();
  let data    = $('#form_create').serialize();
  let href    = url + 'is_submenu';
  
  $.ajax({
    url: href,
    type: 'post',
    data: data,
    success: function(result) {
      if(result > 0) {
        invalid('#submenu');
      } else {
        if (submenu.length < 3 || submenu.length > 20) {
          invalid('#submenu');
        } else {
          valid('#submenu');
        }
      }
    }
  });
});

// menu
$('#menu_id').change(function(){
  let menu = $(this).val();
  if(menu.length < 1){
    invalid('#menu_id');
  } else {
    valid('#menu_id');
  }
});
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/







});