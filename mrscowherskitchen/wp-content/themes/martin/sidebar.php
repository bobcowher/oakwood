<?php
/**
 * @package WordPress
 * @subpackage Martin
 * @since Martin 1.0
 */
?>

		<?php
			/* If the current layout is a 3-column one with 2 sidebars on the right or left
			 * Martin enables a "Feature Widget Area" that should span both sidebar columns
			 * and adds a containing div around the main sidebars for the content-sidebar-sidebar
			 * and sidebar-sidebar-layouts so the layout holds together with a short content area and long featured widget area
			 */
			$options = get_option( 'martin_theme_options' );
			$current_layout = $options['theme_layout'];
			$feature_widget_area_layouts = array( 'content-sidebar-sidebar', 'sidebar-sidebar-content' );

			if ( in_array( $current_layout, $feature_widget_area_layouts ) ) :
		?>
		<div id="main-sidebars">

		<?php if ( is_active_sidebar( 'feature-widget-area' ) ) : ?>

		<div id="feature" class="widget-area" role="complementary">
			<ul class="xoxo">
				<?php dynamic_sidebar( 'feature-widget-area' ); ?>
			</ul>
		</div><!-- #feature.widget-area -->

		<?php endif; // ends the check for the current layout that determines the availability of the feature widget area ?>

		<?php endif; // ends the check for the current layout that determines the #main-sidebars markup ?>

		<div id="primary" class="widget-area" role="complementary">
			<ul class="xoxo">

			<?php // The primary sidebar used in all layouts
			if ( ! dynamic_sidebar( 'sidebar-1' ) ) : ?>

		


				<div class="infobox">
					<h3><?php _e( 'Recent Entries', 'martin' ); ?></h3>
						<ul>
							<?php
							$recent_entries = new WP_Query();
							$recent_entries->query( 'order=DESC&posts_per_page=10' );

							while ($recent_entries->have_posts()) : $recent_entries->the_post();
								?>
								<li><a href="<?php the_permalink() ?>"><?php the_title() ?></a></li>
								<?php
							endwhile;							
							?>
						</ul>
				</div>


				<div class="infobox">
					<h3><?php _e( 'Links', 'martin' ); ?></h3>
						<ul>
							<?php wp_list_bookmarks( array( 'title_li' => '', 'categorize' => 0 ) ); ?>
						</ul>
				</div>

			<?php endif; // end primary widget area ?>
			</ul>
		</div><!-- #primary .widget-area -->

		<?php
			/* If the current layout is a 3-column one, Martin enables a second widget area called Secondary Widget Area
			 * This widget area will not appear for two-column layouts
			 */
			$secondary_widget_area_layouts = array( 'content-sidebar-sidebar', 'sidebar-sidebar-content', 'sidebar-content-sidebar' );
			if ( in_array( $current_layout, $secondary_widget_area_layouts ) ) :
		?>
		<div id="secondary" class="widget-area" role="complementary">
			<ul class="xoxo">
			<?php // A second sidebar for widgets. Martin uses the secondary widget area for three column layouts.
			if ( ! dynamic_sidebar( 'secondary-widget-area' ) ) : ?>


				<div class="infobox">
					<h3><?php _e( 'Meta', 'martin' ); ?></h3>
					<ul>
						<?php wp_register(); ?>
						<li><?php wp_loginout(); ?></li>
						<?php wp_meta(); ?>
					</ul>
				</div>


			<?php endif; ?>
			</ul>
		</div><!-- #secondary .widget-area -->
		<?php endif; // ends the check for the current layout that determins if the third column is visible ?>

		<?php
			// add a containing div around the main sidebars for the content-sidebar-sidebar and sidebar-sidebar-layouts
			// so the layout holds together with a short content area and long featured widget area
			if ( in_array( $current_layout, $feature_widget_area_layouts ) )
				echo '</div><!-- #main-sidebars -->';
		?>
