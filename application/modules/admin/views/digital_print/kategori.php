<?php

$form = new Zea();
echo '<a class="btn btn-primary btn-sm" href="'.base_url('admin/digital_print/kategori').'">New Kategori</a>';
$form->setId($this->input->get('id'));
$form->init('edit');
$form->setTable('digital_print');
$form->addInput('title','text');
$form->addInput('description','textarea');
$form->addInput('harga_add','text');
$form->settype('harga_add', 'number');
$form->setAttribute('harga_add',['placeholder'=>'Kosongkan jika tidak perlu']);
$form->setLabel('harga_add','Harga Dengan Alat');
$form->addInput('harga_non_add','text');
$form->settype('harga_non_add', 'number');
$form->setLabel('harga_non_add','Harga Tanpa Alat');
$form->setAttribute('harga_non_add',['placeholder'=>'Kosongkan jika tidak perlu']);
$form->form();

$roll = new Zea();
$roll->init('roll');
$roll->setTable('digital_print');
$roll->addInput('id','plaintext');
$roll->setLabel('id','action');
$roll->setPlainText('id',[
	base_url('admin/digital_print/kategori_detail/{id}') => 'Detail',
	base_url('admin/digital_print/kategori_produk/{id}') => 'Produk',
	base_url('admin/digital_print/kategori_bahan/{id}') => 'Bahan'
]);
$roll->addInput('title','plaintext');
$roll->setDelete(true);
$roll->setEdit(true);
$roll->setEditLink(base_url('admin/digital_print/kategori?id='),'id');
$roll->setUrl('admin/digital_print/clear_kategori');
$roll->form();