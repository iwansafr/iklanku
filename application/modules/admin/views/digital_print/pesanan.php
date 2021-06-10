<?php

$form = new Zea();
$form->init('roll');
$form->search();
$form->setTable('digital_print_order');
$form->addInput('id','plaintext');
$form->setPlainText('id',[
	base_url('admin/pesanan_digital_detail?id={id}&kode={kode}') => 'Detail'
]);
$form->setLabel('id','Aksi');
$form->setNumbering(true);
$form->addInput('kode','plaintext');
$form->setUrl('admin/digital_print/clear_pesanan_digital');
$form->form();