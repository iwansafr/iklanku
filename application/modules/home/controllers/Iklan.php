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
	public function index()
	{
		$this->esg->add_js(base_url('templates/iklanku/js/home.js'));

		$form = new zea();
		$form->init('roll');
		$form->setTable('iklan');

		$where = '';
		if(!empty($_GET['kota']))
		{
			$where = ' kota LIKE "%'.$this->db->escape_like_str($_GET['kota']).'%"';
		}
		if(!empty($_GET['jalan']))
		{
			$where .= !empty($where) ? ' AND jalan LIKE "%'.$this->db->escape_like_str($_GET['jalan']).'%"' : ' jalan LIKE "%'.$this->db->escape_like_str($_GET['jalan']).'%"';
		}

		$form->setWhere($where);
		$form->addInput('id','plaintext');
		$form->addInput('jalan','plaintext');
		$form->addInput('kota','plaintext');
		$form->addInput('map_image','plaintext');
		$form->addInput('dimensi','plaintext');
		$form->addInput('panjang','plaintext');
		$form->addInput('lebar','plaintext');
		$form->addInput('light','plaintext');
		$form->addInput('status','plaintext');

		$data    = $form->getData();
		$status  = $this->iklan_model->status();
		$dimensi = $this->iklan_model->dimensi();
		$light   = $this->iklan_model->light();

		$this->load->view('index',['data'=>$data,'status'=>$status,'dimensi'=>$dimensi,'light'=>$light]);
	}
}