<?php

function get_user()
{
  $ci = get_instance();
  $username = $ci->session->userdata('username');
  return $ci->db->get_where('user', ['username' => $username])->row_array();
}

function get_menu()
{
  $ci = get_instance();
  $role_id = $ci->session->userdata('role_id');
  
  $ci->db->select('menu.id,menu');
  $ci->db->from('menu');
  $ci->db->join('hak_akses', 'hak_akses.menu_id = menu.id');
  $ci->db->where('hak_akses.role_id', $role_id);
  $ci->db->where('menu.is_active', 1);
  $ci->db->order_by('menu','ASC');
  return $ci->db->get()->result_array();
}

function get_submenu($menu_id)
{
  $ci = get_instance();
  
  $ci->db->order_by('submenu','ASC');
  $ci->db->where('is_active', 1);
  $ci->db->where('menu_id', $menu_id);
  return $ci->db->get('submenu')->result_array();
}

function get_breadcrumb($title)
{
  $ci = get_instance();
  $ci->db->select('submenu.menu_id, menu.menu');
  $ci->db->from('submenu');
  $ci->db->join('menu', 'menu.id = submenu.menu_id');
  $ci->db->where('submenu', $title);
  $menu = $ci->db->get()->row_array();
  
  return $menu = $menu['menu'];
}







