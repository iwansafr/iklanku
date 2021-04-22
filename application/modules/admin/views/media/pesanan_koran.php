<?php

$form = new Zea();
$form->init('roll');
$form->search();
$form->setTable('order_koran');
$form->addInput('id','plaintext');
$form->setPlainText('id',[
	base_url('admin/pesanan_koran_detail?id={id}&kode={kode}') => 'Detail'
]);
$form->setLabel('id','Aksi');
$form->setNumbering(true);
$form->addInput('kode','plaintext');
$form->setUrl('admin/media/clear_pesanan_koran');
$form->form();