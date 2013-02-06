<?php
/*
 * Template - archive.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is activated when any archive page is reguired i.e author, category, tag, date etc.
 * The template determines the situation and places the relevant info at the top of the page.
 * The template loop.php is then called to show the relevant posts.
 * The wp_pagenavi navigation is shown at the bottom of the page if the plugin has been activated.
 * If there is no wp-pagenavi plugin the standard 'newer - ' and 'older entries' links are shown.
 * sidebar.php is then called to add the sidebar and lastly footer.php is called to add the footer.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

get_header(); ?>

<div id="content">

    <?php // Author details are required should the page  being opened is the author archive. ?>
	<?php if(get_query_var('author_name')) :
        $curauth = get_user_by('slug', get_query_var('author_name'));
    else :
        $curauth = get_userdata(get_query_var('author'));
    endif; ?>
    
	<?php if (have_posts()) : ?>
        <?php $post = $posts[0]; // Hack. Set $post so that the_date() works. ?>
        <?php /* If this is a category archive */ if (is_category()) { ?>
        <div class="archive-results"><span><?php _e("Archive for the ", "tweaker3"); ?><strong><?php single_cat_title(); ?></strong> <?php _e("Category", "tweaker3"); ?></span></div>
        <?php /* If this is a tag archive */ } elseif( is_tag() ) { ?>
        <div class="archive-results"><span><?php _e("Posts tagged ", "tweaker3"); ?><strong><?php single_tag_title(); ?></strong></span></div>
        <?php /* If this is a daily archive */ } elseif (is_day()) { ?>
        <div class="archive-results"><span><?php _e("Archive for ", "tweaker3"); ?><strong><?php the_time(__( 'j F Y', 'tweaker3' )); ?></strong></span></div>
        <?php /* If this is a monthly archive */ } elseif (is_month()) { ?>
        <div class="archive-results"><span><?php _e("Archive for ", "tweaker3"); ?><strong><?php the_time(__( 'F Y', 'tweaker3' )); ?></strong></span></div>
        <?php /* If this is a yearly archive */ } elseif (is_year()) { ?>
        <div class="archive-results"><span><?php _e("Archive for ", "tweaker3"); ?><strong><?php the_time(__( 'Y', 'tweaker3' )); ?></strong></span></div>
        <?php /* If this is an author archive */ } elseif (is_author()) { ?>
        <div class="archive-results"><span><?php _e("The following articles were authored by ", "tweaker3"); ?><strong><?php echo $curauth->nickname; ?></strong></span></div>
        <?php } ?>
        
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
        
    <?php endif; ?>

</div><?php // end #content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>