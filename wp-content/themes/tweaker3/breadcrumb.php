<?php
/*
 * Template - breadcrumb.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * Template is called from header.php if the current page is any page but the home page (non-paged)
 * The breadcrumb navigation is not shown if the user is on the home page.
 * Any changes to the breadcrumb navigation that you need to make will have to be made here.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */


// set the required separator for the breadcrumb navigation here
$after = ' / ' // ;
?>

<span class="crumb">
	<?php if (is_home() && !is_paged()): // A static page is used as the home page ?>
		<a href="<?php echo home_url( '/' ); ?>" title=""><?php _e( 'Home', 'tweaker3' ); ?></a> / Blog
	<?php else: // All other pages ?>
		<a href="<?php echo home_url( '/' ); ?>" title=""><?php _e( 'Home', 'tweaker3' ); ?></a>
	<?php endif; ?>
	<?php

	if (is_page()) { // Standard Pages
        $parent_id  = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="'.get_permalink($page->ID).'" title="">'.get_the_title($page->ID).'</a>';
            $parent_id  = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb) echo $after . $crumb;
        echo $after;
        echo the_title();

	} elseif (is_category()) { // Categories
        echo $after;
        single_cat_title();

	} elseif (is_tag()) { // Tags
        echo $after;
        single_tag_title();

	} elseif (is_date()) { // Date Archives
        echo $after;
        echo  the_time(__( 'F Y', 'tweaker3' ));

	} elseif (is_author()) { // Author Page
        echo $after;
        if(get_query_var('author_name')) :
            $curauth = get_user_by('slug', get_query_var('author_name'));
        else :
            $curauth = get_userdata(get_query_var('author'));
        endif;
        echo $curauth->nickname;

	} elseif (is_paged()) { // Paged contents
        echo $after;
        $page_number = (get_query_var('paged')) ? get_query_var('paged') : 1;
        echo (__( 'Main Page Archive - Page ', 'tweaker3' ) . $page_number );

	} elseif (is_search()) { // Search pages
        echo $after;
        echo (__( 'Search results', 'tweaker3' ) );
        $allsearch = &new WP_Query( "s=$s&showposts=-1" );
        $key = esc_html($s, 1);
        _e('', 'tweaker3' );
        _e( ' <span> for ', 'tweaker3' );
        echo $key;
        _e( '</span>', 'tweaker3' );

	} elseif (is_404()) { //404 Error page
        echo $after;
        echo (__( 'Page not found', 'tweaker3' ) );

	} elseif (is_single()) { // Single Page
        echo $after;
        echo (the_category( ', ' ));
        if (is_single()) {
            echo $after;
            the_title();
        }
    } ?>

</span><?php // end .crumb ?>