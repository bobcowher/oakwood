<?php
/*
 * Template - index.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * The first template to be opened when site is visited.
 * This template calls get_header which runs header.php.
 * The template loop.php is then called to show the relevant posts.
 * The wp_pagenavi navigation is shown at the bottom of the page if the plugin has been activated.
 * If there is no wp-pagenavi plugin the standard 'newer - ' and 'older entries' links are shown.
 * sidebar.php is then called to add the sidebar and lastly footer.php is called to add the footer.
 * 
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

get_header(); ?>

<div id="content">
    
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
        <h2><?php _e( 'Not Found', 'tweaker3' ); ?></h2>
        <p><?php _e( 'Sorry, but you are looking for something that is not here.', 'tweaker3' ); ?></p>
    <?php endif; ?>

</div><?php // end #content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>