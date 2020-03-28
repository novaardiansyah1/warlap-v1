<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
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
      'title'           => 'dashboard',
      'post_title'      => 'selamat datang administrator',
      'user_data'       => $this->User->get_limit(),
      'request_laporan' => $this->Lapor->count_request(), 
      'laporan_selesai' => $this->Lapor->count_finish(), 
      'user_admin'      => $this->User->count_admin(),
      'user_user'       => $this->User->count_user(),
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('dashboard/index');
    $this->load->view('temp/footer'); 
  }
}