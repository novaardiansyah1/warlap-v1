<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_user extends CI_Model 
{
  
/*============================
  ambil 8 data user terbaru
  ============================*/  
  function get_limit()
  {
    return
    $this->db->limit(8)
             ->get('user')->result();
  }
  
/*============================
  ambil semua data user
  ============================*/
  function get_all()
  {
    $this->db->where('role_id', 2);
    return $this->db->get('user')->result();
  }
  
  function update($id)
  {
    $nama      = htmlspecialchars($this->input->post('nama', true));
    $username  = htmlspecialchars($this->input->post('username', true));
    $bio       = htmlspecialchars($this->input->post('bio', true));
    $email     = htmlspecialchars($this->input->post('email', true));
    $no_telp   = htmlspecialchars($this->input->post('no_telp', true));
    $tgl_lahir = htmlspecialchars($this->input->post('tgl_lahir', true));
    $jenkel    = htmlspecialchars($this->input->post('jenkel', true));
    $no_ktp    = htmlspecialchars($this->input->post('no_ktp', true));
    $website   = htmlspecialchars($this->input->post('website', true));
    $old_foto  = htmlspecialchars($this->input->post('old_foto', true));
    $foto      = $_FILES['foto']['name'];
      
    if($foto)
    {
      $config['upload_path']      = "./assets/owner/img/user/";
      $config['allowed_types']    = "png|jpg|jpeg";
      $config['max_size']         = 1024*2; //2mb
      $config['file_name']        = 'user_'.time();
      $config['file_ext_tolower'] = true;
      
      $this->load->library('upload', $config);
      
      if($this->upload->do_upload('foto'))
      {
        $foto = $this->upload->data('file_name');
        
        if ($old_foto !== 'default.jpg')
        {
          $target = './assets/owner/img/user/'.$old_foto;
          unlink($target);
        }
      } else {
        echo $this->upload->display_errors();
      }
    } else {
      $foto = $old_foto;
    }
    
    $data = [
      'nama'         => $nama,
      'username'     => $username,
      'bio'          => $bio,
      'foto'         => $foto,
      'email'        => $email,
      'no_telp'      => $no_telp,
      'tgl_lahir'    => $tgl_lahir,
      'jenkel'       => $jenkel,
      'no_ktp'       => $no_ktp,
      'website'      => $website,
    ];
    
    $this->db->update('user', $data, ['id' => $id]);
    $this->_pesan('berhasil memperbarui data profile anda','success');
  }

  function _pesan($html,$type)
  {
    $data = [
      'html'  => $html,
      'type'  => $type
    ];
    
    $this->session->set_flashdata($data);
  }
  
}