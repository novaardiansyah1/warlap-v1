<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('M_lapor', 'Lapor');
  }
  
  public function index ()
  {
    $data = [
      'title'      => 'profile',
      'post_title' => 'perbarui profile saya',
      'laporan'    => $this->Lapor->get_nums(),
      'script'     => 'profile/index.js'
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/topbar');
    $this->load->view('temp/sidebar');
    $this->load->view('profile/index');
    $this->load->view('temp/footer');
  }
  
  
  
  
  
  
  
}