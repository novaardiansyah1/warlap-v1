<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model
{
  
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  
  function get_all() 
  {
    return $this->db->get('menu')->result_array();
  }
  
  function get_by_id($id) 
  {
    return $this->db->get_where('menu', ['id' => $id])->row_array();
  }
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  
  function is_cr_menu()
  {
    $menu = htmlspecialchars($_POST['menu']);
    $menu = $this->db->get_where('menu', ['menu' => $menu])->num_rows();
    if($menu > 0) {
      echo('false');
    } else {
      echo('true');
    }
  }
  
  function create() 
  {
    $menu      = htmlspecialchars($_POST['menu']);
    $is_active = htmlspecialchars($_POST['is_active']);
    
    $this->db->insert('menu', [
      'menu'      => $menu,
      'is_active' => $is_active,
    ]);
    
    echo('true');
  }
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  

}