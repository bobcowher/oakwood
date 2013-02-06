<?php
/*
 * Template - find.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is activated when a 404 error is generated or  a search is conducted for which no results are found.
 * The template splits the page across two columns.
 * The idea behind the template is to assist the user to find that which cannot be found.
 * A single template is used to prevent the duplication of code in 404.php and search.php.
 * A user is shown a search form, the last 12 monthly archives, the categories used on the blog, the tags used on the blog 
 * as well as the 20 last posts published on the blog.
 * The categories and tags are shown in a tag-cloud format.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */
?>

<div class="content-container">
	<div class="content-left">
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Search', 'tweaker3' ); ?></h4>
			<div>
				<?php get_search_form(); ?>
			</div><?php // end unnamed div ?>
		</div><?php // end .widget ?>
	</div><?php // end .content-left ?>
	<div class="content-right">
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Monthly Archives', 'tweaker3' ); ?></h4>
			<ul>
				<?php wp_get_archives( 'type=monthly&limit=12' ); ?>
			</ul>
		</div><?php // end .widget ?>
	</div><?php // end .content-right ?>
</div><?php // end .content-container ?>

<div class="content-container">
	<div class="content-left">
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Categories', 'tweaker3' ); ?></h4>
			<ul>
				<p><?php wp_tag_cloud( array( 'number' => 0, 'taxonomy' => 'category', 'smallest' => 10, 'largest' => 16 ) ); ?></p>
			</ul>
		</div><?php // end .widget ?>
	</div><?php // end .content-left ?>
	<div class="content-right">
		<div class="widget">
			<h4 class="widget-title"><?php _e( 'Tags', 'tweaker3' ); ?></h4>
			<p><?php wp_tag_cloud( array( 'number' => 0, 'taxonomy' => 'post_tag', 'smallest' => 10, 'largest' => 16 ) ); ?></p>
		</div><?php // end .widget ?>
	</div><?php // end .content-right ?>
</div><?php // end .content-container ?>

<div class="widget">
	<h4 class="widget-title"><?php _e( 'Recent Posts', 'tweaker3' ); ?></h4>
	<ul>
		<?php $myposts = get_posts( 'numberposts=20&offset=0&order=DESC' ); ?>
		<?php foreach($myposts as $post) : ?>
			<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
		<?php endforeach; ?>
	</ul>
</div><?php // end .widget ?>