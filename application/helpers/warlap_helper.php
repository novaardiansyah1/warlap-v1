<?php

function get_user()
{
  $ci = get_instance();
  $username = $ci->session->userdata('username');
  return $ci->db->get_where('user', ['username' => $username])->row_array();
}



