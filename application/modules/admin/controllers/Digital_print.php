<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_print extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('admin_menu_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}

	public function kategori()
	{
		$navigation = $this->esg->get_esg('navigation');
		$navigation['array'] = ['Digital Print','kategori'];
		$this->esg->set_esg('navigation',$navigation);
		$this->load->view('index');
	}

	public function clear_kategori()
	{
		$this->load->view('admin/digital_print/kategori');
	}
	public function kategori_detail($id = 0)
	{
		$this->load->view('index',['id'=>$id]);
	}
}