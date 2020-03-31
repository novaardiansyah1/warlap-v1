<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    cek_akses();
    $this->load->model('M_submenu', 'Submenu');
    $this->load->model('M_menu', 'Menu');
  }
  
  public function index()
  {
    $data = [
      'title'        => 'kelola submenu',
      'post_title'   => 'kelola submenu sidebar',
      'submenu_data' => $this->Submenu->get_all(),
      'menu_data'    => $this->Menu->get_all(),
      'script'       => 'submenu/index.js'
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('submenu/index');
    $this->load->view('submenu/modal');
    $this->load->view('temp/footer');
  }
  
  public function create() 
  {
    $this->cek_ajax();
    $this->_rules();
    $this->form_validation->set_rules('submenu','submenu',
    'required|trim|min_length[3]|max_length[20]|is_unique[submenu.submenu]');
    $this->form_validation->set_rules('link', 'link', 
    'required|trim|is_unique[submenu.link]|min_length[3]|max_length[120]');
    
    if($this->form_validation->run() == false)
    {
      echo 'false';
    } else {
      $this->Submenu->create();
    }
  }
  
  public function is_submenu()
  {
    $this->cek_ajax();
    $this->Submenu->is_submenu();
  }
  
  public function is_link()
  {
    $this->cek_ajax();
    $this->Submenu->is_link();
  }
  
  public function is_up_submenu()
  {
    $this->cek_ajax();
    $this->Submenu->is_up_submenu();
  }
  
  public function get_by_id($id=null)
  {
    if($id == null) {
      redirect('submenu');
    } else {
      $this->Submenu->get_by_id($id);
    }
  }
  
  public function update() 
  {
    $this->cek_ajax();
    $this->_rules();
    $this->form_validation->set_rules('submenu','submenu',
    'required|trim|min_length[3]|max_length[20]');
    $this->form_validation->set_rules('link', 'link', 
    'required|trim|min_length[3]|max_length[120]');
    
    if($this->form_validation->run() == false)
    {
      echo 'false';
    } else {
      $this->Submenu->update();
    }
  }
  
  public function delete($id)
  {
    $this->Submenu->delete($id);
    redirect('submenu');
  }
  
  private function cek_ajax($id='', $submenu='')
  {
    if(!isset($_POST['id']) && !isset($_POST['submenu']))
    {
      redirect('submenu');
    }
  }
  
  private function _rules()
  {
    $this->form_validation->set_rules('menu_id', 'menu', 
    'required|trim');
    $this->form_validation->set_rules('icon', 'icon', 
    'required|trim|min_length[8]|max_length[30]');
  }
  
}