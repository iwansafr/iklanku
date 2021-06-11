<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_print extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('media_model');
		$this->load->model('iklan_model');
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
		$data['produk'] = $this->db->get_where('digital_print_produk',['id'=>$this->input->get('produk')])->row_array();
		$data['bahan'] = $this->db->get_where('digital_print_bahan',['id'=>$this->input->get('bahan')])->row_array();
		$data['finishing'] = $this->media_model->digital_print_finishing();
		$this->load->view('index', $data);
	}
	public function send_order()
	{
		if (!empty($_POST)) {
			$data = $_POST;
			$mail_to = [
				'admin@billboardku',
				'finance@billboardku',
				'digi.envi@billboardku',
			];
			$mail_to = 'iwansafr@gmail.com';
			$this->db->select('username,phone');
			$user = $this->db->get_where('user',['id'=>$data['user_id']])->row_array();
			$this->db->select('title');
			$produk = $this->db->get_where('digital_print_produk',['id'=>$data['produk_id']])->row_array();
			$this->db->select('title');
			$bahan = $this->db->get_where('digital_print_bahan',['id'=>$data['bahan_id']])->row_array();
			$this->db->select('title');
			$menu = $this->db->get_where('digital_print',['id'=>$data['kat_id']])->row_array();
			$param = [
				'Nama User' => $user['username'],
				'No HP' => $user['phone'],
				'Bahan' => $bahan['title'],
				'Nama Menu' => $menu['title'],
				'Nama Produk' => $produk['title'],
				'Ukuran' => 'W = '.$data['width'].' - H = '.$data['height'],
				'Sisi' => @intval($data['sisi']).' Sisi',
				'Warna' => $data['warna'],
				'Flipped' => $data['flipped'],
				'Potong' => $data['potong'],
				'Add' => $data['add'],
				'Jumlah' => $data['jumlah'],
				'Biaya' => $data['biaya'],

			];
			$input = [];
			$input['kode'] = $data['kode'];
			$input['user_id'] = $data['user_id'];
			$input['produk_id'] = $data['produk_id'];
			$input['param'] = json_encode($param);
			if($this->db->insert('digital_print_order', $input)){
				$last_id = $this->db->insert_id();
				$this->iklan_model->send_email($param,$mail_to);
				header('location: '.base_url('home/digital_print/payment/'.$last_id));
			}
		}
	}
	public function payment($id = 0)
	{
		$data = [];
		$data['data'] = $this->db->get_where('digital_print_order',['id'=>$id])->row_array();
		$this->load->view('index', $data);
	}
	public function pesanan()
	{
		$data = [];
		$data['data'] = $this->db->get_where('digital_print_order',['user_id'=>$this->session->userdata(base_url('_logged_in'))['id']])->result_array();
		$this->load->view('index',$data);
	}
	public function pesanan_detail($id = 0)
	{
		$data = [];
		$data['data'] = $this->db->get_where('digital_print_order',['id'=>$id])->row_array();
		$data['param'] = json_decode($data['data']['param'], 1);
		$this->load->view('index', $data);
	}
}