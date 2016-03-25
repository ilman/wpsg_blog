<?php

/*----define constant----*/
define('SG_THEME_PATH', get_template_directory());
define('SG_THEME_URL', get_template_directory_uri());
define('SG_THEME_ID', basename(get_template_directory()));
// define('SG_THEME_OPTIONS', get_option(SG_THEME_ID));

$sg_theme_options = get_option(SG_THEME_ID);


/*----includes files----*/
require_once locate_template('vendor/autoload.php');
require_once locate_template('framework/helpers/wpsg_helpers.php');
require_once locate_template('framework/sg_wrapper/init.php');
require_once locate_template('framework/sg_admin/init.php');
require_once locate_template('framework/sg_menu/init.php');
require_once locate_template('framework/tgm_plugin/init.php');
require_once locate_template('framework/actions.php');
require_once locate_template('framework/filters.php');
require_once locate_template('front/framework/init.php');
require_once locate_template('front/framework/actions.php');
// require_once locate_template('front/framework/filters.php');


require_once locate_template('settings/tgm_plugins.php');
require_once locate_template('settings/theme_options.php');
require_once locate_template('settings/metaboxes.php');
// require_once locate_template('settings/taxonomies.php');
require_once locate_template('settings/plugins/sg_popular_posts/sg_popular_posts.php');
require_once locate_template('settings/plugins/sg_related_posts/sg_related_posts.php');
// require_once locate_template('settings/plugins/sg_user_avatar/sg_user_avatar.php');
sg_include_path('/settings/custom_post_types');	


sg_include_path('framework/template_tags');
// sg_include_path('front/framework/template_tags');
// require_once locate_template('framework/template_tags/sg_content_tags.php');
// require_once locate_template('framework/template_tags/sg_paginations.php');


// require_once locate_template('/admin/includes/sg_framework/sg_framework.php');			// Utility functions
// require_once locate_template('/admin/settings/helpers/helpers.php');
// require_once locate_template('/admin/settings/helpers/admin_helpers.php');			


// require_once locate_template('/settings/tgm_plugin.php');
// require_once locate_template('/settings/theme_options.php');	// Back-end functions
// require_once locate_template('/settings/shortcodes.php');	// Global custom shortcodes
// require_once locate_template('/settings/metaboxes.php');		// Global custom metaboxes


// require_once locate_template('/admin/settings/actions.php');			// Actions
// require_once locate_template('/admin/settings/filters.php');			// Filters
// require_once locate_template('/admin/settings/init.php');			// Filters


// sg_include_path('/admin/settings/custom_post_types');	// Custom post types
// sg_include_path('/admin/settings/metaboxes');			// Metaboxes

// sg_include_path('/settings/widgets');						// Widgets
// sg_include_path('/settings/template_tags');				// Template Tags
// sg_include_path('/settings/shortcodes');					// Shortcodes
// sg_include_path('/settings/metaboxes');					// Metaboxes
// sg_include_path('/settings/plugins');					   // Plugins

// sg_include_path('/front/settings');							// Custom files related to the theme

// /*---- define theme global variable ----*/