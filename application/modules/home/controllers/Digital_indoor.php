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
	public function form_order()
	{
		$this->load->view('index');
	}
	public function confirmation_order()
	{
		$config = [];
		$config['config'] = $this->esg->get_config('harga_slot');
		$config['venue'] = $this->db->get_where('venue',['id'=>$this->input->get('venue_id')])->row_array();
		$this->db->select('id,location');
		$this->db->from('venue_location');
		$config['venue_location'] = $this->db->where_in('id',$this->input->get('lokasi'))->get()->result_array();
		$this->load->view('index',$config);
	}
	public function send_order()
	{
		if (!empty($_POST)) {
			$data = $_POST;
			$mail_to = [
				'admin@billboardku',
				'finance@billboardku',
				'digi.envi@billboardku',
				'iwansafr@gmail.com'
			];
			// $mail_to = 'iwansafr@gmail.com';
			$this->db->select('id,location');
			$this->db->from('venue_location');
			$location = $this->db->where_in('id',$this->input->get('lokasi'))->get()->result_array();
			$location_names = '';
			foreach ($location as $key => $value) {
				$location_names .= $value['location'].' ';
			}
			$param = [
				'nama user' => $data['username'],
				'no hp' => $data['hp'],
				'nama lokasi' => $location_names,
				'jenis sewa' => $data['jenis_sewa'],
				'jumlah slot' => $data['slot'],
				'mulai tayang' => $data['mulai_tayang'],
				'durasi' => $data['durasi'].' '.$data['masa_tayang'],
				'biaya' => $data['biaya']
			];
			$data['lokasi'] = implode(',',$data['lokasi']);
			$data['venue_location_ids'] = $data['lokasi'];
			unset($data['lokasi']);
			unset($data['username']);
			unset($data['hp']);
			unset($data['nama']);
			$data['param'] = json_encode($param);
			if($this->db->insert('digital_indoor_order',$data)){
				$last_id = $this->db->insert_id();
				$this->iklan_model->send_email($param,$mail_to);
				header('location: '.base_url('home/digital_indoor/payment/'.$last_id));
			}
		}
	}
	public function payment($id = 0)
	{
		$data = [];
		$data['data'] = $this->db->get_where('digital_indoor_order',['id'=>$id])->row_array();
		$this->load->view('index', $data);
	}
	public function pesanan()
	{
		$data = [];
		$this->db->select('digital_indoor_order.*,venue.title AS venue');
		$this->db->join('venue','digital_indoor_order.venue_id = venue.id');
		$this->db->order_by('id','DESC');
		$data['data'] = $this->db->get_where('digital_indoor_order',['user_id'=>$this->session->userdata(base_url('_logged_in'))['id']])->result_array();
		$this->load->view('index',$data);
	}
	public function pesanan_detail($id = 0)
	{
		$data = [];
		$this->db->select('digital_indoor_order.*,venue.title AS venue');
		$this->db->join('venue','digital_indoor_order.venue_id = venue.id');
		$data['data'] = $this->db->get_where('digital_indoor_order',['digital_indoor_order.id'=>$id])->row_array();
		$data['param'] = json_decode($data['data']['param'], 1);
		$this->load->view('index', $data);
	}
}