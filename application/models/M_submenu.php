<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_submenu extends CI_Model
{
  
  function get_all() 
  {
    return $this->db->select('submenu.*, menu.menu')
                ->from('submenu')
                ->join('menu','menu.id = submenu.menu_id')
                ->get()->result_array();
  }
  
  function get_by_id($id) 
  {
    $submenu = $this->db->select('submenu.*, menu.menu')
                    ->from('submenu')
                    ->join('menu','menu.id = submenu.menu_id')
                    ->where('submenu.id', $id)
                    ->get()->row_array();
    echo json_encode($submenu);
  }

  function create()
  {
    $submenu   = htmlspecialchars($_POST['submenu']);
    $menu_id   = htmlspecialchars($_POST['menu_id']);
    $link      = htmlspecialchars($_POST['link']);
    $icon      = htmlspecialchars($_POST['icon']);
    $is_active = htmlspecialchars($_POST['is_active']);
      
    $this->db->insert('submenu',[
      'submenu'   => $submenu,
      'menu_id'   => $menu_id,
      'link'      => $link,
      'icon'      => $icon,
      'is_active' => $is_active,
    ]);
    
    echo 'true';
  }
  
  function is_submenu()
  {
    $submenu = htmlspecialchars($_POST['submenu']);
    echo $this->db->get_where('submenu',['submenu' => $submenu])->num_rows();
  }
  
  function is_link()
  {
    $link = htmlspecialchars($_POST['link']);
    echo $this->db->get_where('submenu',['link' => $link])->num_rows();
  }

  function is_up_submenu()
  {
    $id      = htmlspecialchars($_POST['id']);
    $submenu = htmlspecialchars($_POST['submenu']);
    $sub1    = $this->db->get_where('submenu', ['submenu' => $submenu])->row_array();
    $sub2    = $this->db->get_where('submenu', ['id' => $id])->row_array();
    
    if($sub1 !== null) {
      if($sub1['submenu'] !== $sub2['submenu']) {
        echo('false');
      } else {
        echo('true');
      }
    } else {
      echo('true');
    }
  }

/*=============================
  update submenu
  =============================*/
  function update()
  {
    $id        = htmlspecialchars($_POST['id']);
    $submenu   = htmlspecialchars($_POST['submenu']);
    $menu_id   = htmlspecialchars($_POST['menu_id']);
    $link      = htmlspecialchars($_POST['link']);
    $icon      = htmlspecialchars($_POST['icon']);
    $is_active = htmlspecialchars($_POST['is_active']);
    
    $sub1    = $this->db->get_where('submenu', ['submenu' => $submenu])->row_array();
    $sub2    = $this->db->get_where('submenu', ['id' => $id])->row_array();
    
    if($sub1 !== null) {
      if($sub1['submenu'] !== $sub2['submenu']) {
        echo('false');
      } else {
        $this->proses_update($id,$submenu,$menu_id,$link,$icon,$is_active);
      }
    } else {
      $this->proses_update($id,$submenu,$menu_id,$link,$icon,$is_active);
    }
  }

/*=============================
  proses update submenu
  =============================*/
  function proses_update($id,$submenu,$menu_id,$link,$icon,$is_active)
  {
    $this->db->update('submenu',[
      'submenu'   => $submenu,
      'menu_id'   => $menu_id,
      'link'      => $link,
      'icon'      => $icon,
      'is_active' => $is_active,
    ], ['id' => $id]);
    
    echo('true');
  }
  
  function delete($id)
  {
    $this->db->delete('submenu', ['id' => $id]);
  }

  function _pesan($html,$type)
  {
    $data = [
      'html'  => $html,
      'type'  => $type
    ];
    
    $this->session->set_flashdata($data);
  }
}