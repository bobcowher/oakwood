<?php
/*
 * Template - footer.php
 *
 * @package 		WordPress
 * @subpackage 		Tweaker3
 * @author 			Arnold Goodway
 * @license 		GNU General Public License v2.0 [http://www.gnu.org/licenses/gpl-2.0.html]
 * @since 			Version 1.0.1
 * @alter 			Version 1.0.4
 *
 * This template is called from many other templates.
 * The 3 footer widget areas and the main footer itself are set in this template.
 * Any content you need to show in the mentioned widget areas has to be inserted via the widgets page in the back-end.
 * Child Theme - This template may be duplicated inside a child theme and edited there.
 */
?>
			<div id="footer-container">
            
				<div id="footer-left">
					<?php dynamic_sidebar( 'footer-left' ); ?>
				</div><?php // end #footer-left ?>
                
				<div id="footer-center">
					<?php dynamic_sidebar( 'footer-center' ); ?>
				</div><?php // end #footer-center ?>
                
				<div id="footer-right">
					<?php dynamic_sidebar( 'footer-right' ); ?>
				</div><?php // end #footer-right ?>
			
            </div><?php // end #footer-container ?>
			
			<div id="footer-bottom">
				<?php // It is completely optional, but if you like the theme I would appreciate it if you keep the following credit link in the footer. ?>
				<p><?php _e( 'Copyright', 'tweaker3' ); ?> &copy; <?php echo date( 'Y' ); ?> <?php bloginfo( 'name' ); ?> | 
				<?php printf( __( 'Powered by %1$s and %2$s', 'tweaker3' ), '<a href="http://wordpress.org/">WordPress</a>', '<a href="http://tweaker.co.za/">Tweaker3</a>' ); ?></p> 
			</div><?php // end #footer-bottom ?>
		
		</div><?php // end #wrapper ?>
		
		<?php wp_footer(); ?>
	
	</body>
	
</html>