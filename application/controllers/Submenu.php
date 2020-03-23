<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Submenu extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
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
  
  // validasi create submenu
  public function is_submenu()
  {
    $this->cek_ajax();
    $this->Submenu->is_submenu();
  }
  
  // validasi create link
  public function is_link()
  {
    $this->cek_ajax();
    $this->Submenu->is_link();
  }
  
  // cek request ajax 
  private function cek_ajax()
  {
    if(!isset($_POST['submenu']))
    {
      redirect('submenu');
    }
  }
  
  public function delete($id)
  {
    $this->Submenu->delete($id);
    redirect('submenu');
  }
  
  private function _proses($view,$action,$id=null)
  {
    if ($id == null) 
    {
      if(isset($_POST['save'])) 
      {
        $where = 'submenu/'.$view;
        $this->$action($where);
      } else {
        $this->$action('submenu');
      }
    } else {
      if(isset($_POST['save'])) 
      {
        $where = 'submenu/'.$view.'/'.$id;
        $this->$action($id,$where);
      } else {
        $this->$action($id,'submenu');
      }
    }
  }
  
  private function _rules()
  {
    $this->form_validation->set_rules('submenu','submenu',
    'required|trim|min_length[3]|max_length[20]|is_unique[submenu.submenu]');
    $this->form_validation->set_rules('menu_id', 'menu', 
    'required|trim');
    $this->form_validation->set_rules('link', 'link', 
    'required|trim|is_unique[submenu.link]|min_length[3]|max_length[120]');
    $this->form_validation->set_rules('icon', 'icon', 
    'required|trim|min_length[8]|max_length[30]');
  }
  
  
}