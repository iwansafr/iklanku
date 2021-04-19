<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('home/media_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}
	public function edit($type = 'radio')
	{
		$label = $type;
		$type = $this->getType($type);
		$this->load->view('index',['type' => $type,'label'=>$label]);
	}
	public function list($type = 'radio')
	{
		$label = $type;
		$type = $this->getType($type);
		$this->load->view('index',['type' => $type,'label'=>$label]);
	}
	public function clear_list($type = 'radio')
	{
		$label = $type;
		$type = $this->getType($type);
		$this->load->view('media/list',['type' => $type,'label'=>$label]);
	}
	public function email_config()
	{
		$this->load->view('index');
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
	public function pesanan_radio()
	{
		$this->load->view('index');
	}
	public function clear_pesanan_radio()
	{
		$this->load->view('admin/media/pesanan_radio');
	}
	public function pesanan_radio_detail()
	{
		$data = $this->media_model->get_radio_order_detail($this->input->get('id'));
		$this->load->view('index',['data'=>$data]);
	}
}