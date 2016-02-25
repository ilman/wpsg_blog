<?php 

class SG_FrontSetup{
	static function setup()
	{
		//This theme use widget area
		register_sidebar(array(
			'name' => 'Primary Sidebar',
			'id' => 'primary_sidebar',
			'before_widget' => '<div id="widget-%1$s" class="widget panel %2$s">',
			'before_title' => '<div class="widget-heading panel-heading"><h4 class="widget-title panel-title">',
			'after_title' => '</h4></div><!-- widget-heading --><div class="widget-body panel-body">',
			'after_widget' => '</div><!-- widget body --></div><!-- widget -->',
		));

		register_sidebar(array(
			'name' => 'Secondary Sidebar',
			'id' => 'secondary_sidebar',
			'before_widget' => '<div id="widget-%1$s" class="widget panel %2$s">',
			'before_title' => '<div class="widget-heading panel-heading"><h4 class="widget-title panel-title">',
			'after_title' => '</h4></div><!-- widget-heading --><div class="widget-body panel-body">',
			'after_widget' => '</div><!-- widget body --></div><!-- widget -->',
		));
			
		//Add image size
		if ( function_exists( 'add_image_size' ) ) { 
			add_image_size( 'small', 50, 50, true );
		}
	}

	static function scripts() 
	{
		$css_cache_dir = wp_upload_dir();
		$css_cache_url = $css_cache_dir['baseurl'];
		$css_cache_path = $css_cache_dir['basedir'];
		
		$cache_file_url = $css_cache_url.'/style-cache.css';
		$cache_file_path = $css_cache_path.'/style-cache.css';
		$cache_mod_time = (file_exists($cache_file_path)) ? filemtime($cache_file_path) : 0;
		$cache_mod_time = date("Y-m-d-H:i:s", $cache_mod_time);
		
		$theme_file_url = get_template_directory_uri().'/front/assets/css/blog.css';
		$theme_file_path = TEMPLATEPATH.'/front/assets/css/blog.css';
		$theme_mod_time = (file_exists($theme_file_path)) ? filemtime($theme_file_path) : 0;
		$theme_mod_time = date("Y-m-d-H:i:s", $theme_mod_time);
		
		//wp_register_style( $handle, $src, $deps, $ver, $media );
		// wp_enqueue_style('style-bootstrap', get_template_directory_uri() . '/front/assets/css/bootstrap.css', array(), '', 'all' );
		wp_enqueue_style('theme-bootstrap', 'https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.css');
		wp_enqueue_style('theme-front', $theme_file_url, array(), $theme_mod_time, 'all' );
		wp_enqueue_style('theme-dynamic-css', $cache_file_url, array(), $cache_mod_time, 'all' );
		
		// wp_enqueue_style('bootstrap');
		// wp_enqueue_style('font-awesome');
		// wp_enqueue_style('style-theme');
		// wp_enqueue_style('style-choices');
		// wp_enqueue_style('jquery-isotope' );
		// wp_enqueue_style('theme-dynamic-css' );
		
		//wp_register_script( $handle, $src, $deps, $ver, $media );	
		wp_register_script('modernizr', 
			get_template_directory_uri() . '/front/assets/js/modernizr.min.js');

		wp_register_script('vendors', 
			get_template_directory_uri() . '/front/assets/js/vendors.min.js',
			array('jquery'),'1.0.0',true);

		wp_register_script('sg-shortcodes', 
			get_template_directory_uri() . '/front/assets/js/shortcodes.js', 
			array('jquery'),'1.0.0',true);

		wp_register_script('theme-js', 
			get_template_directory_uri() . '/front/assets/js/scripts.js', 
			array('vendors'),'',true);
		wp_enqueue_script('theme-js');
			
		
		if(is_singular() && comments_open() && get_option('thread_comments')){
			wp_enqueue_script('comment-reply');
		}
	}
}


add_action('after_setup_theme', array('SG_FrontSetup', 'setup'));
add_action('wp_enqueue_scripts', array('SG_FrontSetup', 'scripts'));  