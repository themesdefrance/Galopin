<?php
$form = new Cocorico(GALOPIN_COCORICO_PREFIX);

$form->startWrapper('titre');
$form->component('raw', __('Galopin Settings', 'galopin'));
$form->endWrapper('titre');

$form->groupHeader(array('general'=>__('General', 'galopin'),
						 'appearance'=>__('Appearance', 'galopin')));

//Tab general
$form->startWrapper('tab', 'general');

$form->startForm();

$form->setting(array('type'=>'text',
					 'name'=>substr(EDD_SL_LICENSE_KEY, strlen(GALOPIN_COCORICO_PREFIX)),
					 'label'=>__("License", 'galopin'),
					 'description'=>__("Enter your licence key in order to receive Galopin updates. You'll find it in the confirmation email we sent you after your purchase.", 'galopin')));

$form->setting(array('type'=>'boolean',
					 'name'=>'use_hero',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'label'=>__('Fullscreen home header image', 'galopin'),
					 'description'=>__('Fill out the screen with the home header image.', 'galopin')));

$form->setting(array('type'=>'text',
					 'name'=>'hero_text',
					 'label'=>__('Header title', 'galopin'),
					 'description'=>__('Enter a title to display in the header (on each page of your website).', 'galopin')));
					 
$form->setting(array('type'=>'upload',
					 'name'=>'hero_logo',
					 'label'=>__('Header logo', 'galopin'),
					 'description'=>__('Upload a logo to display in the header (if uploaded, the logo will replace the header title).', 'galopin')));
					 
$form->setting(array('type'=>'upload',
					 'name'=>'hero_image',
					 'filters'=>array('hero_color'),
					 'label'=>__('Header image', 'galopin'),
					 'description'=>__('Upload an image to use as header on your website. Use a 1920x500 jpg/png file or more if you enabled the fullscreen home header image.', 'galopin')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'footer_left',
					 'label'=>__("Footer", 'galopin'),
					 'description'=>__('Left footer content. The following HTML tags are allowed : &lt;a href=&quot;LINK&quot;&gt;TEXT_LINK&lt;/a&gt;, &lt;strong&gt;BOLD_TEXT&lt;/strong&gt;, &lt;em&gt;ITALIC_TEXT&lt;/em&gt;, &lt;img src=&quot;IMAGE_URL&quot;&gt;.', 'galopin'),
					 'options'=>array(
					 	'default'=>sprintf(__('<strong>%s</strong> - Galopin by <a href="https://www.themesdefrance.fr/" target="_blank">Themes de France</a>', 'galopin'),date('Y'))
					 	)));


$form->endForm();
$form->endWrapper('tab');

$form->startWrapper('tab', 'appearance');

$form->startForm();

$form->setting(array('type'=>'color',
					 'name'=>'color',
					 'options'=>array(
					 	'default'=>'#E54C3C'
					 ),
					 'label'=>__("Main color", 'galopin'),
					 'description'=>__('This color will be used across your website for buttons, links, etc.', 'galopin')));

$form->setting(array('type'=>'boolean',
					 'name'=>'show_sidebar',
					 'options'=>array(
					 	'default'=>true
					 ),
					 'label'=>__("Sidebar", 'galopin'),
					 'description'=>__('Display a sidebar on the content\'s right across your website in all no-masonry pages.', 'galopin')));
					 
$form->setting(array('type'=>'boolean',
					 'name'=>'masonry',
					 'options'=>array(
					 	'default'=>false
					 ),
					 'label'=>__("Masonry", 'galopin'),
					 'description'=>__('Enables the masonry layout on the home page, categories, tags and archives pages.', 'galopin')));
					 
$form->setting(array('type'=>'textarea',
					 'name'=>'custom_css',
					 'label'=>__('Additionnal CSS', 'galopin'),
					 'description'=>__('CSS rules added in this field will be added to your site. If you have too many updates, you should download and install the child theme from <a href="https://www.themesdefrance.fr/" target="_blank">your Themes de France account</a>.', 'galopin')));

$form->endForm();

$form->endWrapper('tab');

$form->component('submit', 'submit', array('value'=>__('Save changes', 'galopin')));

$form->render();

?>

<div style="margin-top:20px;">

<?php _e('Any questions on Galopin ? Go to the','galopin'); ?> <a href="https://www.themesdefrance.fr/support/?utm_source=theme&utm_medium=supportlink&utm_campaign=galopin" target="_blank"><?php _e('Themes de France support page.','galopin'); ?></a> - <?php _e('If you like Galopin, you should','galopin'); ?>, <a href="https://www.facebook.com/ThemesDeFrance" target="_blank"><?php _e('follow us on Facebook','galopin'); ?></a>.

</div>