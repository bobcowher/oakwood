<?php
/*
 * Template - header.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * Template is called from index.php.
 * Everything in this template is run and then control is returned to index.php.
 * This template sets up all the required HEAD information, the 'skip to content' link, the header, the main menu and the breadcrumb navigation.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<meta http-equiv="Content-Type" content="<?php bloginfo( 'html_type' ); ?>; charset=<?php bloginfo( 'charset' ); ?>" />
<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' - '; } ?><?php bloginfo('name'); if(is_home()) { echo ' - '; bloginfo('description'); } ?></title>
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'stylesheet_url' ); ?>" />
<!--[if IE]>
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/ie.css" type="text/css" media="screen, projection" />
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php if (function_exists('body_class')) body_class(); ?>>
	
	<div id="wrapper"><?php // closed in footer.php ?>
		
		<?php // The skip link is invisible but will show up in a screenreader ?>
		<?php // The link also becomes visible if it receives the focus via the keyboard ?>
		<div id="skip">
			<a href="#content" title="">Skip to Content</a>
		</div><?php // end #skip ?>
		
		<div id="header">
			
			<?php if(is_home() && !is_paged()) { ?>
				
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			
			<?php } else { ?>
				
				<h1 class="site-title"><a href="<?php echo home_url( '/' ); ?>" title="<?php _e( 'Click for home', 'tweaker3'); ?>"><?php bloginfo( 'name' ); ?></a></h1>
				<span class="site-description"><?php bloginfo( 'description' ); ?></span>
			
			<?php } ?>
		
		</div><?php // end #header ?>
		
		<div id="access">
			
			<?php if (function_exists( 'wp_nav_menu' )) {
				wp_nav_menu(array( 'theme_location' => 'tweaker3-main-menu', 'menu_class' => 'sf-menu', 'fallback_cb' => 'tweaker3_default_menu' ));
			} else {
				tweaker3_default_menu(); 
			} ?>
			
		</div><?php // end #access ?>
		
		<div id="breadcrumb">

			<?php if (is_front_page()): ?>
				<?php if (is_paged()): ?>
					<?php get_template_part( 'breadcrumb' ); ?>
				<?php endif; ?>
			<?php else: ?>
				<?php get_template_part( 'breadcrumb' ); ?>
			<?php endif; ?>
		
		</div><?php // end #breadcrumb ?>
		
		<div id="container"><?php // Closed in sidebar.php ?>