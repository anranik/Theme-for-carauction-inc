<?php
/*
Template Name: Archives
*/
 get_header("member"); ?>
<div class="container">
<div class="row"  style="padding: 50px 0px; ">
	<div class="col-md-8">

		
		<?php if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
			</header><!-- .page-header -->
			
	
		   <?php while(have_posts()) : the_post(); ?>
			<div id="post-<?php the_ID(); ?>"  class="up_post">
			
				<a href="<?php the_permalink(); ?>"><?php the_title('<h2>','</h2>'); ?></a>
				<span class="ar_img"><?php the_post_thumbnail( ); ?></span>
		 		<?php the_excerpt(); ?>
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