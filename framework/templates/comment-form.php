<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="comment-form">
	<?php if(is_user_logged_in()): ?>
		<p class="alert alert-info">
			<?php printf(sg__('Logged in as <a href="%s/wp-admin/profile.php">%s</a>.'), get_option('siteurl'), $user_identity); ?> 
			<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="<?php sg__('Log out of this account'); ?>">
				<?php sg_e('Log out'); echo '&raquo;'; ?>
			</a>
		</p>
	<?php else : ?>
	
		<div class="row">
			<div class="col-sm-4">
				<div class="form-group">
					<label for="author">
						<?php 
							sg_e('Name');
							echo ' <small>('; sg_e('required'); echo ')</small>';
						?>
					</label>
					<input type="text" class="form-control" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if($req) echo "aria-required='true'"; ?>>
				</div>
			</div>
			<!-- col -->
			<div class="col-sm-4">
				<div class="form-group">
					<label for="email">
						<?php 
							sg_e('Email');
							echo ' <small>('; sg_e('required'); echo ')</small>';
						?>
					</label>
					<input type="email" class="form-control" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if($req) echo "aria-required='true'"; ?>>
				</div>
			</div>
			<!-- col -->
			<div class="col-sm-4">
				<div class="form-group">
					<label for="url">
						<?php sg_e('Website'); ?>
					</label>
					<input type="url" class="form-control" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3">
				</div>
			</div>
			<!-- col -->
		</div>
		<!-- row -->
	<?php endif; ?>
	<div class="form-group">
		<label for="comment">
			<?php sg_e('Comment'); ?>
		</label>
		<textarea name="comment" id="comment" class="form-control" rows="6" tabindex="4"></textarea>
	</div>
	<div class="form-group">
		<button name="submit" class="btn btn-primary" type="submit" id="submit" tabindex="5">
			<?php sg_e('Submit Comment'); ?>
		</button>
	</div>
	
	<?php comment_id_fields(); ?>
	<?php do_action('comment_form', $post->ID); ?>
</form>