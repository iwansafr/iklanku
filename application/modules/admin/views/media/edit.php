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
if($type==3){
	$form->setLabel('tarif','Tarif Periklan (untuk default 1 Bulan)');
	$form->setHelp('tarif','tarif untuk default 1 bulan dan dilipatkan untuk setiap paket bulan lainnya');
}
$form->addInput('photo','upload');
$form->setAccept('photo','.jpg,.jpeg,.png');
$form->addInput('alamat','textarea');
$form->setRequired(['nama']);

if(!empty($form->getData()))
{
	echo '<a class="btn btn-info btn-sm" href="'.base_url('admin/media/set_param/'.$id).'">Set Attribute</a>';
}
$form->form();