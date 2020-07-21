<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('edit');

$form->setTable('iklan');

$form->addInput('jalan','text');
$form->form();