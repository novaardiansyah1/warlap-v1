<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Proses_laporan extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    cek_akses();
  }
  
  public function index()
  {
    $data = [
      'title'      => 'proses_laporan',
      'post_title' => 'proses laporan masyarakat',
      'script'     => 'proses_laporan/index.js'
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('proses_laporan/index');
    $this->load->view('temp/footer');
  }
  
}