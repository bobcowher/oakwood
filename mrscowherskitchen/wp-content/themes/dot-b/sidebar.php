	<div id="sidebar" class="widget-area">
		<ul class="xoxo">
		<?php
		/* When we call the dynamic_sidebar() function, it'll spit out
		* the widgets for that widget area. If it instead returns false,
		* then the sidebar simply doesn't exist, so we'll hard-code in
		* some default sidebar stuff just in case.
		*/
		if ( is_active_sidebar( 'right-sidebar' ) ) dynamic_sidebar('right-sidebar'); else { ?>

			<li id="calendar" class="widget">
				<?php the_widget('WP_Widget_Calendar','','before_title=<h3 class="widget_title">&after_title=</h3>&widget_id=999');?> 
			</li>

			<li id="recent-post" class="widget">
				<?php the_widget('WP_Widget_Recent_Posts', 'number=7&title='.__('Recent Post','dot-b'), 'before_title=<h3 class="widget_title">&after_title=</h3>&widget_id=1000'); ?> 
			</li>
			
			<li id="recent-comments" class="widget">
				<?php the_widget('WP_Widget_Recent_Comments', 'number=7&title='.__('Recent Comments','dot-b'), 'before_title=<h3 class="widget_title">&after_title=</h3>&widget_id=1001'); ?> 
			</li>
			
			<li id="archives" class="widget">
				<h3 class="widget_title"><?php _e( 'Archives', 'dot-b' ); ?></h3>
				<ul>
					<?php wp_get_archives( 'type=monthly' ); ?>
				</ul>
			</li>
			
			<li id="tag_cloud" class="widget">
				<h3 class="widget_title"><?php _e( 'Tags', 'dot-b' ); ?></h3>
				<div>
					<?php wp_tag_cloud('smallest=8&largest=22'); ?>
				</div>
			</li>

			<li id="meta" class="widget">
				<h3 class="widget_title"><?php _e( 'Meta', 'dot-b' ); ?></h3>
				<ul>
					<?php wp_register(); ?>
					<li><?php wp_loginout(); ?></li>
					<?php wp_meta(); ?>
				</ul>
			</li>

		<?php }// end primary widget area ?>
		
		</ul>
	</div><!-- #sidebar -->