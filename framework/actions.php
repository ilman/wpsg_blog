<?php 

class SG_ThemeAction{

	public static function admin_head(){
		echo '<style type="text/css">'."\n";
		echo ".notice, .update-nag, .settings-error{ display:block !important; }";
		echo '<style type="text/css">'."\n";
	}

	public static function content_pagination(){
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
}

add_action('admin_head', array('SG_ThemeAction', 'admin_head'));
add_action('sg_content_footer', array('SG_ThemeAction', 'content_pagination'));
