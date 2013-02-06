<?php
/*
 * Template - searchform.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template sets the search form used throughout the theme.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */

global $next_id; ++$next_id; // the $next_id is used to overcome the validation problem if more than one search form is used on a page ?>

<div class="search">
	
	<form method="get" class="searchform" id="searchform<?php if ( $next_id ) echo '-' . $next_id; ?>" action="<?php echo home_url(); ?>/">
		
		<div>
			<input class="searchtext" type="text" name="s" id="searchtext<?php if ( $next_id)  echo '-' . $next_id; ?>" value="<?php if ( is_search() ) echo esc_attr( get_search_query() ); else _e( 'Search this site...', 'tweaker3' ); ?>" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;" />
			<input class="searchsubmit" name="submit" type="submit" id="searchsubmit<?php if ( $next_id ) echo '-' . $next_id; ?>" value="<?php _e( 'Search', 'tweaker3' ); ?>" />
		</div>
	
	</form>

</div><?php // end .search ?>