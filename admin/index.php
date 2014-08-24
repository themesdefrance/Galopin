<?php
$form = new Cocorico(ETENDARD_COCORICO_PREFIX);

$form->startWrapper('titre');
$form->component('raw', __('Etendard Options', 'etendard'));
$form->endWrapper('titre');

$form->groupHeader(array('general'=>__('General', 'etendard')));

//Tab general
$form->startWrapper('tab', 'general');

$form->startForm();

$form->setting(array('type'=>'boolean',
					 'name'=>'show_sidebar',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'label'=>__("Sidebar", 'galopin'),
					 'description'=>__("", 'galopin')));
					 
$form->setting(array('type'=>'boolean',
					 'name'=>'show_masonry',
					 'options'=>array(
					 	'default'=>false
					 ),
					 'label'=>__("Maosnry", 'galopin'),
					 'description'=>__("", 'galopin')));
					 
$form->setting(array('type'=>'boolean',
					 'name'=>'use_hero',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'label'=>__("Fullpage hero", 'galopin'),
					 'description'=>__("", 'galopin')));
					 
$form->setting(array('type'=>'color',
					 'name'=>'color',
					 'options'=>array(
					 	'default'=>'#E54C3C'
					 ),
					 'label'=>__("Main color", 'galopin'),
					 'description'=>__("", 'galopin')));
					 
$form->setting(array('type'=>'upload',
					 'name'=>'hero_image',
					 'label'=>__('Hero image', 'galopin'),
					 'description'=>__('', 'galopin')));

$form->endForm();
$form->endWrapper('tab');

$form->component('submit', 'submit', array('value'=>__('Save changes', 'etendard')));

$form->render();