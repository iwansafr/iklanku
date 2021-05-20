<?php

$form = new Zea();
echo '<a class="btn btn-primary btn-sm" href="'.base_url('admin/digital_print/kategori').'"><-Back</a>';
$form->setId($id);
$form->setHeading('Detail');
$form->setEditStatus(false);
$form->init('edit');
$form->setTable('digital_print');
$form->addInput('title','text');
$form->setAttribute('title','disabled');
$form->addInput('description','text');
$form->setAttribute('description','disabled');
$form->setSave(false);
$form->form();