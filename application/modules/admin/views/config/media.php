<?php defined('BASEPATH') OR exit('No direct script access allowed');

$form = new zea();
$form->init('param');
$form->setTable('config');
$form->setParamName('media_config');
$form->setHeading('media config radio dan koran');

$form->addInput('harga_iklan_radio','text');
$form->setLabel('harga_iklan_radio','harga default iklan radio');
$form->setType('harga_iklan_radio','number');
$form->addInput('harga_iklan_koran','text');
$form->setType('harga_iklan_koran','number');
$form->setLabel('harga_iklan_koran','harga default iklan koran');

$form->form();
