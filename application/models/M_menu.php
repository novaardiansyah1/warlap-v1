<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model
{
  
/*============================
  function to get data menu
  ============================*/
  function get_all() 
  {
    return $this->db->get('menu')->result_array();
  }
  
  function get_by_id($id) 
  {
    $menu = $this->db->get_where('menu', 
            ['id' => $id])->row_array();
    echo json_encode($menu);
  }


/*============================
  function validation menu
  ============================*/
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

/*============================
  function insert new menu
  ============================*/  
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

/*============================
  function validation menu
  ============================*/
  function is_up_menu()
  {
    $id   = htmlspecialchars($_POST['id']);
    $menu = htmlspecialchars($_POST['menu']);
    
    $data1 = $this->db->get_where('menu', ['id' => $id])->row_array();
    $data2 = $this->db->get_where('menu', ['menu' => $menu])->row_array();
    
    if($data2 !== null) {
      if($data2['menu'] !== $data1['menu']) {
        echo(false);
      } else {
        echo(true);
      }
    } else {
      echo(true);
    }
  }
  
/*============================
  function update menu
  ============================*/  
  function update()
  {
    $id        = htmlspecialchars($_POST['id']);
    $menu      = htmlspecialchars($_POST['menu']);
    $is_active = htmlspecialchars($_POST['is_active']);
    
    $data1 = $this->db->get_where('menu', ['id' => $id])->row_array();
    $data2 = $this->db->get_where('menu', ['menu' => $menu])->row_array();
    
    if($data2 !== null) {
      if($data2['menu'] !== $data1['menu']) {
        print(false);
      } else {
        $this->proses_update($id, $menu, $is_active);
      }
    } else {
      $this->proses_update($id, $menu, $is_active);
    }
  }

/*============================
  function proses update menu
  ============================*/  
  function proses_update($id, $menu, $is_active)
  {
    $this->db->update('menu', [
      'menu'      => $menu,
      'is_active' => $is_active
    ], ['id' => $id]);
    
    print(true);
  }

/*============================
  function delete menu
  ============================*/
  function delete($id) 
  {
    $this->db->delete('menu', ['id' => $id]);
  }
  
}