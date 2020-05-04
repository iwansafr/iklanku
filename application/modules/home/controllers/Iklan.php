<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Iklan extends CI_Controller
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
		$this->esg->add_js(base_url('templates/iklanku/js/home.js'));
		$this->load->view('index');
	}
}