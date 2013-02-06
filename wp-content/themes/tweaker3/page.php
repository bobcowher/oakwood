<?php
/*
 * Template - page.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is used to show the standard WordPress pages.
 * The template calls header.php and then loads the content of the relevant page.
 * The comments and comment form are then added.
 * The template then calls sidebar.php and footer.php. 
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

get_header(); ?>

<div id="content">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
        <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <h2><?php the_title(); ?></h2>
            <div class="entry-content">
                <?php the_content(); ?>
                <?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tweaker3' ), 'after' => '</div>' ) ); ?>
            </div><?php // end .entry-content ?>
			<p class="entry-meta"><?php _e('By ', 'tweaker3' ); ?><?php the_author_posts_link(); ?><?php _e( ' on ', 'tweaker3' ); ?><a href="<?php the_permalink() ?>" rel="bookmark" title=""><?php echo get_the_date(); ?></a><?php edit_post_link( __( 'Edit', 'tweaker3' ), ' | ', ''); ?></p>
        </div><?php // end #post ?>
        
        <div id="single">
            
            <div class="single-block">
                <?php comments_template( '', true ); ?>
            </div><?php // end .single-block ?>
            
        </div><?php // end #single ?>
        
    <?php endwhile; endif; ?>

</div><?php // end #content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>