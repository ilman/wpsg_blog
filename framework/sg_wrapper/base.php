<?php 

$sg_qid = get_queried_object_id();
$sg_wrapper_file = SG_Wrap::$main_template;
$sg_wrapper = array(
	'theme_layout' => get_post_meta($sg_qid, '_sg_theme_layout', true),
	'theme_section' => get_post_meta($sg_qid, '_sg_theme_section', true),
	'theme_section_class' => get_post_meta($sg_qid, '_sg_theme_section_class', true),
	'theme_container' => get_post_meta($sg_qid, '_sg_theme_container', true),
	'content_base' => '',
	'content_layout' => '',
	'file' => $sg_wrapper_file,
);



/*--- validate theme_layout ---*/
if(!$sg_wrapper['theme_layout']){
	$value = null;

	if(is_page()){
		$value = sg_opt('page_layout');
	}
	elseif(is_single()){
		$value = sg_opt('single_layout');
	}
	elseif(is_archive()){
		$value = sg_opt('archive_layout');
	}
	elseif(is_search()){
		$value = sg_opt('search_result_layout');
	}

	$sg_wrapper['theme_layout'] = ($value) ? $value : 'layout-side-right';
}


/*--- validate theme_section ---*/
if(!$sg_wrapper['theme_section']){
	$sg_wrapper['theme_section'] = sg_opt('theme_section', true);
}


/*--- validate theme_container ---*/
if(!$sg_wrapper['theme_container']){
	$sg_wrapper['theme_container'] = sg_opt('theme_container', true);
}


/*--- validate content_layout ---*/
if(!$sg_wrapper['content_layout']){
	$value = null;

	if(is_single()){
		$value = 'full';
	}
	elseif(is_author()){
		$value = sg_opt('author_content_layout');
	}
	elseif(is_archive()){
		$value = sg_opt('archive_content_layout');
	}
	elseif(is_search()){
		$value = sg_opt('search_content_layout');
	}

	$sg_wrapper['content_layout'] = ($value) ? $value : sg_opt('blog_post_layout', 'full');
}


/*--- dunno ---*/

if(is_page() || get_post_type()!='post'){
	$sg_wrapper['content_base'] = apply_filters('sg_content_base', 'framework/templates/page');
	$sg_wrapper['content_layout'] = apply_filters('sg_content_layout', 'single');
}
else{
	$sg_wrapper['content_base'] = apply_filters('sg_content_base', 'framework/templates/blog');
	$sg_wrapper['content_layout'] = apply_filters('sg_content_layout', $sg_wrapper['content_layout']);
}


do_action('add_debug_info', $sg_wrapper, '$sg_wrapper');


/*
	check if we should load blank preview template or normal html template
*/

if(sg_val($_GET,'preview')=='true'){
	// if loaded using url contain preview
	wp_dequeue_script('jquery');
	wp_deregister_script('jquery');
	add_filter('show_admin_bar', '__return_false');
	include('base-preview.php');
}
elseif(get_page_template_slug($sg_qid)){
	// if use select page template from wordpress
	include($sg_wrapper_file);
}
else{
	get_header();
	include('base-content.php');
	get_footer();
}