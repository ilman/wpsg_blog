<?php if ( have_posts() ): ?>
	<?php include(sg_view_path('framework/templates/'.$sg_wrapper['theme_layout'].'.php')); ?>
<?php else: ?>
	<?php get_template_part( 'no-result', 'index' ); ?>
<?php endif; ?>