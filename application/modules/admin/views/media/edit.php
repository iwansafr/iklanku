<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$id = !empty($_GET['id']) ? intval($_GET['id']) : 0;
$form->setId($id);
$form->init('edit');

$form->setTable('media');

$form->setHeading($label);

$form->addInput('nama','text');
$form->addInput('tipe','static');
$form->setValue('tipe', $type);

$form->addInput('tarif','text');
$form->setType('tarif','number');
$form->setLabel('tarif','Tarif Periklan');
$form->addInput('photo','upload');
$form->setAccept('photo','.jpg,.jpeg,.png');
$form->setRequired(['nama']);

$form->form();