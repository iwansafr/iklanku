<?php
$form = new Zea();
$form->init('param');
$form->setTable('config');
$form->setHeading('Harga Slot Digital Indoor');
$form->setParamName('harga_slot');
$form->addInput('eksklusif','text');
$form->setType('eksklusif','number');
$form->addInput('single_slot','text');
$form->setType('single_slot','number');
$form->addInput('multiple_slot','text');
$form->setType('multiple_slot','number');
$form->setRequired('All');
$form->setEnableDeleteParam(false);
$form->form();