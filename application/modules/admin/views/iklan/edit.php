<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
$form->setId($id);
$form->init('edit');

$form->setTable('iklan');

$form->addInput('jalan','text');
$form->addInput('kota','text');
$form->addInput('alamat','textarea');
$form->addInput('koordinat','text');
$form->setLabel('koordinat','link dari google map');
$form->addInput('map_image','file');
$form->setLabel('map_image','Gambar Map');
$form->setAccept('map_image','.jpg,.png,.gif');

$form->addInput('gallery','files');
$form->addInput('panjang','text');
$form->setType('panjang','number');
$form->addInput('lebar','text');
$form->setType('lebar','number');
$form->setAttribute('panjang',['placeholder'=>'meter']);
$form->setAttribute('lebar',['placeholder'=>'meter']);

$form->addInput('dimensi','dropdown');
$form->setOptions('dimensi',['1'=>'Horizontal','2'=>'Vertical']);

$form->addInput('light','dropdown');
$form->setOptions('light',['1'=>'BackLight','2'=>'FrontLight']);

$form->addInput('status','dropdown');
$form->setOptions('status',['Unavailable','Available']);

$form->form();