<?php
/*
 * Template - 404.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is activated when a 404 (not found) error is generated.
 * The template simply informs the user that an error has occurred and then calls the find.php template.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

get_header(); ?>

<div id="content">
    
    <div class="archive-results">
        <span><?php _e( 'An error has occurred. Something has either been moved or it is no longer available.', 'tweaker3' ); ?></span>
    </div><?php // end .archive-results ?>
    
    <p><?php _e( 'You have searched for something that could not be found. Hopefully the following will be of assistance to you.', 'tweaker3' ); ?></p>
    <?php get_template_part( 'find' ); ?>
</div><?php // end #content ?>

<?php get_sidebar(); ?>
<?php get_footer(); ?>