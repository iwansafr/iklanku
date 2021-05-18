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
		$data = $this->media_model->digital_print();
		$produk = $this->media_model->digital_print_produk();
		$bahan = $this->media_model->digital_print_bahan();
		$finishing = $this->media_model->digital_print_finishing();
		if(!empty($data[$id]))
		{
			$data = $data[$id];
			$produk_tmp = [];
			foreach ($produk as $key => $value) {
				foreach($value['digi_ids'] as $dkey => $dvalue){
					if($dvalue == $id){
						$produk_tmp[$value['id']] = $value;
					}
				}
			}
			$produk = $produk_tmp;
			$bahan_tmp = [];
			foreach ($bahan as $key => $value) {
				foreach($value['digi_ids'] as $dkey => $dvalue){
					if($dvalue == $id){
						$bahan_tmp[$value['id']] = $value;
					}
				}
			}
			$bahan = $bahan_tmp;
			$finishing_tmp = [];
			foreach ($finishing as $key => $value) {
				foreach($value['digi_ids'] as $dkey => $dvalue){
					if($dvalue == $id){
						$finishing_tmp[$value['id']] = $value;
					}
				}
			}
			$finishing = $finishing_tmp;
		}
		$this->load->view('index',['data'=>$data,'produk'=>$produk,'bahan'=>$bahan,'finishing'=>$finishing]);
	}
}