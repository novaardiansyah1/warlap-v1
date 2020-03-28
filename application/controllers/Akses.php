<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akses extends CI_Controller 
{

/*============================
  constructor
  ============================*/
  function __construct()
  {
    parent::__construct();
    cek_akses();
    $this->load->model('M_akses', 'Akses');
  }

  public function index()
  {
    $data = [
      'title'      => 'kelola akses',
      'post_title' => 'kelola hak akses user',
      'role_data'  => $this->Akses->get_all_role(),
      'script'     => 'akses/index.js'
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('Akses/index');
    $this->load->view('temp/footer');
  }
  
  public function delete_role($id=null)
  {
    $this->cek_id($id);
    $this->Akses->delete_role($id);
    redirect('akses');
  }
  
  private function cek_id($id)
  {
    if($id == null)
    {
      redirect('akses');
    }
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
}