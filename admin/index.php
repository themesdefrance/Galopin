<?php
$form = new Cocorico(GALOPIN_COCORICO_PREFIX);

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
					 'name'=>'masonry',
					 'options'=>array(
					 	'default'=>false
					 ),
					 'label'=>__("Masonry", 'galopin'),
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
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'footer_left',
					 'label'=>__("Footer", 'galopin'),
					 'description'=>__('Left footer content. The following HTML tags are allowed : &lt;a href=&quot;LINK&quot;&gt;TEXT_LINK&lt;/a&gt;, &lt;strong&gt;BOLD_TEXT&lt;/strong&gt;, &lt;em&gt;ITALIC_TEXT&lt;/em&gt;, &lt;img src=&quot;IMAGE_URL&quot;&gt;.', 'etendard'),
					 'options'=>array(
					 	'default'=>__('<strong>2014</strong> - Galopin by <a href="https://www.themesdefrance.fr/" target="_blank">Themes de France</a>', 'galopin')
					 	)
					 ));

$form->endForm();
$form->endWrapper('tab');

$form->component('submit', 'submit', array('value'=>__('Save changes', 'etendard')));

$form->render();