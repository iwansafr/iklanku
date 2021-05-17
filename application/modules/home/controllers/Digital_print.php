<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_print extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('media_model');
		$this->load->helper('content');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
		if(empty($_SESSION[base_url().'_logged_in']['username'])){
			redirect('home/login');
		}
	}
	public function index()
	{
		$menu = $this->media_model->digital_print();
		$this->load->view('index',['menu'=>$menu]);
	}

	public function form_order($id = 0)
	{
		$data = $this->media_model->digital_print();
		if(!empty($data[$id]))
		{
			$data = $data[$id];
		}
		$this->load->view('index',['data'=>$data]);
	}
}