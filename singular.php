
<?php
if ( is_user_logged_in() ) {
     get_header('member');
} else {
    get_header('pages');
  
}
?>



<div class="container">
<div class="row"  style="padding: 50px 0px; ">
	<div class="col-md-8">

		<?php if(have_posts()) : ?>
		   <?php while(have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php echo get_the_post_thumbnail(); ?>
				<?php the_title('<h2>','</h2>'); ?>
		 		<?php the_excerpt(); ?>
		 		<a href="http://carauctioninc.us.tempcloudsite.com/car/m_level/" >Get membership to get full access</a>
			</div>
			<?php
			if (is_singular()) {
				// support for pages split by nextpage quicktag
				wp_link_pages();

				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

				/*// Previous/next post navigation.
				the_post_navigation( array(
					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentyfifteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Next post:', 'twentyfifteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentyfifteen' ) . '</span> ' .
						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentyfifteen' ) . '</span> ' .
						'<span class="post-title">%title</span>',
				) );

				// tags anyone?
				the_tags();*/
			}
			?>
		   <?php endwhile; ?>

		<?php if (!is_singular()) : ?>
			<div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
			<div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
		<?php endif; ?>

		<?php else : ?>

		<div class="alert alert-info">
		  <strong>No content in this loop</strong>
		</div>

		<?php endif; ?>
	</div>

	<div class="col-md-4 sidebar-area">
                <div class="sidebar-content">

		<?php
		 if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-page')) : //  Sidebar name
		?>
		<?php
		     endif;
		?>
				</div>
	</div>


</div>


</div>

<!-- /container -->
<?php get_footer(); ?>