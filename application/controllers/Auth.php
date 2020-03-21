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
  
  public function register()
  {
    $this->form_validation->set_rules('nama','nama lengkap',
    'required|trim|min_length[3]|max_length[120]');
    $this->form_validation->set_rules('username','username',
    'required|trim|min_length[9]|max_length[30]');
    $this->form_validation->set_rules('email','email',
    'required|trim|is_unique[user.email]|valid_emails|min_length[6]|max_length[60]');
    $this->form_validation->set_rules('no_telp','no. telepon',
    'required|trim|is_unique[user.no_telp]|min_length[10]|numeric');
    $this->form_validation->set_rules('password','password',
    'required|trim|matches[password1]|min_length[6]');
    $this->form_validation->set_rules('password1','password',
    'required|trim|matches[password]');
    
    if($this->form_validation->run() == false)
    {
      echo 'gagal registrasi, mohon cek kembali formulir pendaftaran anda.';
    } else {
      $this->Auth->register();
    }
  }
  
  public function logout()
  {
    $this->Auth->logout();
  }
  
  // cek username
  public function cek_username()
  {
    $this->Auth->cek_username();
  }
  
  // cek email
  public function cek_email()
  {
    $this->Auth->cek_email();
  }
  
  // cek no_telp
  public function cek_no_telp()
  {
    $this->Auth->cek_no_telp();
  }
  
  
  
}  