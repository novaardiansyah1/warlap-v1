<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller 
{
	public function index()
	{
	  $data = [
	    'title' => 'selamat datang di warlap',
	  ];
	  
		$this->load->view('home/temp/header', $data);
		$this->load->view('home/temp/navbar');
		$this->load->view('home/temp/about');
		$this->load->view('home/temp/features');
		$this->load->view('home/temp/amount');
		$this->load->view('home/temp/news');
		$this->load->view('home/index');
		$this->load->view('home/temp/footer');
	}
}