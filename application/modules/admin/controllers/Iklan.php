<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}
	public function edit()
	{
		$this->load->view('index');
	}
	public function list()
	{
		$this->load->view('index');
	}
	public function clear_list()
	{
		$this->load->view('iklan/list');
	}
	public function email_config()
	{
		$this->load->view('index');
	}
}