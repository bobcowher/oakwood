<?php
/*
 * Template - functions.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template contains all the custom functions used by the theme.
 * More details of each function can be found with each specific function.
 * Child Theme - 
 * A child functions.php is loaded together with the parent functions.php.
 * The child functions.php is loaded first which makes it simple to overwrite functions in the parent.
 * To customize a specific function simply give the function you need to change the same name as in the parent.
 * The function in the child will load first and the relevant function in the parent will not load at all.
 *
 *
*
 * Function - tweaker3_theme_setup
 *
 * Sets the content width.
 * Adds support for editor stylesheet, automatic feed links, post thumbnails, and custom background.
 * Also adds support for all 9 post formats as well as the custom header.
 * Set the TEXT DOMAIN needed for localization purposes.
 * Calls 3 other functions which sets the custom menu, registers the 5 widgetized areas and calls a function that enqueues all stylesheets and scripts.
 *
 */

add_action( 'after_setup_theme', 'tweaker3_theme_setup' );

if(!function_exists( 'tweaker3_theme_setup' )) {
	function tweaker3_theme_setup() {
		global $content_width;
	
		if ( !isset( $content_width ) )
			$content_width = 620;
	
		add_editor_style();
		
		add_theme_support( 'automatic-feed-links' );
	
		add_theme_support( 'post-thumbnails' );
	
		if ( function_exists('add_custom_background') ) {
			add_custom_background();
		}
		
		if (function_exists ( 'has_post_format' )) {
			add_theme_support( 'post-formats', array( 'aside', 'audio', 'chat', 'gallery', 'image', 'link', 'quote', 'status', 'video' ) );
		}
		
		add_custom_image_header('tweaker3_header_style', 'tweaker3_admin_header_style');
		
		load_theme_textdomain( 'tweaker3', TEMPLATEPATH . '/languages' );
	
		$locale = get_locale();
		$locale_file = TEMPLATEPATH . "/languages/$locale.php";
		if ( is_readable( $locale_file ) )
			get_template_part( $locale_file );
	
		if (function_exists('wp_nav_menu')) {
			add_action( 'init', 'tweaker3_register_menus' );
		}
	
		add_action( 'widgets_init', 'tweaker3_register_sidebars' );
	
		add_action( 'template_redirect', 'tweaker3_load_scripts' );
		
		define('HEADER_TEXTCOLOR', '555');
		define('HEADER_IMAGE', '%s/images/tweaker3-header.png');
		define('HEADER_IMAGE_WIDTH', 980);
		define('HEADER_IMAGE_HEIGHT', 120);
	
	}
}

/*
 * Function - tweaker3_register_menus
 *
 * Registers the custom menus.
 *
 */
 
if(!function_exists( 'tweaker3_register_menus' )) {
	function tweaker3_register_menus() {
		if (function_exists( 'register_nav_menu' )) {
			register_nav_menu( 'tweaker3-main-menu', 'Main Menu');
		}
	}
}

/*
 * Function - tweaker3_default_menu
 *
 * This is the fall-back menu if a custom menu has not been set.
 * This function is called from header.php if applicable.
 *
 */
 
if(!function_exists( 'tweaker3_default_menu' )) {
	function tweaker3_default_menu() {
		if (get_option( 'page_on_front' ) == 0):
			echo '<ul class="sf-menu">';
			if(is_home() && !is_paged()) {
				echo '<li class="current_page_item"><a href="'. home_url( '/' ) . '" title="' . __( 'You are Home', 'tweaker3' ) . '" rel="nofollow">' . __( 'Home', 'tweaker3' ) . '</a></li>';
			} else {
				echo '<li><a href="'. home_url( '/' ) . '" title="' . __( 'Click for Home', 'tweaker3' ) . '" rel="nofollow">' . __( 'Home', 'tweaker3' ) . '</a></li>';
			}
			wp_list_pages( 'title_li=' );
			echo '</ul>';
		else:
			echo '<ul class="sf-menu">';
			wp_list_pages( 'title_li=' );
			echo '</ul>';
		endif;
	}
}

/*
 * Function - tweaker3_register_sidebars
 *
 * Registers all 4 the widgetized areas used in the theme.
 *
 */

add_action( 'widgets_init', 'tweaker3_register_sidebars' );

function tweaker3_register_sidebars() {
	register_sidebar(array( 
	'id' => 'sidebar',
	'name' => 'sidebar',
	'description' => __('Widgets you add here will be added to the sidebar', 'tweaker3'),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
	));
	register_sidebar(array(
	'id' => 'footer-left', 
	'name' => 'footer left',
	'description' => __('Widgets you add here will be added to left footer widget area', 'tweaker3'),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
	));
	register_sidebar(array( 
	'id' => 'footer-center',
	'name' => 'footer center',
	'description' => __('Widgets you add here will be added to center footer widget area', 'tweaker3'),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
	));
	register_sidebar(array( 
	'id' => 'footer-right',
	'name' => 'footer right',
	'description' => __('Widgets you add here will be added to right footer widget area', 'tweaker3'),
	'before_widget' => '<div class="widget">',
	'after_widget' => '</div>',
	'before_title' => '<h4 class="widget-title">',
	'after_title' => '</h4>',
	));
}

/*
 * Function - tweaker3_header_style
 *
 * This function is required for the custom headers.
 * This is the styling used on the front-end of the theme with regards to the header.
 *
 */

if(!function_exists( 'tweaker3_header_style' )) {
	function tweaker3_header_style() {
		?>
		<style type="text/css">
		#header{
			clear:both;
			background: url(<?php header_image() ?>) no-repeat;
			height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
			width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
			padding:0;
		}
		.site-title {
			padding:20px 0 0;
			margin: 0 0 0 10px;
			line-height:42px;
		}
		.site-description {
			padding: 0;
			margin: 0 0 0 10px;
			line-height:15px;
			font-style:italic;
		}
		<?php
		if ( 'blank' == get_header_textcolor() ) { ?>
		#header h1, #header #desc {
			display: none;
		}
		<?php } else {
			?>
		.site-title a:link,
		.site-title a:visited,
		.site-title a:hover,
		.site-title a:focus,
		.site-title a:active,
		 .site-description {
			color:#<?php header_textcolor() ?>;
		}
		<?php } ?>
		</style>
		<?php
	}
}

/*
 * Function - tweaker3_admin_header_style
 *
 * This function is required for the custom headers.
 * This is the styling used in the back-end of the theme with regards to the header.
 *
 */

if(!function_exists( 'tweaker3_admin_header_style' )) {
	function tweaker3_admin_header_style() {
		?>
		<style type="text/css">
		#headimg{
			background: url(<?php header_image() ?>) no-repeat;
			height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
			width:<?php echo HEADER_IMAGE_WIDTH; ?>px;
			padding:0 0 0 18px;
			font-family: arial;
		}
		#headimg h1{
			padding-top:20px;
			margin: 0;
		}
		#headimg h1 a, #desc{
			color:#<?php header_textcolor() ?>;
			text-decoration: none;
			border-bottom: none;
		}
		#desc {
			padding-top: 15px;
		}
		<?php if ( 'blank' == get_header_textcolor() ) { ?>
		#headimg h1, #headimg #desc {
			display: none;
		}
		#headimg h1 a, #headimg #desc {
			color:#<?php echo HEADER_TEXTCOLOR ?>;
		}
		<?php } ?>
		</style>
	<?php }
}
/*
 * Function - tweaker3_load_scripts
 *
 * Enqueue all the scripts need by the theme.
 *
 */
 
if(!function_exists( 'tweaker3_load_scripts' )) {
	function tweaker3_load_scripts() {
		if ( is_singular() && get_option( 'thread_comments' ) && comments_open() ) {
			wp_enqueue_script( 'comment-reply' );
		}
		
		if ( !is_admin() ) { 
			wp_deregister_script( 'jquery' );
			wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js');
			wp_enqueue_script( 'jquery' );
			wp_register_script('tweaker3_sf_main',
			get_template_directory_uri() . '/js/superfish.js' );
			wp_enqueue_script('tweaker3_sf_main');
			wp_register_script('tweaker3_sf_call',
			get_template_directory_uri() . '/js/tweaker3-sf-call.js' );
			wp_enqueue_script('tweaker3_sf_call');
		}
	}
}

/*
 * Function - tweaker3_cats_and_tags
 *
 * A custom function to add the relevant categories and tags to a post.
 * Function called in loop.php.
 *
 */

if(!function_exists( 'tweaker3_cats_and_tags' )) {
	function tweaker3_cats_and_tags() {
		$tags = get_the_tag_list( '', ', ' );
		if ( $tags ) {
			$cats_tags = __( 'This entry is filed under %1$s and tagged %2$s.', 'tweaker3' );
		} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
			$cats_tags = __( 'This entry is filed under %1$s.', 'tweaker3' );
		}
		printf(
			$cats_tags,
			get_the_category_list( ', ' ),
			$tags
		);
	}
}
?>