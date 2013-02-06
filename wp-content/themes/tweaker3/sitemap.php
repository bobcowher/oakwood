<?php
/*
 * Template Name:	Sitemap
 * Template sitemap.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is used to allow the user to add apage and convert it into a 'sitemap'.
 * Do not remove the 'Template Name' tag above as the template will then no longer show up as a page template in the back-end.
 * The template shows any content the user might have added to the page as well as:
 		* Monthly archives,
 		* Pages,
 		* Categories,
		* Tags,
		* Authors,
		* Feeds; and 
		* Posts.
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
        </div><?php // end #post ?>
    <?php endwhile; endif; ?>
    
    <div class="content-container">
        <div class="content-left">
            <div class="widget">
                <h4 class="widget-title"><?php _e( 'Monthly Archives', 'tweaker3' ); ?></h4>
                <ul>
                    <?php wp_get_archives( 'type=monthly' ); ?>
                </ul>
            </div><?php // end .widget ?>
        </div><?php // end .content-left ?>
        <div class="content-right">
            <div class="widget">
                <h4 class="widget-title"><?php _e( 'Pages', 'tweaker3' ); ?></h4>
                <ul>
                    <?php wp_list_pages( array( 'title_li' => false ) ); ?>
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
    
    <div class="content-container">
        <div class="content-left">
            <div class="widget">
                <h4 class="widget-title"><?php _e( 'Authors', 'tweaker3' ); ?></h4>
                <ul>
                    <?php wp_list_authors( array( 'exclude_admin' => false, 'show_fullname' => true ) ); ?>
                </ul>
            </div><?php // end .widget ?>
        </div><?php // end .content-left ?>
        <div class="content-right">
            <div class="widget">
                <h4 class="widget-title"><?php _e( 'Feeds', 'tweaker3' ); ?></h4>
                <ul>
                    <li><a href="<?php bloginfo( 'rdf_url' ); ?>" title="<?php _e( 'RDF/RSS 1.0 feed', 'tweaker3' ); ?>"><?php _e( 'RDF/RSS 1.0 feed', 'tweaker3' ); ?></a></li>
                    <li><a href="<?php bloginfo( 'rss_url' ); ?>" title="<?php _e( 'RSS 0.92 feed', 'tweaker3' ); ?>"><?php _e( 'RSS 0.92 feed', 'tweaker3' ); ?></a></li>
                    <li><a href="<?php bloginfo( 'rss2_url' ); ?>" title="<?php _e( 'RSS 2.0 feed', 'tweaker3' ); ?>"><?php _e( 'RSS 2.0 feed', 'tweaker3' ); ?></a></li>
                    <li><a href="<?php bloginfo( 'atom_url' ); ?>" title="<?php _e( 'Atom feed', 'tweaker3' ); ?>"><?php _e( 'Atom feed', 'tweaker3' ); ?></a></li>
                    <li><a href="<?php bloginfo( 'comments_rss2_url' ); ?>" title="<?php _e( 'Comments RSS 2.0 feed', 'tweaker3' ); ?>"><?php _e( 'Comments RSS 2.0 feed', 'tweaker3' ); ?></a></li>
                </ul>
            </div><?php // end .widget ?>
        </div><?php // end .content-right ?>
    </div><?php // end .content-container ?>
        
    <div class="widget">
        <h4 class="widget-title"><?php _e( 'Posts', 'tweaker3' ); ?></h4>
        <ul>
            <?php $myposts = get_posts( 'numberposts=-1&offset=0&order=DESC' ); ?>
            <?php foreach($myposts as $post) : ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div><?php // end .widget ?>

</div><?php // end #content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>