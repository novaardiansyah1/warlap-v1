<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_auth extends CI_Model {
  
  function login()
  {
    $username = htmlspecialchars($this->input->post('username', true));
    $password = htmlspecialchars($this->input->post('password', true));
    
    $user = $this->db->get_where('user', ['username' => $username])->row_array();
    
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
          echo 'admin';
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
  
  // register
  function register()
  {
    $nama     = htmlspecialchars($_POST['nama']);
    $email    = htmlspecialchars($_POST['email']);
    $username = htmlspecialchars($_POST['username']);
    $no_telp  = htmlspecialchars($_POST['no_telp']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    
    $data = [
      'nama'         => $nama,
      'username'     => $username,
      'password'     => $password,
      'bio'          => '',
      'foto'         => 'default.jpg',
      'email'        => $email,
      'no_telp'      => $no_telp,
      'tgl_lahir'    => '',
      'jenkel'       => 1,
      'no_ktp'       => '',
      'website'      => '',
      'role_id'      => 2,
      'is_active'    => 1,
      'date_created' => time()
    ];
    
    $this->db->insert('user', $data);
    echo('true');
  }
  
  // cek username
  function cek_username()
  {
    $username = $_POST['username'];
    $cek = $this->db->get_where('user',['username' => $username])->num_rows();
    echo($cek);
  }
  
  // cek email
  function cek_email()
  {
    $email = $_POST['email'];
    $cek = $this->db->get_where('user',['email' => $email])->num_rows();
    echo($cek);
  }
  
  // cek no telp
  function cek_no_telp()
  {
    $no_telp = $_POST['no_telp'];
    $cek     = $this->db->get_where('user', ['no_telp' => $no_telp])->num_rows();
    echo($cek);
  }
  
  function logout()
  {
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('role_id');
    $this->session->set_flashdata('pesan','selamat anda berhasil logout');
    redirect('home/index#report');
  }
  
}  