<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_indoor extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('media_model');
		$this->load->model('iklan_model');
		$this->load->model('digital_indoor_model');
		$this->load->helper('content');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
		if(empty($_SESSION[base_url().'_logged_in']['username'])){
			redirect('home/login');
		}
	}
	public function index()
	{
		$data = [];
		$data['venue'] = $this->db->get('venue')->result_array();
		$this->esg->add_js(base_url('templates/iklanku/js/digital_indoor_index.js'));
		$this->load->view('index',$data);
	}
	public function getLocation($id = 0){
		$data = [];
		$data['data'] = $this->db->get_where('venue_location', 'venue_ids LIKE "%,'.$id.',%"')->result_array();
		$output = ['data'=>$data['data'],'success'=>$data];
		echo json_encode($output);
	}
}