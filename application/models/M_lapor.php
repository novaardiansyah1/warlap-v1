<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_lapor extends CI_Model 
{
  
/*=============================
  get all data
  =============================*/
  function get_all()
  {
    $this->db->where('status', 'konfirmasi');
    return $this->db->get('laporan')->result();
  }
  
  function get_nums()
  {
    $user = get_user();
    $id   = $user['id'];
    
    return$this->db->get_where('laporan', ['user_id' => $id])->num_rows(); 
  }
  
/*=============================
  ambil data diproses
  =============================*/
  function count_request()
  {
    $this->db->where('status', 'proses');
    return $this->db->get('laporan')->num_rows();
  }
  
/*=============================
  ambil data diselesai
  =============================*/
  function count_finish()
  {
    $this->db->where('status', 'selesai');
    return $this->db->get('laporan')->num_rows();
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
      'lampiran'    => 'default.jpg',
      'status'      => 'proses'
    ]);
    
    echo 'true';
  }
}