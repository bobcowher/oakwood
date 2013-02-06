<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 500;

$themecolors = array(
	'bg' => 'e8ebef',
	'text' => '333333',
	'link' => '74A016'
);

/** Tell WordPress to run martin_setup() when the 'after_setup_theme' hook is run. */
add_action( 'after_setup_theme', 'martin_setup' );

if ( ! function_exists( 'martin_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * To override martin_setup() in a child theme, add your own martin_setup to your child theme's
 * functions.php file.
 *
 * @uses add_theme_support() To add support for post thumbnails and automatic feed links.
 * @uses register_nav_menus() To add support for navigation menus.
 * @uses add_custom_background() To add support for a custom background.
 * @uses add_editor_style() To style the visual editor.
 * @uses load_theme_textdomain() For translation/localization support.
 * @uses add_custom_image_header() To add support for a custom header.
 * @uses register_default_headers() To register the default custom header images provided with the theme.
 * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
 *
 * @since Martin 1.0
 */
function martin_setup() {

	// This theme has some pretty cool theme options
	require_once ( get_template_directory() . '/inc/theme-options.php' );

	// This theme styles the visual editor with editor-style.css to match the theme style.
	add_editor_style();

	// This theme uses post thumbnails
	add_theme_support( 'post-thumbnails' );
 	 if ( function_exists( 'add_image_size' ) )
	 add_image_size( 'himage', 580, 200, true );

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Make theme available for translation
	// Translations can be filed in the /languages/ directory
	load_theme_textdomain( 'martin', TEMPLATEPATH . '/languages' );

	$locale = get_locale();
	$locale_file = TEMPLATEPATH . "/languages/$locale.php";
	if ( is_readable( $locale_file ) )
		require_once( $locale_file );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', 'martin' ),
		'secondary' => __( 'Secondary Navigation', 'martin' ),
	) );

	// This theme allows users to set a custom background
	add_custom_background();

	// Your changeable header business starts here
	define( 'HEADER_TEXTCOLOR', '000' );
	// No CSS, just an IMG call. The %s is a placeholder for the theme template directory URI.
	define( 'HEADER_IMAGE', '%s/images/headers/header4.jpg' );

	// The height and width of your custom header. You can hook into the theme's own filters to change these values.
	// Add a filter to martin_header_image_width and martin_header_image_height to change these values.
	define( 'HEADER_IMAGE_WIDTH', apply_filters( 'martin_header_image_width', 580 ) );
	define( 'HEADER_IMAGE_HEIGHT', apply_filters( 'martin_header_image_height', 200 ) );

	// We'll be using post thumbnails for custom header images on posts and pages.
	// We want them to be 940 pixels wide by 198 pixels tall.
	// Larger images will be auto-cropped to fit, smaller ones will be ignored. See header.php.
	set_post_thumbnail_size( HEADER_IMAGE_WIDTH, HEADER_IMAGE_HEIGHT, true );

	// Add a way for the custom header to be styled in the admin panel that controls
	// custom headers. See martin_admin_header_style(), below.
	add_custom_image_header( 'martin_header_style', 'martin_admin_header_style', 'martin_admin_header_image' );

	// ... and thus ends the changeable header business.

	// Default custom headers packaged with the theme. %s is a placeholder for the theme template directory URI.
	register_default_headers( array(
		'header1' => array(
			'url' => '%s/images/headers/header.jpg',
			'thumbnail_url' => '%s/images/headers/header-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header 1', 'martin' )
		),

		'header2' => array(
			'url' => '%s/images/headers/header2.jpg',
			'thumbnail_url' => '%s/images/headers/header2-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header 2', 'martin' )
		),

		'header3' => array(
			'url' => '%s/images/headers/header3.jpg',
			'thumbnail_url' => '%s/images/headers/header3-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header 3', 'martin' )
		),

		'header4' => array(
			'url' => '%s/images/headers/header4.jpg',
			'thumbnail_url' => '%s/images/headers/header4-thumbnail.jpg',
			/* translators: header image description */
			'description' => __( 'Header 4', 'martin' )
		),
	) );
}
endif;

if ( ! function_exists( 'martin_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @since Martin 1.0
 */
function martin_header_style() {
	// If no custom options for text are set, let's bail
	// get_header_textcolor() options: HEADER_TEXTCOLOR is default, hide text (returns 'blank') or any hex value
	if ( HEADER_TEXTCOLOR == get_header_textcolor() )
		return;
	// If we get this far, we have custom styles. Let's do this.
	?>
	<style type="text/css">
	<?php
		// Has the text been hidden?
		if ( 'blank' == get_header_textcolor() ) :
	?>
		#site-title,
		#site-description {
			position: absolute;
			left: -9000px;
		}
	<?php
		// If the user has set a custom color for the text use that
		else :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?> !important;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;


if ( ! function_exists( 'martin_admin_header_style' ) ) :
/**
 * Styles the header image displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in martin_setup().
 *
 * @since Martin 1.0
 */
function martin_admin_header_style() {
?>
	<style type="text/css">
	.appearance_page_custom-header #headimg {
		background: #<?php echo get_background_color(); ?>;
		border: none;
	}

	#headimg h1 {
		margin: 0;
	font-size: 30px;
	line-height: 36px;
	margin: 0 0 18px 0;
	float:left;
	}
	#headimg h1 a {
	color: #000;
	font-weight: bold;
	text-decoration: none;
	}
	#desc {
	clear: right;
	float: right;
	font-style: italic;
	margin:0;
	width: 220px;
	display:none;
	}
	<?php
		// If the user has set a custom color for the text use that
		if ( get_header_textcolor() != HEADER_TEXTCOLOR ) :
	?>
		#site-title a,
		#site-description {
			color: #<?php echo get_header_textcolor(); ?>;
		}
	<?php endif; ?>
	#headimg img {
		max-width: 940px;
		width: 100%;

	}
	</style>
<?php
}
endif;

if ( ! function_exists( 'martin_admin_header_image' ) ) :
/**
 * Custom header image markup displayed on the Appearance > Header admin panel.
 *
 * Referenced via add_custom_image_header() in martin_setup().
 *
 * @since Martin 1.0
 */
function martin_admin_header_image() { ?>
	<div id="headimg">
		<?php
		if ( 'blank' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) || '' == get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) )
			$style = ' style="display:none;"';
		else
			$style = ' style="color:#' . get_theme_mod( 'header_textcolor', HEADER_TEXTCOLOR ) . ';"';
		?>
		<h1><a id="name"<?php echo $style; ?> onclick="return false;" href="<?php echo home_url( '/' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
		<div id="desc"<?php echo $style; ?>><?php bloginfo( 'description' ); ?></div>
		<img src="<?php esc_url ( header_image() ); ?>" alt="" />
	</div>
<?php }
endif;

/**
 * Get our wp_nav_menu() fallback, wp_page_menu(), to show a home link.
 *
 * @since Martin 1.0
 */
function martin_page_menu_args( $args ) {
	$args['show_home'] = true;
	return $args;
}
add_filter( 'wp_page_menu_args', 'martin_page_menu_args' );

/**
 * Sets the post excerpt length to 40 characters.
 *
 * @since Martin 1.0
 * @return int
 */
function martin_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'martin_excerpt_length' );

/**
 * Returns a "Read more" link for excerpts
 *
 * @since Martin 1.0
 * @return string "Read more" link
 */
function martin_continue_reading_link() {
	return ' <a href="'. get_permalink() . '">' . __( 'Read more <span class="meta-nav">&raquo;</span>', 'martin' ) . '</a>';
}

/**
 * Replaces "[...]" (appended to automatically generated excerpts) with an ellipsis and martin_continue_reading_link().
 *
 * @since Martin 1.0
 * @return string An ellipsis
 */
function martin_auto_excerpt_more( $more ) {
	return ' &hellip;' . martin_continue_reading_link();
}
add_filter( 'excerpt_more', 'martin_auto_excerpt_more' );

/**
 * Adds a pretty "Read more" link to custom post excerpts.
 *
 * @since Martin 1.0
 * @return string Excerpt with a pretty "Read more" link
 */
function martin_custom_excerpt_more( $output ) {
	if ( has_excerpt() && ! is_attachment() ) {
		$output .= martin_continue_reading_link();
	}
	return $output;
}
add_filter( 'get_the_excerpt', 'martin_custom_excerpt_more' );

/**
 * Remove inline styles printed when the gallery shortcode is used.
 *
 * Galleries are styled by the theme in Martin's style.css.
 *
 * @since Martin 1.0
 * @return string The gallery style filter, with the styles themselves removed.
 */
function martin_remove_gallery_css( $css ) {
	return preg_replace( "#<style type='text/css'>(.*?)</style>#s", '', $css );
}
add_filter( 'gallery_style', 'martin_remove_gallery_css' );

if ( ! function_exists( 'martin_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * To override this walker in a child theme without modifying the comments template
 * simply create your own martin_comment(), and that function will be used instead.
 *
 * @since Martin 1.0
 */
function martin_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case '' :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<div id="comment-<?php comment_ID(); ?>">
		<div class="comment-author vcard">
			<?php echo get_avatar( $comment, 48 ); ?>

			<cite class="fn"><?php comment_author_link(); ?></cite>

			<span class="comment-meta commentmetadata">
				|
				<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>">
				<?php
					/* translators: 1: date, 2: time */
					printf( __( '%1$s at %2$s', 'martin' ),
						get_comment_date(),
						get_comment_time()
					); ?></a>
					|
					<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					<?php edit_comment_link( __( 'Edit', 'martin' ), ' | ' );
				?>
			</span><!-- .comment-meta .commentmetadata -->
		</div><!-- .comment-author .vcard -->
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em><?php _e( 'Your comment is awaiting moderation.', 'martin' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-body"><?php comment_text(); ?></div>

	</div><!-- #comment-##  -->

	<?php
			break;
		case 'pingback'  :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', 'martin' ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( '(Edit)', 'martin' ), ' ' ); ?></p>
	<?php
			break;
	endswitch;
}
endif;

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * @since Martin 1.0
 * @uses register_sidebar
 */
function martin_widgets_init() {


	// Area 1, located at the top of the sidebar.
	register_sidebar( array(
		'name' => __( 'Primary Widget Area', 'martin' ),
		'id' => 'sidebar-1',
		'description' => __( 'The primary widget area', 'martin' ),
		'before_widget' => '<div class="infobox">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
	register_sidebar( array(
		'name' => __( 'Secondary Widget Area', 'martin' ),
		'id' => 'secondary-widget-area',
		'description' => __( 'The secondary widget area appears in 3-column layouts', 'martin' ),
		'before_widget' => '<div class="infobox">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 3, located above the primary and secondary sidebars in Content-Sidebar-Sidebar and Sidebar-Sidebar-Content layouts. Empty by default.
	register_sidebar( array(
		'name' => __( 'Feature Widget Area', 'martin' ),
		'id' => 'feature-widget-area',
		'description' => __( 'The feature widget above the sidebars in Content-Sidebar-Sidebar and Sidebar-Sidebar-Content layouts', 'martin' ),
		'before_widget' => '<div class="infobox">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 4, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'First Footer Widget Area', 'martin' ),
		'id' => 'first-footer-widget-area',
		'description' => __( 'The first footer widget area', 'martin' ),
		'before_widget' => '<div class="infobox">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 5, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Second Footer Widget Area', 'martin' ),
		'id' => 'second-footer-widget-area',
		'description' => __( 'The second footer widget area', 'martin' ),
		'before_widget' => '<div class="infobox">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 6, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Third Footer Widget Area', 'martin' ),
		'id' => 'third-footer-widget-area',
		'description' => __( 'The third footer widget area', 'martin' ),
		'before_widget' => '<div class="infobox">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

	// Area 7, located in the footer. Empty by default.
	register_sidebar( array(
		'name' => __( 'Fourth Footer Widget Area', 'martin' ),
		'id' => 'fourth-footer-widget-area',
		'description' => __( 'The fourth footer widget area', 'martin' ),
		'before_widget' => '<div class="infobox">',
		'after_widget' => '</div>',
		'before_title' => '<h3>',
		'after_title' => '</h3>',
	) );

}
/** Register sidebars by running martin_widgets_init() on the widgets_init hook. */
add_action( 'widgets_init', 'martin_widgets_init' );

/**
 * Removes the default styles that are packaged with the Recent Comments widget.
 *
 * @since Martin 1.0
 */
function martin_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action( 'wp_head', array( $wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style' ) );
}
add_action( 'widgets_init', 'martin_remove_recent_comments_style' );

if ( ! function_exists( 'martin_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post—date/time and author.
 *
 * @since Martin 1.0
 */
function martin_posted_on() {
	printf( __( '<span class="%1$s">Posted on</span> %2$s <span class="meta-sep">by</span> %3$s', 'twentyten' ),
		'meta-prep meta-prep-author',
		sprintf( '<a href="%1$s" title="%2$s" rel="bookmark"><span class="entry-date">%3$s</span></a>',
			get_permalink(),
			esc_attr( get_the_time() ),
			get_the_date()
		),
		sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s">%3$s</a></span>',
			get_author_posts_url( get_the_author_meta( 'ID' ) ),
			sprintf( esc_attr__( 'View all posts by %s', 'twentyten' ), get_the_author() ),
			get_the_author()
		)
	);
}
endif;

if ( ! function_exists( 'martin_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 * @since Martin 1.0
 */
function martin_posted_in() {
	// Retrieves tag list of current post, separated by commas.
	$tag_list = get_the_tag_list( '', ', ' );
	if ( $tag_list ) {
		$posted_in = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'martin' );
	} elseif ( is_object_in_taxonomy( get_post_type(), 'category' ) ) {
		$posted_in = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'martin' );
	} else {
		$posted_in = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', 'martin' );
	}
	// Prints the string, replacing the placeholders.
	printf(
		$posted_in,
		get_the_category_list( ', ' ),
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
}
endif;

/**
 *  Returns the current Martin color scheme as selected in the theme options
 *
 * @since Martin 1.0
 */
function martin_current_color_scheme() {
	$options = get_option( 'martin_theme_options' );

	return $options['color_scheme'];
}

/**
 * Register our color schemes and add them to the queue
 */
/*function martin_color_registrar() {

}
add_action( 'wp_print_styles', 'martin_color_registrar' );*/

/**
 *  Returns the current Martin layout as selected in the theme options
 *
 * @since Martin 1.0
 */
function martin_current_layout() {
	$options = get_option( 'martin_theme_options' );
	$current_layout = $options['theme_layout'];

	$two_columns = array( 'content-sidebar', 'sidebar-content' );


	if ( in_array( $current_layout, $two_columns ) )
		return 'two-column ' . $current_layout;
	else
		return 'three-column ' . $current_layout;
}

/**
 *  Adds martin_current_layout() to the array of body classes
 *
 * @since Martin 1.0
 */
function martin_body_class($classes) {
	$classes[] = martin_current_layout();

	return $classes;
}
add_filter( 'body_class', 'martin_body_class' );

function martin_secondary_nav()
{
?>
<ul>
<li><?php echo date('l F d Y');?></li>
<?php wp_register(); ?>
<li><?php wp_loginout(); ?></li>
</ul>
<?php
}