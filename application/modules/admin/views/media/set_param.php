<?php

$form = new Zea();
$form->init('param');
$form->setParamName('media_param');
$form->setId($id);
$form->set_param_field('param');
$form->setTable('media');
$form->addInput('desain_grafis','multiselect');
$form->setLabel('desain_grafis','Desain Grafis');
$form->setMultiSelect('desain_grafis','media_options','id,title','tipe = 1');
$form->addInput('fotografi','multiselect');
$form->setLabel('fotografi','Fotografi');
$form->setMultiSelect('fotografi','media_options','id,title','tipe = 2');
$form->addInput('posting','multiselect');
$form->setLabel('posting','Posting');
$form->setMultiSelect('posting','media_options','id,title','tipe = 1');
$form->addInput('admin_handling','multiselect');
$form->setLabel('admin_handling','Admin Handling');
$form->setMultiSelect('admin_handling','media_options','id,title','tipe = 3');
$form->addInput('add_on','multiselect');
$form->setLabel('add_on','Add On');
$form->setMultiSelect('add_on','media_options','id,title','tipe = 4');
$form->setEnableDeleteParam(false);

foreach ($media_options as $key => $value) {
	$form->addInput('total_'.$value['title'].'_'.$value['tipe'],'text');
	$form->setType('total_'.$value['title'].'_'.$value['tipe'],'number');
	$form->setLabel('total_'.$value['title'].'_'.$value['tipe'], 'Total '.$value['title'].' '.$tipe[$value['tipe']]);
}
foreach ($this->media_model->bulan() as $key => $value) {
	$title = str_replace(' ', '_', $value);
	$form->addInput('harga_'.$title,'text');
	$form->setType('harga_'.$title,'number');
	$form->setLabel('harga_'.$title, 'Harga paket '.$value);	
}
$form->addInput('x_post','text');
$form->setLabel('x_post','Post Perminggu (x)');
$form->setType('x_post','number');
if(!empty($form->getParam()))
{
	$form->form();
}else{
	msg('Maaf Link tidak valid','danger');
}