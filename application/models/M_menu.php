<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_menu extends CI_Model
{
  
  function get_all() 
  {
    return $this->db->get('menu')->result_array();
  }
  
  function get_by_id($id) 
  {
    return $this->db->get_where('menu', ['id' => $id])->row_array();
  }
  
  function insert()
  {
    $menu      = htmlspecialchars($this->input->post('menu',true));
    $is_active = htmlspecialchars($this->input->post('is_active',true));
    
    $this->db->insert('menu',[
      'menu' => $menu,
      'is_active' => $is_active,
    ]);
    
    $this->_pesan('menu baru berhasil ditambahkan!','success');
  }
  
  function update($id)
  {
    $menu      = htmlspecialchars($this->input->post('menu',true));
    $is_active = htmlspecialchars($this->input->post('is_active',true));
    
    $this->db->update('menu',[
      'menu'      => $menu,
      'is_active' => $is_active,
    ], ['id' => $id]);
    
    $this->_pesan('menu berhasil diperbarui!','success');
  }
  
  function delete($id)
  {
    $submenu = $this->db->get_where('submenu', ['menu_id', $id])->num_rows();
    if($submenu < 0)
    {
      // jika tidak ada submenu terkait
      $this->db->delete('menu',['id' => $id]);
      $this->_pesan('menu berhasil dihapus permanen!','success');
    } else {
      $this->_pesan('terdapat submenu terkait, menu ini tidak dapat dihapus!', 
      'error');
    }
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