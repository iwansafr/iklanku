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
		$form->addInput('panjang','plaintext');
		$form->addInput('lebar','plaintext');
		$form->addInput('light','plaintext');
		$form->addInput('status','plaintext');
		$form->setLimit(2);
		return $form->getData();
	}
}