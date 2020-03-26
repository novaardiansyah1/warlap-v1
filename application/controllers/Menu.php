<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller 
{
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_menu', 'Menu');
  }
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
  public function index()
  {
    $data = [
      'title'      => 'kelola menu',
      'post_title' => 'kelola menu sidebar',
      'menu_data'  => $this->Menu->get_all(),
      'script'     => 'menu/index.js'
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/sidebar');
    $this->load->view('temp/topbar');
    $this->load->view('Menu/index');
    $this->load->view('Menu/modal');
    $this->load->view('temp/footer');
  }
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  
  public function is_cr_menu()
  {
    $this->cek_ajax();
    $this->Menu->is_cr_menu();
  }
  
  public function create() 
  {
    $this->cek_ajax();
    $this->form_validation->set_rules('menu','menu',
    'required|trim|min_length[3]|max_length[20]');
    
    if($this->form_validation->run() == false) {
      echo('false');
    } else {
      $this->Menu->create();
    }
  }
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  


/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  
  public function delete($id)
  {
    $this->Menu->delete($id);
    redirect('menu');
  }
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  
  
  
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/  
  // cek request ajax 
  private function cek_ajax()
  {
    if(!isset($_POST['id']) && !isset($_POST['menu']))
    {
      redirect('menu');
    }
  }
/*+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====+++++=====*/
  
}