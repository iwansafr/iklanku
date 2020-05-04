<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
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

	public function detail()
	{
		$this->esg->add_css(base_url('templates/iklanku/css/detail.css'));
		$this->load->view('index');
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