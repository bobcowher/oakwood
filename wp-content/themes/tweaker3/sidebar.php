<?php
/*
 * Template - sidebar.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is called from many other templates.
 * Sets the sidebar widget area , also loads defaults to show should no widgets be selected for the sidebar.
 * The DIV 'container' that was opened in header.php is closed here.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */
?>
	
    <div id="sidebar">
	
		<?php if (is_active_sidebar( 'sidebar' )) : ?>

			<?php dynamic_sidebar( 'sidebar' ); ?>

		<?php else : // the following are the defaults if no widgets have been added to the sidebar ?>

			<div class="widget">
				<?php get_search_form(); ?>
			</div><?php // end .widget ?>
			
			<div class="widget">
				<h4 class="widget-title">Recent Posts</h4>
				<?php
				$show = 5; 
				$r = new WP_Query(array('showposts' => $show, 'what_to_show' => 'posts', 'nopaging' => 0, 'post_status' => 'publish', 'ignore_sticky_posts' => 1));
				if ($r->have_posts()) : ?>
					<ul>
						<?php  while ($r->have_posts()) : $r->the_post(); ?>
							<li><a href="<?php the_permalink() ?>"><?php if ( get_the_title() ) the_title(); else echo 'No Title Added' ?></a></li>
						<?php endwhile; ?>
					</ul>	
					<?php wp_reset_query();
				endif; ?>
			</div><?php // end .widget ?>
			
		<?php endif; ?>
	
    </div><?php // end #sidebar ?>

</div><?php // end #container - this was opened in header.php ?>