<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Petugas extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    cek_akses();
    $this->load->model('M_lapor', 'Lapor');
  }
  
  public function index() 
  {
    $data = [
      'title'        => 'proses laporan',
      'post_title'   => 'kelola laporan masyrakat',
      'laporan_data' => $this->Lapor->get_all(),
      'script'       => 'user/index.js'
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('petugas/index');
    $this->load->view('temp/footer'); 
  }
  
  
}