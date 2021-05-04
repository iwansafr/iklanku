<?php

$tipe = ['1'=>'Posting','2'=>'Fotografi','3'=>'Admin Handling','4'=>'Add On'];
$form = new Zea();
$form->setId(@intval($_GET['id']));
$form->init('edit');
$form->setTable('media_options');
$form->setHeading('Attribute');
$form->addInput('tipe','dropdown');
$form->removeNone('tipe');
$form->setOptions('tipe',$tipe);
$form->addInput('title','text');
$form->setRequired('All');
$form->form();

$roll = new Zea();
$roll->init('roll');
$roll->setTable('media_options');
$roll->addInput('id','plaintext');
$roll->setLabel('id','Action');
$roll->setPlainText('id',[
	base_url('admin/media/attribute?id={id}') => 'Edit'
]);
$roll->addInput('tipe','dropdown');
$roll->setOptions('tipe', $tipe);
$roll->setAttribute('tipe','disabled');
$roll->addInput('title','plaintext');
$roll->setDelete(true);
// $roll->setEdit(true);
$roll->setUrl('admin/media/clear_attribute');
// $roll->setDataTable(true);
$roll->form();
