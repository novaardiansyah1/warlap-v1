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
    $this->load->view('Akses/modal');
    $this->load->view('temp/footer');
  }

/*==============================
  cek ketersediaan role
  ==============================*/  
  public function is_cr_role()
  {
    $this->_ajax_role();
    $this->Akses->is_cr_role();
  }

/*==============================
  membuat role baru
  ==============================*/  
  public function create_role() 
  {
    $this->_ajax_role();
    
    $this->form_validation->set_rules('role','role', 
    'required|trim|is_unique[role.role]|min_length[5]|max_length[30]');
    
    if($this->form_validation->run() == false)
    {
      print(false);
    } else {
      $this->Akses->create_role();
    }
  }
  
/*==============================
  cek ketersediaan role
  ==============================*/  
  public function is_up_role()
  {
    $this->_ajax_role();
    $this->Akses->is_up_role();
  }
  
/*==============================
  get data role by id
  ==============================*/  
  public function get_by_id($id=null)
  {
    $this->cek_id($id);
    $this->Akses->get_by_id($id);
  }
  
/*==============================
  perbarui data role
  ==============================*/  
  public function update_role()
  {
    $this->_ajax_role();
    
    $this->form_validation->set_rules('role','role', 
    'required|trim|min_length[5]|max_length[30]');
    
    if($this->form_validation->run() == false)
    {
      print(false);
    } else {
      $this->Akses->update_role();
    }
  }
  
/*==============================
  Menghapus data role
  ==============================*/  
  public function delete_role($id=null)
  {
    $this->cek_id($id);
    $this->Akses->delete_role($id);
    redirect('akses');
  }
  
/*==============================
  cek request ajax
  ==============================*/  
  private function _ajax_role()
  {
    if(!(isset($_POST['role']))) {
      redirect('akses');
    }
  }

/*==============================
  cek params $id
  ==============================*/  
  private function cek_id($id)
  {
    if($id == null)
    {
      redirect('akses');
    }
  }
  
  
  
  
  
  
  
  
  
  
  
  
  
}