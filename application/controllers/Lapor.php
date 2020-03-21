<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lapor extends CI_Controller 
{
  
  function __construct()
  {
    parent::__construct();
    $this->load->model('M_lapor','Lapor');
  }
  
  function index()
  {
    $this->form_validation->set_rules('kategori_id','kategori',
    'required|trim');
    $this->form_validation->set_rules('judul','judul',
    'required|trim|min_length[20]|max_length[100]');
    $this->form_validation->set_rules('laporan','laporan',
    'required|trim|min_length[50]|max_length[500]');
    
    if($this->form_validation->run() == false) {
      echo 'gagal mengirim laporan, mohon cek kembali formulir laporan anda.';
    } else {
      $this->Lapor->kirim_laporan();
    }
  }
  
}