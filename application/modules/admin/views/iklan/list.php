<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();

$form->init('roll');
$form->setTable('iklan');
$form->search();

$form->setNumbering(true);
$form->addInput('id','plaintext');
$form->setLabel('id','action');
$form->setPlainText('id',[
	base_url('home/detail')=>'detail',
]);

$form->addInput('jalan','plaintext');

$form->addInput('kota','plaintext');
// $form->addInput('alamat','plaintext');
// $form->addInput('koordinat','plaintext');
// $form->setLabel('koordinat','link dari google map');
$form->addInput('map_image','thumbnail');
$form->setLabel('map_image','Gambar Map');

$form->addInput('panjang','plaintext');
$form->append('panjang',' Meter');
$form->addInput('lebar','plaintext');
$form->append('lebar',' Meter');

$form->addInput('dimensi','dropdown');
$form->setAttribute('dimensi','disabled');
$form->setOptions('dimensi',['1'=>'Horizontal','2'=>'Vertical']);

$form->addInput('light','dropdown');
$form->setAttribute('light','disabled');
$form->setOptions('light',['1'=>'BackLight','2'=>'FrontLight']);

$form->addInput('status','dropdown');
$form->setOptions('status',['Unavailable','Available']);

$form->setUrl('admin/iklan/clear_list');

$form->setEdit(true);
$form->setDelete(true);
$form->form();