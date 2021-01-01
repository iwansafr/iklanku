<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
		$this->load->model('media_model');
		$this->load->helper('content');
		$this->load->library('esg');
		$this->load->library('ZEA/Zea');
	}
	public function getType($type)
	{
		if(!empty($type))
		{
			return match($type){
				'radio' => 1,
				'koran' => 2,
				default => 1,
			};
		}else{
			return 1;
		}
	}
	public function tipe($tipe = 'radio')
	{
		$tipe_id = $this->getType($tipe);
		$this->esg->add_css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		$this->esg->add_js(['https://code.jquery.com/ui/1.12.1/jquery-ui.js',base_url('templates/iklanku/js/media.js')]);
		$this->load->view('index',['label'=>$tipe,'data'=>$this->media_model->get_list($tipe_id),'full'=>1,'tipe_id'=>$tipe_id]);
	}

	public function json_list()
	{
		$tipe_id = 1;
		$output = ['data'=>$this->media_model->get_list($tipe_id)['data'],'q'=>$this->db->last_query()];
		echo json_encode($output);
	}
	public function json_kota()
	{
		$data = $this->db->query('SELECT kota FROM iklan GROUP BY kota ORDER BY kota ASC LIMIT 6')->result_array();
		if(!empty($data))
		{
			$output = [];
			foreach ($data as $key => $value) 
			{
				$output[] = $value['kota'];
			}
			echo json_encode($output);
		}
	}

	public function index()
	{
		$this->esg->add_css('//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
		$this->esg->add_js(['https://code.jquery.com/ui/1.12.1/jquery-ui.js',base_url('templates/iklanku/js/home.js')]);


		$data    = $this->media_model->get_list();
		$status  = $this->media_model->status();
		$ukuran  = $this->media_model->ukuran();
		$jenis  = $this->media_model->jenis();
		$dimensi = $this->media_model->dimensi();
		$light   = $this->media_model->light();

		$this->load->view('index',['data'=>$data,'ukuran'=>$ukuran,'jenis'=>$jenis,'status'=>$status,'dimensi'=>$dimensi,'light'=>$light,'full'=>1]);
	}
	public function media()
	{
		$this->load->view('index');
	}
	public function order($id = 0)
	{
		$this->esg->add_css(base_url('templates/iklanku/css/detail.css'));
		$data = $this->db->query('SELECT * FROM media WHERE id = ? ',$id)->row_array();
		if($data['tipe'] == 1){
			$this->media_model->send_sewa();
		}
		$jam_tayang = $this->session->userdata('jam_tayang');
		if(!empty($_POST['jam_tayang'])) 
		{
			$jam_tayang[$_POST['jam_tayang']] = $_POST['jam_tayang'];
			$this->session->set_userdata('jam_tayang', $jam_tayang);
		}
		if(!empty($_POST['del_jam_tayang'])) 
		{
			unset($jam_tayang[$_POST['del_jam_tayang']]);
			$this->session->set_userdata('jam_tayang', $jam_tayang);
		}
		$this->load->view('index',['data'=>$data,'jam_tayang'=>$this->session->userdata('jam_tayang')]);
	}
}