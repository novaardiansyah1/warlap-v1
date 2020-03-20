<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_auth','Auth');
  }
  
  public function index()
  {
    $this->form_validation->set_rules('username','username',
    'required|trim|min_length[9]');
    $this->form_validation->set_rules('password','password',
    'required|trim|min_length[6]');
    
    if($this->form_validation->run() == false)
    {
      echo 'gagal login, mohon cek kembali akun anda.';
    } else {
      $this->Auth->login();
    }
  }
  
  public function logout()
  {
    $this->Auth->logout();
  }
  
}  