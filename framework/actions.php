<?php 

function sg_content_pagination(){
	$pagination = sg_opt('pagination');
	if($pagination=='load_more'){
		sg_load_more();
	}
	elseif($pagination=='numbers'){
		sg_pagination();
	}
	else{
		sg_content_nav('nav-below');
	}
}
add_action('sg_content_footer','sg_content_pagination');