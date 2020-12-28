<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Media extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
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
}