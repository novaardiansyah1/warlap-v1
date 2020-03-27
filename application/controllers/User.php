<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    cek_akses();
    $this->load->model('M_user', 'User');
    $this->load->model('M_lapor', 'Lapor');
  }
  
  public function index() 
  {
    $data = [
      'title'      => 'kelola user',
      'post_title' => 'kelola akun pengguna',
      'user_data'  => $this->User->get_all(),
      'script'     => 'user/index.js'
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('user/index');
    $this->load->view('temp/footer'); 
  }
  
  public function detail($id)
  {
    $data = [
      'title'      => 'kelola user',
      'post_title' => 'kelola akun pengguna',
      'laporan'    => $this->Lapor->get_nums(),
      'user'       => $this->User->get_by_id($id)
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/topbar');
    $this->load->view('temp/sidebar');
    $this->load->view('user/detail');
    $this->load->view('temp/footer');
  }
  
}