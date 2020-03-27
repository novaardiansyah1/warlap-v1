<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    cek_akses();
    $this->load->model('M_lapor', 'Lapor');
    $this->load->model('M_user', 'User');
  }
  
  public function index ()
  {
    $data = [
      'title'      => 'profile',
      'post_title' => 'perbarui data profile',
      'laporan'    => $this->Lapor->get_nums(),
      'script'     => 'profile/index.js'
    ];
    
    $this->load->view('temp/header', $data);
    $this->load->view('temp/topbar');
    $this->load->view('temp/sidebar');
    $this->load->view('profile/index');
    $this->load->view('temp/footer');
  }
  
  public function update_action($id)
  {
    $this->rules_update();
    
    if($this->form_validation->run() == false)
    {
      $this->index();
    } else {
      $this->User->update($id);
      redirect('profile');
    }
  }
  
  private function rules_update()
  {
    $this->form_validation->set_rules('nama','nama lengkap',
    'required|trim|min_length[3]|max_length[120]');
    $this->form_validation->set_rules('bio','bio',
    'trim|max_length[70]');
    $this->form_validation->set_rules('no_ktp','no. ktp',
    'trim|max_length[16]');
    $this->form_validation->set_rules('website','website',
    'trim|max_length[20]');
  }
  
  
  
  
  
  
}