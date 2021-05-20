<?php
if (!empty($kategori)) {
	echo '<a class="btn btn-primary btn-sm" href="'.base_url('admin/digital_print/kategori_bahan/').$kategori['id'].'">New Bahan</a>';
	$form = new Zea();
	$form->init('edit');
	$form->setId($this->input->get('id'));
	$form->setTable('digital_print_bahan');
	$form->addInput('title','text');
	$form->addInput('harga','text');
	$form->setType('harga','number');
	$form->addInput('digi_ids','multiselect');
	$form->setLabel('digi_ids','Kategori');
	$form->setMultiSelect('digi_ids','digital_print','id,title');
	$form->setRequired('All');
	$form->form();

	$roll = new Zea();
	$roll->init('roll');
	$roll->setHeading('Bahan '.$kategori['title']);
	$roll->setWhere(' digi_ids LIKE "%,'.$kategori['id'].',%"');
	$roll->setTable('digital_print_bahan');
	$roll->addInput('id','hidden');
	$roll->addInput('title','plaintext');
	$roll->setUrl('admin/digital_print/clear_kategori_bahan/'.$kategori['id'].'/?id='.$this->input->get('id'));
	$roll->setEdit(true);
	$roll->setDelete(true);
	$roll->setEditLink(base_url('admin/digital_print/kategori_bahan/'.$kategori['id'].'/?id='),'id');
	$roll->form();
}else{
	msg('Halaman Tidak Valid','danger');
}