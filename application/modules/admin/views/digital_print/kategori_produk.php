<?php
if (!empty($kategori)) {
	$form = new Zea();
	$form->init('edit');
	$form->setId($this->input->get('id'));
	$form->setTable('digital_print_produk');
	$form->addInput('title','text');
	$form->addInput('digi_ids','multiselect');
	$form->setLabel('digi_ids','Kategori');
	$form->setMultiSelect('digi_ids','digital_print','id,title');
	$form->setRequired('All');
	$form->form();

	$roll = new Zea();
	$roll->init('roll');
	$roll->setHeading('Produk '.$kategori['title']);
	$roll->setWhere(' digi_ids LIKE "%,'.$kategori['id'].',%"');
	$roll->setTable('digital_print_produk');
	$roll->addInput('id','hidden');
	$roll->addInput('title','plaintext');
	$roll->setUrl('admin/digital_print/clear_kategori_produk/'.$kategori['id'].'/?id='.$this->input->get('id'));
	$roll->form();
}else{
	msg('Halaman Tidak Valid','danger');
}