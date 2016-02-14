<?php

/*----define constant----*/
define('SG_THEME_PATH', get_template_directory());
define('SG_THEME_URL', get_template_directory_uri());
define('SG_THEME_ID', basename(get_template_directory()));
define('SG_THEME_OPTIONS', get_option(SG_THEME_ID));


/*----includes files----*/
require_once locate_template('vendor/autoload.php');
require_once locate_template('framework/helpers/wpsg_helpers.php');
require_once locate_template('framework/sg_wrapper/init.php');
require_once locate_template('framework/actions.php');

sg_include_path('framework/template_tags');

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

// sg_include_path('/settings/custom_post_types');			// Custom post types
// sg_include_path('/settings/widgets');						// Widgets
// sg_include_path('/settings/template_tags');				// Template Tags
// sg_include_path('/settings/shortcodes');					// Shortcodes
// sg_include_path('/settings/metaboxes');					// Metaboxes
// sg_include_path('/settings/plugins');					   // Plugins

// sg_include_path('/front/settings');							// Custom files related to the theme

// /*---- define theme global variable ----*/