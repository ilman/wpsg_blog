<div class="row sidebar-right content-wrapper">
	<div class="col-sm-8 content-main">
		<?php do_action('sg_content_header'); ?>
		
		<?php sg_get_template_part($sg_wrapper['content_base'], $sg_wrapper['content_layout']); ?>
		
		<?php do_action('sg_content_footer'); ?>
	</div>
	<!-- content main -->
	<aside class="col-sm-4 content-side">
		<?php dynamic_sidebar('primary-sidebar'); ?>
	</aside>
	<!-- content side -->
</div>
<!-- row -->