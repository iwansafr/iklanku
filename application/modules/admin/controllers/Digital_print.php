<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Digital_print extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->db->cache_off();
		$this->load->model('esg_model');
		$this->load->model('admin_model');
		$this->load->model('admin_menu_model');
		$this->load->library('esg');
		$this->load->library('ZEA/zea');
		$this->esg_model->init();
	}

	public function kategori()
	{
		$navigation = $this->esg->get_esg('navigation');
		$navigation['array'] = ['Digital Print','kategori'];
		$this->esg->set_esg('navigation',$navigation);
		$this->load->view('index');
	}

	public function clear_kategori()
	{
		$this->load->view('admin/digital_print/kategori');
	}
	public function kategori_detail($id = 0)
	{
		$this->load->view('index',['id'=>$id]);
	}

	public function kategori_produk($id = 0)
	{
		$navigation = $this->esg->get_esg('navigation');
		$navigation['array'] = ['Digital Print','Kategori Produk'];
		$this->esg->set_esg('navigation',$navigation);
		$this->load->view('index',['id'=>$id,'kategori'=>$this->db->query('SELECT * FROM digital_print WHERE id = ?',$id)->row_array()]);
	}
	public function clear_kategori_produk($id = 0)
	{
		$this->load->view('admin/digital_print/kategori_produk',['id'=>$id,'kategori'=>$this->db->query('SELECT * FROM digital_print WHERE id = ?',$id)->row_array()]);
	}

	public function kategori_bahan($id = 0)
	{
		$navigation = $this->esg->get_esg('navigation');
		$navigation['array'] = ['Digital Print','Kategori Produk'];
		$this->esg->set_esg('navigation',$navigation);
		$this->load->view('index',['id'=>$id,'kategori'=>$this->db->query('SELECT * FROM digital_print WHERE id = ?',$id)->row_array()]);
	}
	public function clear_kategori_bahan($id = 0)
	{
		$this->load->view('admin/digital_print/kategori_bahan',['id'=>$id,'kategori'=>$this->db->query('SELECT * FROM digital_print WHERE id = ?',$id)->row_array()]);
	}
	public function pesanan()
	{
		$this->load->view('index');
	}
	public function pesanan_detail()
	{
		$data = $this->db->get_where('digital_print_order',['id'=>$this->input->get('id')])->row_array();
		$this->load->view('index', ['param'=>json_decode($data['param'],1),'data'=>$data]);
	}
}