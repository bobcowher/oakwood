<?php
/*
 * Template - single.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * Template that shows the single page with the entire post displayed.
 * The template calls header.php then shows the content of the relevant post.
 * The comments and comment form are then added.
 * The template then calls sidebar.php and footer.php. .
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

get_header(); ?>

<div id="content">
	
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
	
		<div <?php post_class('single-page') ?> id="post-<?php the_ID(); ?>">
		
			<h2 class="entry-title"><?php the_title(); ?></h2>
			<p class="entry-meta"><?php _e('By ', 'tweaker3' ); ?><?php the_author_posts_link(); ?><?php _e( ' on ', 'tweaker3' ); ?><?php echo get_the_date(); ?><?php edit_post_link( __( 'Edit', 'tweaker3' ), ' | ', ''); ?></p>
			<div class="entry-content">
				
				<?php the_content(); ?>
				<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tweaker3' ), 'after' => '</div>' ) ); ?>
			
			</div><?php // end .entry-content ?>
            
			<?php if (!is_attachment()): ?>
				<div class="entry-meta-single">
					<?php tweaker3_cats_and_tags(); ?>
				</div><?php // end .entry-meta-single ?>
			<?php endif; ?>
		
		</div><?php // end #post ?>
		
		<div id="single">
		
			<div class="single-block">
			
				<?php comments_template('', true); ?>
			
			</div><?php // end .single-block ?>
			
			<div class="nav">
			
				<div class="nav-left"><?php next_post_link( '&laquo; %link' ) ?></div>
				<div class="nav-right"><?php previous_post_link( '%link &raquo;' ) ?></div>
			
			</div><?php // end .nav ?>
		
		</div><?php // end #single ?>
		
	<?php endwhile; else: // This should never be necessary ?>
	
		<div <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<p><?php _e( 'Sorry, there does not appear to be any posts here.', 'tweaker3' ); ?></p>
		</div><?php // end unnamed div ?>
		
	<?php endif; ?>

</div><?php // end #content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>