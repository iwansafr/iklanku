<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('iklan_model');
		$this->load->helper('content');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
	}

	public function json_list()
	{
		$data    = $this->iklan_model->get_list();
		$status  = $this->iklan_model->status();
		$dimensi = $this->iklan_model->dimensi();
		$light   = $this->iklan_model->light();
		$output = ['data'=>$data['data'],'status'=>$status,'dimensi'=>$dimensi,'light'=>$light];
		echo json_encode($output);
	}

	public function index()
	{
		$this->esg->add_js(base_url('templates/iklanku/js/home.js'));


		$data    = $this->iklan_model->get_list();
		$status  = $this->iklan_model->status();
		$dimensi = $this->iklan_model->dimensi();
		$light   = $this->iklan_model->light();

		$this->load->view('index',['data'=>$data,'status'=>$status,'dimensi'=>$dimensi,'light'=>$light,'full'=>1]);
	}
}