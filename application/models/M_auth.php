<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
  
  function login()
  {
    $username = htmlspecialchars($this->input->post('username', true));
    $password = htmlspecialchars($this->input->post('password', true));
    
    $user = $this->db->get_where('user',['username' => $username])->row_array();
    
    if($user)
    {
      // jika usernya ada
      $password = password_verify($password,$user['password']);
      if($password)
      {
        // jika passwordnya benar
        
        $data = [
          'username' => $user['username'],
          'role_id'  => $user['role_id']
        ];
          
        if($user['role_id'] == 1) {
          // jika admin
          $this->session->set_userdata($data);
          redirect('dashboard');
        } else {
          // jika member
          if($user['is_active'] == 0) {
            $this->_pesan('akun anda telah diblokir oleh admin karena melanggar 
            beberapa peraturan pelayanan, silahkan 
            hubungi admin atau buat akun baru untuk login kembali', 'error');
            redirect('auth'); 
          } else {
            $this->session->set_userdata($data);
            echo $user['id'];
          }
        }
      } else {
        // jika passwordnya salah
        echo 'gagal login, password yang anda masukkan salah.';
      }
    } else {
      // jika usernya tidak ada
      echo 'gagal login, username anda belum terdaftar.'; 
    }
  }
  
  function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    redirect('home/index#report');
  }
  
}  