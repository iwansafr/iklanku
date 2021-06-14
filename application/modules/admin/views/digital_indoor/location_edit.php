<?php
$form = new Zea();
$form->init('edit');
$form->setId(@intval($_GET['id']));
$form->setTable('venue_location');
$form->addInput('location','text');
$form->addInput('venue_ids','multiselect');
$form->setLabel('venue_ids','venue');
$form->setMultiSelect('venue_ids','venue','id,title');
$form->setRequired('All');
$form->form();