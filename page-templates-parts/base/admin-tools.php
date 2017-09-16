<?php if( is_user_logged_in() ): ?>
	<div class="cb-adminTools js-adminBar">
		<a href="<?php bloginfo('url'); ?>/wp-admin/" target="_blank" class="cb-adminTools__bt">Admin</a>
		<a href="<?php echo get_edit_post_link(get_the_ID()); ?>" target="_blank" class="cb-adminTools__bt">Edit</a>
	</div>
<?php endif; ?>