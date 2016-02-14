<!-- start comment list -->
<?php if (have_comments()) : ?>
<section id="comments">
	<blockquote>
		<?php printf(_n('One Response to &ldquo;%2$s&rdquo;', '%1$s Responses to &ldquo;%2$s&rdquo;', get_comments_number(), SG_THEME_ID), number_format_i18n(get_comments_number()), get_the_title()); ?>
	</blockquote>


	<ol class="comment-list list-unstyled">
		<?php wp_list_comments(array('callback' => 'sg_list_comments_cb')); ?>
	</ol>
	
	
	<?php if (get_comment_pages_count() > 1 && get_option('page_comments')): ?>
		<nav id="comments-nav" class="pager">
			<div class="previous">
				<?php previous_comments_link(__('&larr; Older comments', SG_THEME_ID)); ?>
			</div>
			<div class="next">
				<?php next_comments_link(__('Newer comments &rarr;', SG_THEME_ID)); ?>
			</div>
		</nav>
	<?php endif; ?>
	
	
	<?php if (!comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')): ?>
		<div class="alert alert-info fade in"> <a class="close" data-dismiss="alert">&times;</a>
			<p>
				<?php sg_e('Comments are closed.'); ?>
			</p>
		</div>
	<?php endif; ?>
</section>
<!-- /#comments -->
<?php endif; ?>



<?php if (!have_comments() && !comments_open() && !is_page() && post_type_supports(get_post_type(), 'comments')) : ?>
	<section id="comments">
		<div class="alert alert-info fade in"> <a class="close" data-dismiss="alert">&times;</a>
			<p>
				<?php _e('Comments are closed.', SG_THEME_ID); ?>
			</p>
		</div>
	</section>
	<!-- comments -->
<?php endif; ?>