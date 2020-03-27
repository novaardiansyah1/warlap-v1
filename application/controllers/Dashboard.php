<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    cek_akses();
  }
  
  public function index() 
  {
    $data = [
      'title'        => 'dashboard',
      'post_title'   => 'selamat datang administrator',
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('dashboard/index');
    $this->load->view('temp/footer'); 
  }
  
  
  
  
  
  
  
  
}