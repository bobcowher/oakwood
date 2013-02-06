<?php
/*
 * Template - search.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is called when a user searches for a keyword in the search bar.
 * If the keyword searched for is found this template calls loop.php to show all the relevant posts.
 * The wp_pagenavi navigation is shown at the bottom of the page if the plugin has been activated.
 * If there is no wp-pagenavi plugin the standard 'newer - ' and 'older entries' links are shown.
 * sidebar.php is then called to add the sidebar and lastly footer.php is called to add the footer.
 * If the keyword searched for is not found the template calls find.php to assist the user with alternatives to find whatever is required.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

get_header(); ?>
<div id="content">
	<div class="archive-results">
		<span><?php printf( __( 'Search Results for: %s', 'tweaker3' ), '<strong>' . get_search_query() . '</strong>' ); ?></span>
	</div><?php // end .archive-results ?>
	<?php if (have_posts()) : ?>
		
		<?php get_template_part( 'loop' ); ?>
		
		<?php if(function_exists( 'wp_pagenavi' )) { ?>
			<div class="page-navi">
				<?php wp_pagenavi(); ?>
			</div><?php // end .page-navi ?>
		<?php } else { ?>
			<div class="nav">
				<div class="nav-left"><?php previous_posts_link( __( '&laquo; Newer Entries', 'tweaker3') ) ?></div>
				<div class="nav-right"><?php next_posts_link( __( 'Older Entries &raquo;', 'tweaker3') ) ?></div>
			</div><?php // end .nav ?>
		<?php } ?>
	
	<?php else : ?>
		<p><?php _e( 'You have searched for something that could not be found. To find whatever it is you are looking for, you could:', 'tweaker3' ); ?></p>
		<?php get_template_part( 'find' ); ?>
	<?php endif; ?>
</div><?php // end #content ?>
<?php get_sidebar(); ?>
<?php get_footer(); ?>