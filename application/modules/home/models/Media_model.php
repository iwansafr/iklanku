<?php

class Media_model extends CI_Model
{
	public function get_list($tipe = 1)
	{
		$form = new zea();
		$form->init('roll');
		$form->setTable('media');

		$where = '';
		if(!empty($_GET['nama']))
		{
			$where = ' nama LIKE "%'.$this->db->escape_like_str($_GET['nama']).'%"';
		}
		
		if(!empty($where))
		{
			$where .= ' AND tipe = '.$tipe;
		}else{
			$where = ' tipe = '.$tipe;
		}

		$form->setWhere($where);
		$form->addInput('id','plaintext');
		$form->addInput('nama','plaintext');
		$form->addInput('alamat','plaintext');
		$form->addInput('photo','plaintext');
		// $form->setLimit(2);
		return $form->getData();
	}
}