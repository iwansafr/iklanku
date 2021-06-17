<?php
$form = new Zea();
$form->init('roll');
$form->search();
$form->setTable('digital_indoor_order');
$form->addInput('id','plaintext');
$form->setPlainText('id',[
	base_url('admin/pesanan_indoor_detail?id={id}&kode={kode}') => 'Detail'
]);
$form->setLabel('id','Aksi');
$form->setNumbering(true);
$form->addInput('kode','plaintext');
$form->setUrl('admin/digital_indoor/clear_pesanan_indoor');
$form->form();