<?php

function wcms_lolcat($atts){
	return '<img src="http://thecatapi.com/api/images/get?format=src&type=gif">';
}
add_shortcode('lolcat', 'wcms_lolcat');
