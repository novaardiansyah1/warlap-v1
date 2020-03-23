<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_menu', 'Menu');
    cek_login();
  }
  
  public function index()
  {
    $data = [
      'title'      => 'kelola menu',
      'post_title' => 'kelola menu sidebar',
      'menu_data'  => $this->Menu->get_all(),
    ];
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('Menu/index');
    $this->load->view('templates/footer');
  }
  
  public function create_view()
  {
    $data = [
      'title'      => 'kelola menu',
      'post_title' => 'kelola menu sidebar',
    ];
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('Menu/create_view');
    $this->load->view('templates/footer');
  }
  
  public function create_action($where=null)
  {
    if($where == null)
    {
      $this->_proses('create_view','create_action');
    } else {
      $this->form_validation->set_rules('menu','menu',
      'required|trim|min_length[3]|is_unique[menu.menu]');
      
      if($this->form_validation->run() == false) {
        $this->create_view();
      } else {
        $this->Menu->insert();
        redirect($where);
      }
    }
  }
  
  public function update_view($id)
  {
    $data = [
      'title'      => 'kelola menu',
      'post_title' => 'kelola menu sidebar',
      'menu'       => $this->Menu->get_by_id($id),
    ];
    
    $this->load->view('templates/header', $data);
    $this->load->view('templates/sidebar');
    $this->load->view('templates/topbar');
    $this->load->view('Menu/update_view');
    $this->load->view('templates/footer');
  }
  
  public function update_action($id, $where=null)
  {
    if($where == null)
    {
      $this->_proses('update_view','update_action', $id);
    } else {
      $this->form_validation->set_rules('menu','menu',
      'required|trim|min_length[3]');
      
      if($this->form_validation->run() == false) {
        $this->update_view($id);
      } else {
        $this->Menu->update($id);
        redirect($where);
      }
    }
  }
  
  public function delete($id)
  {
    $this->Menu->delete($id);
    redirect('menu');
  }
  
  private function _proses($view,$action,$id=null)
  {
    if ($id == null) 
    {
      if(isset($_POST['save'])) 
      {
        $where = 'menu/'.$view;
        $this->$action($where);
      } else {
        $this->$action('menu');
      }
    } else {
      if(isset($_POST['save'])) 
      {
        $where = 'menu/'.$view.'/'.$id;
        $this->$action($id,$where);
      } else {
        $this->$action($id,'menu');
      }
    }
  }
  
}