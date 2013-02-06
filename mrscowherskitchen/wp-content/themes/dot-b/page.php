<?php get_header(); ?>
<div id="main">
	<div id="content">
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2 class="post_title_h2"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<div class="post_info_top">
				<div class="post_info_date"> <?php printf( __('Posted on %s ', 'dot-b'), get_the_date(get_option( 'date_format' ))); ?></div>
				<div class="post_info_author"> <?php _e('by', 'dot-b'); ?> <?php the_author_posts_link(); ?></div>
				<?php edit_post_link(__('[ Edit ]', 'dot-b'),'<span class="post_info_edit">','</span>'); ?>
			</div>
			<div class="post_content">
				<?php the_content(); ?>
				<?php wp_link_pages('before=<div id="page-links">&after=</div>'); ?>
			</div>
		</div>
		<div class="post_info_bootom">
			<div class="post_meta"><?php the_tags('<ul><li>','</li><li>','</li></ul>'); ?></div>  
			<div class="post_readmore"><?php comments_popup_link(__('Leave a Reply ?', 'dot-b'),__('[ 1 Reply ]', 'dot-b'),__('[ % Replies ]', 'dot-b'), '', ''); ?></div>	
		</div>		
	<?php endwhile; else: ?>
		<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">
			<h2 class="post_title_h2"><?php _e('Nothing Found', 'dot-b'); ?></h2>
		</div>
	<?php endif; ?>
		<div id="comments">
		 <?php comments_template( '', true ); ?>
		</div>
	</div><!-- #content -->
<?php get_sidebar(); ?>
<div class="clear"></div>
</div><!-- #main -->
<?php get_footer(); ?>