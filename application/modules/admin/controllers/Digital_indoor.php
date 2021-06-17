<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_indoor extends CI_Controller
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
	public function venue(){
		$this->load->view('index');
	}
	public function clear_venue()
	{
		$this->load->view('digital_indoor/venue');
	}
	public function location($id = 0){
		$data = [];
		$data['data'] = $this->db->get_where('venue',['id'=>$id])->row_array();
		$this->load->view('index', $data);
	}
	public function clear_location($id = 0)
	{
		$data = [];
		$data['data'] = $this->db->get_where('venue',['id'=>$id])->row_array();
		$this->load->view('digital_indoor/location', $data);
	}
	public function pesanan()
	{
		$this->load->view('index');
	}
	public function clear_pesanan_indoor()
	{
		$this->load->view('digital_indoor/pesanan');
	}
	public function pesanan_detail()
	{
		$this->load->view('index');
	}
}