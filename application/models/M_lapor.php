<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lapor extends CI_Model 
{
  function get_nums()
  {
    $user = get_user();
    $id   = $user['id'];
    
    return$this->db->get_where('laporan', ['user_id' => $id])->num_rows(); 
  }
  
  function kirim_laporan()
  {
    $user_id  = htmlspecialchars($_POST['user_id']);
    $kategori = htmlspecialchars($_POST['kategori_id']);
    $judul    = htmlspecialchars($_POST['judul']);
    $laporan  = htmlspecialchars($_POST['laporan']);

    $this->db->insert('laporan', [
      'kategori_id' => $kategori,
      'user_id'     => $user_id,
      'judul'       => $judul,
      'laporan'     => $laporan,
      'lampiran'    => 'default.jpg'
    ]);
    
    echo 'true';
  }
}