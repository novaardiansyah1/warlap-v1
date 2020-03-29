$(document).ready(function() {

/*============================
  base url
  ============================*/
  let url = base_url('akses/');
  
/*============================
  update / create / delete akses 
  ============================*/
  $('.check').click(function(){
    let role_id = $(this).data('role');    
    let menu_id = $(this).data('menu');   
    let href    = url + 'cek_hak_akses';
    
    $.ajax({
      url: href,
      type: 'post',
      data: {
        menu_id: menu_id,
        role_id: role_id
      },
      success: function(result) {
        $(location).attr('href', url+'hak_akses/'+role_id);
      },
    });  
  });
  
  
  
  
  
  
  
  
  
  
  
  
});