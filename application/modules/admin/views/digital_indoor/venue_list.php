<?php
$list = new Zea();
$list->init('roll');
$list->setTable('venue');
$list->addInput('id','plaintext');
$list->setPlainText('id',[
	base_url('admin/digital_indoor/location/{id}') => 'Location'
]);
$list->setLabel('id','action');
$list->addInput('title','plaintext');
$list->setEdit(true);
$list->setDelete(true);
$list->setUrl('admin/digital_indoor/clear_venue');
$list->setEditLink(base_url('admin/digital_indoor/venue/?id='),'id');
$list->form();