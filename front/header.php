<!DOCTYPE HTML>
<!--[if IE 7 ]><html class="ie ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8 ]><html class="ie ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 9 ]><html class="ie ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>><!--<![endif]-->
<head>

<!-- ****basic page needs**** -->
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title><?php wp_title('|', true, 'right'); ?></title>
<link rel="shortcut icon" href="<?php echo sg_opt('favicon') ?>" />

<!-- ****responsive viewport**** -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- ****wordpress enqueue**** -->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>



<!-- Navbar -->
<div class="navbar" id="navbar-main">
	<div class="navbar-inner">
		<a class="btn btn-navbar" data-toggle="collapse" data-target="#nav-collapse-main">
			<i class="fa fa-bars"></i>
		</a>
		<div class="nav-collapse navbar-collapse collapse" id="nav-collapse-main">
			<?php 
             	wp_nav_menu( 
             		array( 
             			'theme_location' => 'primary', 
             			'container' => false,
             			'menu_class' => 'nav navbar-nav',
             			'walker' => new SG_Walker_Menu(),
                        'fallback_cb'  => array('SG_Walker_Menu', 'no_menu_cb'),
             		) 
             	);
			?>
		</div>
	</div>
</div>
<!-- end navbar -->