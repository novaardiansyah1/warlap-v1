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
    $this->load->view('submenu/modal');
    $this->load->view('submenu/index');
    $this->load->view('temp/footer');
  }
  
  private function cek_ajax()
  {
    if(!isset($_POST['submenu']))
    {
      redirect('submenu');
    }
  }
  
  public function create_action($where=null)
  {
    if($where == null)
    {
      $this->_proses('create_view','create_action');
    } else {
      $this->_rules();
      $this->form_validation->set_rules('submenu','submenu',
      'required|trim|min_length[3]|is_unique[submenu.submenu]');
      $this->form_validation->set_rules('link', 'link', 
      'required|trim|is_unique[submenu.link]|min_length[3]');
      
      if($this->form_validation->run() == false) {
        $this->create_view();
      } else {
        $this->Submenu->insert();
        redirect($where);
      }
    }
  }
  
  public function update_view($id)
  {
    $data = [
      'title'      => 'kelola submenu',
      'post_title' => 'kelola submenu sidebar',
      'submenu'    => $this->Submenu->get_by_id($id),
      'menu_data'  => $this->Menu->get_all(),
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('submenu/update_view');
    $this->load->view('temp/footer');
  }
  
  public function update_action($id, $where=null)
  {
    if($where == null)
    {
      $this->_proses('update_view','update_action', $id);
    } else {
      $this->_rules();
      $this->form_validation->set_rules('submenu','submenu',
      'required|trim|min_length[3]');
      $this->form_validation->set_rules('link', 'link', 
      'required|trim|min_length[3]');
      
      if($this->form_validation->run() == false) {
        $this->update_view($id);
      } else {
        $this->Submenu->update($id);
        redirect($where);
      }
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
    $this->form_validation->set_rules('menu_id', 'menu', 
    'required|trim');
    $this->form_validation->set_rules('icon', 'icon', 
    'required|trim|min_length[8]');
  }
  
  
}