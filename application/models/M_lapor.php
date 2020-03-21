<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lapor extends CI_Model 
{
  function kirim_laporan()
  {
    $kategori = htmlspecialchars($_POST['kategori_id']);
    $judul    = htmlspecialchars($_POST['judul']);
    $laporan  = htmlspecialchars($_POST['laporan']);

    $this->db->insert('laporan', [
      'kategori_id' => $kategori,
      'judul'       => $judul,
      'laporan'     => $laporan,
      'lampiran'    => 'default.jpg'
    ]);
    
    echo 'true';
  }
}