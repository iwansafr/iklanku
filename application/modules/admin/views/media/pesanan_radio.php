<?php

$form = new Zea();
$form->init('roll');
$form->search();
$form->setTable('order_radio');
$form->addInput('id','plaintext');
$form->setPlainText('id',[
	base_url('admin/pesanan_radio_detail?id={id}&kode={kode}') => 'Detail'
]);
$form->setLabel('id','Aksi');
$form->setNumbering(true);
$form->addInput('kode','plaintext');
$form->setUrl('admin/media/clear_pesanan_radio');
$form->form();