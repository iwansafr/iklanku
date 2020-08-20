<?php

class Iklan_model extends CI_Model
{
	public function status()
	{
		return ['Unavailable','Available'];
	}
	public function dimensi()
	{
		return ['1'=>'Horizontal','2'=>'Vertical'];
	}
	public function light()
	{
		return ['1'=>'BackLight','2'=>'FrontLight'];
	}
	public function ukuran()
	{
		return ['1'=>'1x2','2'=>'4x2','3'=>'4x6','4'=>'4x8','5'=>'5x10','6'=>'6x12','7'=>'8x16','8'=>'10x20'];
	}
	public function durasi()
	{
		return ['1'=>'1 Minggu','2'=>'2 Minggu','3'=>'3 Minggu','4'=>'1 Bulan','5'=>'3 Bulan','6'=>'6 Bulan','7'=>'1 Tahun'];
	}
	public function jenis()
	{
		return ['1'=>'Billboard','2'=>'Baliho','3'=>'Neon Box','4'=>'Videotron'];
	}
	public function get_list()
	{
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
		$form->addInput('jenis','plaintext');
		$form->addInput('ukuran','plaintext');
		$form->addInput('light','plaintext');
		$form->addInput('status','plaintext');
		// $form->setLimit(2);
		return $form->getData();
	}
	public function sign_up()
	{
		$data = $_POST;
		if(!empty($data))
		{
			$output = [];
			$this->db->select('id');
			$username = $this->db->get_where('user',['username'=>$data['username']])->row_array();
			$email = $this->db->get_where('user',['email'=>$data['email']])->row_array();
			if(!empty($username))
			{
				$output[] = ['status'=>false,'alert'=>'danger','msg'=>'username sudah ada, gunakan username lain'];
			}
			if(!empty($email))
			{
				$output[] = ['status'=>false,'alert'=>'danger','msg'=>'email sudah ada, gunakan email lain'];
			}
			if(empty($output))
			{
				if(empty($data['agency']))
				{
					$this->db->select('id');
					$user_role_id = $this->db->get_where('user_role',['title'=>'member'])->row_array();
				}else{
					$this->db->select('id');
					$user_role_id = $this->db->get_where('user_role',['title'=>'agency'])->row_array();
					unset($data['agency']);
				}
				$data['user_role_id'] = !empty($user_role_id['id']) ? $user_role_id['id'] : 0 ;
				if($this->db->insert('user',$data)){
					$this->esg->set_cookie($data);
					redirect(base_url('home/welcome'));
				}else{
					return ['status'=>false,'alert'=>'info','msg'=>'mohon maaf untuk saat ini sistem tidak bisa melakukan pendaftaran, silahkan coba beberapa saat lagi'];
				}
			}else{
				return $output;
			}
		}
	}
	public function login()
	{
		$data = $_POST;
		if(!empty($data))
		{
			$user = $this->db->get_where('user',['username'=>$data['username']])->row_array();
			if(empty($user)){
				$user = $this->db->get_where('user',['email'=>$data['username']])->row_array();
			}
			if(empty($user)){
				$output = ['msg'=>'akun tidak dikenali','status'=>false,'alert'=>'danger'];
			}else{
				if($user['password'] == $data['password']){
					$output = ['msg'=>'login success','status'=>true,'alert'=>'success'];
					$this->esg->set_cookie($user);
					redirect(base_url('home/iklan/media'));
				}else{
					$output = ['msg'=>'password anda salah','status'=>false,'alert'=>'danger'];
				}
			}
			return $output;
		}
	}
}