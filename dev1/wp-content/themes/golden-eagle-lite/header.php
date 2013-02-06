<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 */
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title>
			<?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?>
		</title>  
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo('stylesheet_url'); ?>" />
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!--Start Container-->
<div class="container">
  <div class="sixteen columns">
    <!--Start Main Container-->
    <div class="main_container">
      <!--Start Header-->
        <!--Start Social Logo-->
                <div class="social-links">
        <div class="eight columns alpha">
      <ul class="social_logos">
          <?php if (goldeneagle_get_option('goldeneagle_facebook') != '') { ?>
                            <li><a href="<?php echo goldeneagle_get_option('goldeneagle_facebook'); ?>" title="Share On Facebook"><img src="<?php echo get_template_directory_uri(); ?>/images/fb.png" /></a></li>
                        <?php } ?>  
          <?php if (goldeneagle_get_option('goldeneagle_twitter') != '') { ?>
                            <li><a href="<?php echo goldeneagle_get_option('goldeneagle_twitter'); ?>" title="Follow Us On Twitter"><img src="<?php echo get_template_directory_uri(); ?>/images/tw.png" /></a></li>
                        <?php } ?> 
          <?php if (goldeneagle_get_option('goldeneagle_rss') != '') { ?>
                            <li><a href="<?php echo goldeneagle_get_option('goldeneagle_rss'); ?>" title="Rss Feed"><img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" /></a></li>
                        <?php } ?>  
            <?php if (goldeneagle_get_option('goldeneagle_google') != '') { ?>
                            <li><a href="<?php echo goldeneagle_get_option('goldeneagle_google'); ?>" title="Gtalk"><img src="<?php echo get_template_directory_uri(); ?>/images/sms.png" /></a></li>
                        <?php } ?>       
        </ul>
        </div>
        <div class="eight columns omega">
        <div class="top-search">
          <?php get_search_form(); ?>
        </div>
        </div>
        </div>
        <!--End Social Logo-->
        <div class="clear"></div>
      <div class="header">
        <div class="six columns alpha">
          <!--Start Logo-->
         <div class="logo"> <a href="<?php echo home_url(); ?>"><img src="<?php if (goldeneagle_get_option('goldeneagle_logo') != '') { ?><?php echo goldeneagle_get_option('goldeneagle_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
          <!--End Logo-->
        </div>
        <div class="ten columns omega">
    <!--Start Menu_Wrapper-->
    <div class="menu_wrapper">
      <?php goldeneagle_nav(); ?>
    </div>
    <!--End Menu Wrapper-->
        </div>
      </div>
      <!--End Header-->
      <div class="clear"></div>