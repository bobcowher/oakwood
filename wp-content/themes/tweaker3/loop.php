<?php
/*
 * Template - loop.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is called from index.php, archive.php and search.php.
 * The purpose of the template is to retrieve all relevant posts and to display them.
 * The template prevents duplicate code from being placed in numerous templates.
 * The template differentiates between posts that are marked as post-formats and other posts.
 * The code has been documented to show just what happens where.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

while (have_posts()) : the_post(); ?>
	
	<?php // show headers with a permalink and name of post-format on all post-format posts ?>
	<?php if (function_exists ( 'has_post_format' )): ?>
		<?php if ( get_post_format() != '' ): ?>
            <div class="entry-format-header">
				<span class="format-header-left"><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker3' ), the_title_attribute( 'echo=0' ) ); ?>"><?php _e( 'Permalink', 'tweaker3' ); ?></a><?php comments_popup_link( __( '', 'tweaker3' ), ' | 1 ' . __( 'Comment', 'tweaker3' ), ' | % ' . __( 'Comments', 'tweaker3' ), '', '' ); ?></span>
				<span class="format-header-right"><?php echo ( ucwords (get_post_format()) ); ?></span>
			</div><?php // end .entry-format-header ?>
		<?php endif; ?>
	<?php endif; ?>
	
	<div <?php post_class('loop') ?> id="post-<?php the_ID(); ?>">
	
		<?php // show titles on all non post-format posts as well as on all posts on any WordPress version older than 3.1 ?>
		<?php if (function_exists ( 'has_post_format' )): ?>
        
			<?php if ( get_post_format() == '' ): ?>
                <?php if (get_the_title()): ?>
					<div class="entry-title">
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker3' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
					</div><?php // end .entry-title ?>
				<?php else: ?>
					<div class="entry-title"><?php // adds a title if no title has been entered ?>
						<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker3' ), the_title_attribute( 'echo=0' ) ); ?>">No Title Entered</a></h2>
					</div><?php // end .entry-title ?>
				<?php endif; ?>
			<?php endif; ?>
		
		<?php else: ?>
			<?php if (get_the_title()): ?>
				<div class="entry-title">
					<h2><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker3' ), the_title_attribute( 'echo=0' ) ); ?>"><?php the_title(); ?></a></h2>
				</div><?php // end .entry-title ?>
			<?php endif; ?>
		
		<?php endif; ?>
			
		<?php // adds meta data to all non post-format posts. Adds these to all posts for WordPress versions older than 3.1 ?>
		<?php if (function_exists ( 'has_post_format' )): ?>
		
			<?php if ( get_post_format() == '' ): ?>
				<div class="entry-meta">
					<p><?php _e('By ', 'tweaker3' ); ?><?php the_author_posts_link(); ?><?php _e( ' on ', 'tweaker3' ); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker3' ), the_title_attribute( 'echo=0' ) ); ?>"><?php echo get_the_date(); ?></a><?php edit_post_link( __( 'Edit', 'tweaker3' ), ' | ', ''); ?><br />
					<?php tweaker3_cats_and_tags(); ?><?php comments_popup_link( __( '', 'tweaker3' ), ' | 1 ' . __( 'Comment', 'tweaker3' ), ' | % ' . __( 'Comments', 'tweaker3' ), '', '' ); ?></p>
				</div><?php // end .entry-meta ?>
			<?php endif; ?>
		
		<?php else: ?>
			<div class="entry-meta">
				<p><?php _e('By ', 'tweaker3' ); ?><?php the_author_posts_link(); ?><?php _e( ' on ', 'tweaker3' ); ?><a href="<?php the_permalink() ?>" rel="bookmark" title="<?php printf( __( 'Permalink to %s', 'tweaker3' ), the_title_attribute( 'echo=0' ) ); ?>"><?php echo get_the_date(); ?></a><?php edit_post_link( __( 'Edit', 'tweaker3' ), ' | ', ''); ?><br />
				<?php tweaker3_cats_and_tags(); ?><?php comments_popup_link( __( '', 'tweaker3' ), ' | 1 ' . __( 'Comment', 'tweaker3' ), ' | % ' . __( 'Comments', 'tweaker3' ) ); ?></p>
			</div><?php // end .entry-meta ?>
		
		<?php endif; ?>
		
		<?php // the content/excerpt is shown for all posts ?>
		<div class="entry-content">
		
			<?php if ( has_post_thumbnail()) : ?>
			   <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail', array('class' => 'thumb-pic', 'title' => '', 'alt' => '' )); ?></a>
			<?php endif; ?>
			<?php if(!empty($post->post_excerpt)): ?>
				<?php the_excerpt(); ?>
			<?php else: ?>
				<?php the_content(__( "Continue reading ", "tweaker3" ) . the_title('', '', false)); ?>
			<?php endif; ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-link">' . __( 'Pages:', 'tweaker3' ), 'after' => '</div>' ) ); ?>
			
		</div><?php // end .entry-content ?>
		
	</div><?php // end #post ?>
	
<?php endwhile; ?>