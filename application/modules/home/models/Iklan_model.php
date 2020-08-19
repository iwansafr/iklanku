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
		pr($_POST);
	}
}