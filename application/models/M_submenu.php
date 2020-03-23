<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_submenu extends CI_Model
{
  // submenu clear
  function get_all() 
  {
    return $this->db->select('submenu.*, menu.menu')
                ->from('submenu')
                ->join('menu','menu.id = submenu.menu_id')
                ->get()->result_array();
  }
  
  function get_by_id($id) 
  {
    return $this->db->select('submenu.*, menu.menu')
                ->from('submenu')
                ->join('menu','menu.id = submenu.menu_id')
                ->where('submenu.id', $id)
                ->get()->row_array();
  }
  
  // validasi
  function is_submenu()
  {
    $submenu = htmlspecialchars($_POST['submenu']);
    $submenu = $this->db->get_where('submenu',['submenu' => $submenu])->num_rows();
    echo($submenu);
  }
  
  function insert()
  {
    $submenu   = htmlspecialchars($this->input->post('submenu',true));
    $menu_id   = htmlspecialchars($this->input->post('menu_id',true));
    $link      = htmlspecialchars($this->input->post('link',true));
    $icon      = htmlspecialchars($this->input->post('icon',true));
    $is_active = htmlspecialchars($this->input->post('is_active',true));
      
    $this->db->insert('submenu',[
      'submenu'   => $submenu,
      'menu_id'   => $menu_id,
      'link'      => $link,
      'icon'      => $icon,
      'is_active' => $is_active,
    ]);
    
    $this->_pesan('submenu baru berhasil ditambahkan!','success');
  }
  
  function update($id)
  {
    $submenu   = htmlspecialchars($this->input->post('submenu',true));
    $menu_id   = htmlspecialchars($this->input->post('menu_id',true));
    $link      = htmlspecialchars($this->input->post('link',true));
    $icon      = htmlspecialchars($this->input->post('icon',true));
    $is_active = htmlspecialchars($this->input->post('is_active',true));
    
    $this->db->update('submenu',[
      'submenu'   => $submenu,
      'menu_id'   => $menu_id,
      'link'      => $link,
      'icon'      => $icon,
      'is_active' => $is_active,
    ], ['id' => $id]);
    
    $this->_pesan('submenu berhasil diperbarui!','success');
  }
  
  function delete($id)
  {
    $this->db->delete('submenu',['id' => $id]);
    $this->_pesan('submenu berhasil dihapus permanen!','success');
  }
  
  function _pesan($html,$type,$title='')
  {
    $data = [
      'title' => $title,
      'html'  => $html,
      'type'  => $type
    ];
    
    $this->session->set_flashdata($data);
  }
  
  
  
}