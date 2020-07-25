<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('iklan_model');
		$this->load->helper('content');
		$this->load->library('esg');
	}
	public function index()
	{
		$this->home_model->home();
		$this->load->view('index');
	}

	public function list()
	{
		$this->esg->add_js(base_url('templates/iklanku/js/home.js'));
		$this->load->view('index');
	}

	public function detail($id = 0)
	{
		$this->esg->add_css(base_url('templates/iklanku/css/detail.css'));
		$this->db->where('id', $id);
		$this->db->set('views', 'views+1', FALSE);
		$this->db->update('iklan');
		$data = $this->db->query('SELECT * FROM iklan WHERE id = ? ',$id)->row_array();
		$status  = $this->iklan_model->status();
		$dimensi = $this->iklan_model->dimensi();
		$light   = $this->iklan_model->light();
		$this->load->view('index',['data'=>$data,'status'=>$status,'dimensi'=>$dimensi,'light'=>$light]);
	}

	public function login()
	{
		$this->load->view('index');
	}

	public function sign_up()
	{
		$this->load->view('index');
	}

	public function e()
	{
		$this->load->view('error');
	}
}