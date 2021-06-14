<?php
$list = new Zea();
$list->init('roll');
$list->setTable('venue_location');
$list->setHeading('location '.$data['title']);
$list->setWhere('venue_ids LIKE "%,'.$data['id'].',%"');
$list->addInput('id','hidden');
$list->setLabel('id','action');
$list->addInput('location','plaintext');
$list->setEdit(true);
$list->setDelete(true);
$list->setUrl('admin/digital_indoor/clear_location/'.$data['id']);
$list->setEditLink(base_url('admin/digital_indoor/location/'.$data['id'].'/?id='),'id');
$list->form();