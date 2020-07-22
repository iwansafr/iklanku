<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('edit');

$form->setTable('iklan');

$form->addInput('jalan','text');
$form->addInput('kota','text');
$form->addInput('koordinat','hidden');
$form->addInput('map_image','file');
$form->setLabel('map_image','Gambar Map');
$form->setAccept('map_image','.jpg,.png,.gif');

$form->addInput('gallery','files');
$form->addInput('ukuran','text');
$form->setType('ukuran','number');

$form->addInput('dimensi','dropdown');
$form->setOptions('dimensi',['1'=>'Horizontal','2'=>'Vertical']);



$form->form();