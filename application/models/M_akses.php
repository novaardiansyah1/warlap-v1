<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_akses extends CI_Model
{
  
/*============================
  ambil semua data role
  ============================*/
  function get_all_role() 
  {
    return $this->db->get('role')->result();
  }
  
/*============================
  hapus data role
  ============================*/
  function delete_role($id)
  {
    // cek apakah terdapat submenu terkait role
    $role    = $this->db->get_where('hak_akses', ['role_id' => $id])->row();
    $menu_id = $role->menu_id;
    $menu    = $this->db->get_where('submenu', ['menu_id' => $menu_id])->num_rows();
    
    if($menu > 0) {
      // jika terdapat submenu terkait
      $this->_pesan('terdapat submenu terkait, dilarang menghapus hak akses ini.',
      'error');
    } else {
      // jika tidak terkait, hapus role
      $this->db->where('id', $id);
      $this->db->delete('role');
      $this->_pesan('berhasil menghapus hak akses.', 'success');
    }
  }
  
/*============================
  pesan sweetalert
  ============================*/
  function _pesan($html,$type)
  {
    $data = [
      'html'  => $html,
      'type'  => $type
    ];
    
    $this->session->set_flashdata($data);
  }



  
  
  
  
}