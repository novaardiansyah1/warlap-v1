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
  
/*==============================
  get data role by id
  ==============================*/  
  function get_by_id($id)
  {
    $role = $this->db->get_where('role', ['id' => $id])->row();
    print(json_encode($role));
  }

/*============================
  cek ketersediaan role
  ============================*/
  function is_cr_role()
  {
    $role = htmlspecialchars($_POST['role']);
    $role = $this->db->get_where('role', ['role' => $role])->num_rows();
    
    if($role > 0)
    {
      print(false);
    } else {
      print(true);
    }
  }
  
/*============================ 
  proses membuat role baru
  ============================*/
  function create_role()
  {
    $role = htmlspecialchars($_POST['role']);
    $this->db->insert('role', ['role' => $role]);
    print(true);
  }
  
/*============================
  cek ketersediaan role
  ============================*/
  function is_up_role()
  {
    $id   = htmlspecialchars($_POST['id']);
    $role = htmlspecialchars($_POST['role']);
    
    $roleId   = $this->db->get_where('role', ['id' => $id])->row();
    $roleRole = $this->db->get_where('role', ['role' => $role])->row();
    
    if(!empty($roleRole->role)) {
      if($roleRole->role !== $roleId->role) {
        print(false);
      } else {
        print(true);
      }
    } else {
      print(true);
    }
  }  

/*============================
  proses tambah role
  ============================*/
  function update_role() 
  {
    $id   = htmlspecialchars($_POST['id']);
    $role = htmlspecialchars($_POST['role']);
    
    $roleId   = $this->db->get_where('role', ['id' => $id])->row();
    $roleRole = $this->db->get_where('role', ['role' => $role])->row();
    
    if(!empty($roleRole->role)) {
      if($roleRole->role !== $roleId->role) {
        print(false);
      } else {
        $this->proses_update($id, $role);
      }
    } else {
      $this->proses_update($id, $role);
    }
  }
  
  function proses_update($id, $role)
  {
    $this->db->update('role', ['role' => $role], 
    ['id' => $id]);
    print(true);
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
    } elseif($id == 2) {
      $this->_pesan('hak akses member tidak dapat dihapus!',
      'error');
    } else {
      // jika tidak terkait, hapus role
      $this->db->where('id', $id);
      $this->db->delete('role');
      
      // ubah role id user menjadi member jika terkait
      $this->db->set('role_id', 2)
               ->where('role_id', $id)
               ->update('user');
               
      $this->_pesan('berhasil menghapus hak akses.', 'success');
    }
  }  
  
  
}