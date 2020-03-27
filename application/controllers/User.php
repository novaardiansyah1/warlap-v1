<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    cek_akses();
    $this->load->model('M_user', 'User');
  }
  
  public function index() 
  {
    $data = [
      'title'      => 'kelola user',
      'post_title' => 'kelola akun pengguna',
      'user_data'  => $this->User->get_all(),
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('user/index');
    $this->load->view('temp/footer'); 
  }
}