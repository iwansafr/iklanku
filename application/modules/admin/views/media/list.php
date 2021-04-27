<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('roll');

$form->setTable('media');

$form->setHeading($label);

$form->setWhere(' tipe = '.$type);
$form->addInput('id','plaintext');
$form->setLabel('id','Action');
$form->setPlainText('id',[
	base_url('admin/media/set_param/{id}') => 'Set Attribute',
]);
$form->addInput('nama','plaintext');
// $form->addInput('tipe','dropdown');
// $form->setOptions('tipe',[1=>'Radio',2=>'Koran',3=>'Sosmed']);
// $form->setAttribute('tipe','disabled');

// $form->addInput('tarif','plaintext');
// $form->setLabel('tarif','Tarif Periklan');
// $form->addInput('photo','thumbnail');
$form->setNumbering(true);
$form->setEdit(true);
$form->setDelete(true);
$form->setEditLink(base_url('admin/media/edit/'.$label.'/?id='),'id');
$form->setUrl('admin/media/clear_list/'.$label);

$form->form();