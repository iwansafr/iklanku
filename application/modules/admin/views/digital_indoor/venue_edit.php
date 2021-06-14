<?php
$form = new Zea();
$form->init('edit');
$form->setId(@intval($_GET['id']));
$form->setTable('venue');
$form->addInput('title','text');
$form->setRequired('All');
$form->form();