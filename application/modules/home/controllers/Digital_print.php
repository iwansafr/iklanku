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
		$data = $this->db->get_where('digital_print',['id'=>$id])->row_array();
		$produk = $this->db->query('SELECT * FROM digital_print_produk WHERE digi_ids LIKE "%,'.$data['id'].',%"')->result_array();
		$bahan = $this->db->query('SELECT * FROM digital_print_bahan WHERE digi_ids LIKE "%,'.$data['id'].',%"')->result_array();
		$finishing = $this->media_model->digital_print_finishing();

		$this->load->view('index',['data'=>$data,'produk'=>$produk,'bahan'=>$bahan,'finishing'=>$finishing]);
	}
	public function confirmation_order()
	{
		$data = [];
		$data['data'] = $this->db->get_where('digital_print',['id'=>$this->input->get('digital_print_id')])->row_array();
		$this->load->view('index', $data);
	}
}