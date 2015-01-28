<?php

function galopinTitreWrapper($content){
	$output = '<h2 style="font-size: 23px;font-weight: 400;padding: 9px 15px 4px 0px;line-height: 29px;">';
	$output .= $content;
	$output .= '</h2>';
	return $output;
}
CocoDictionary::register(CocoDictionary::WRAPPER, 'titre', 'galopinTitreWrapper');

function galopinHeroColorFilter($value, $component){
	$lum = galopin_get_avg_luminance($value);
	if ($lum > 170) update_option('galopin_dark_hero', false);
	else update_option('galopin_dark_hero', true);
	return $value;
}
CocoDictionary::register(CocoDictionary::FILTER, 'hero_color', 'galopinHeroColorFilter');