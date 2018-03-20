

<?php
if ( is_user_logged_in() ) {
     get_header('member');
} else {
   header('Location:http://carauctioninc.us.tempcloudsite.com/car/mlogin');
}
?>

<section id="slider-wf">        

     <div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
   <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#carousel-inner" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-inner" data-slide-to="1"></li>
        <li data-target="#carousel-inner" data-slide-to="2"></li>
        <li data-target="#carousel-inner" data-slide-to="3"></li>
      </ol>
        
<div class="container">
  <!-- Wrapper for slides -->

                      <div class="carousel-inner " role="listbox"> 


<?php
$custom_post_type = 'member_slider';
$slides =array(
  'post_type' => $custom_post_type,
  'post_status' => 'publish',
  'posts_per_page' => 4
);

$query = new WP_Query($slides ); 



while ( $query->have_posts() ) {
    $query->the_post();
    $i++; 



?>

<!--item-->

    <div class="item <?php if($i == 1){echo "active";} ?>">

      <?php $feat_image = the_post_thumbnail(); echo $feat_image ; ?>
            <?php $meb_slider_logo = get_post_meta( $post->ID, 'car_member_s_logo', true ); ?>

                          <div class="carousel-caption visible-md visible-lg">

                            <img class="caption-logo" src="<?php echo($meb_slider_logo) ?>" alt="carauction">

                            <h1><?php the_title( ); ?></h1>
                            <?php the_content( ); ?>
                            <a href="<?php the_permalink(); ?>"><button class="btn">LEARN MORE</button></a>

                          </div>
    </div>
    <!-- /item -->

<?php wp_reset_postdata(); } ?>
<!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control " href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>


                    </div>

</div>
<!-- container -->

</div>

</section>

<!-- /top-slider-section-->
<!-- /top-slider-section-->




<!--form-details-->


<!--footer_widget_area-->



<section id="post-wf-area">
        <div class="container">
            <div class="content-up">
             
             
             <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-9 content-area">
                <h2 class="auction-title">Upcoming Auction</h2>
                     <!-- post -->

                     <?php $query = new WP_Query( array( 'post_type' => 'upcoming_auction', 'order' => 'ASC' ) ); 



while ( $query->have_posts() ) {
    $query->the_post();


?>
 <div class="col-xs-12 col-sm-6 col-md-4 single-post">
                        <?php the_post_thumbnail(); ?>
                        <h3><a href="<?php the_permalink(); ?>"><?php the_title( ); ?></a><br> <span class="date"><?php echo get_the_date(); ?></span></h3>
                        <p class="content">
                            <?php the_content( ); ?>
                        </p>
                        <a href="<?php the_permalink(); ?>"><button class="btn">Click here for more info</button></a>
                    </div>
                    <!-- post -->



                            <?php   wp_reset_postdata(); } ?>
             
          
                
                </div>

                 <div class="col-xs-12 col-sm-12 col-md-3 sidebar-area">
                     <div class="sidebar-content">
                         <?php
		 if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-page')) : //  Sidebar name
		?>
		<?php
		     endif;
		?>
                     </div>
                     <!-- /.sidebar-content -->
                 </div>
             </div>
            </div>
        </div>
</section>

<!--/footer_widget_area-->




<?php get_footer(); ?>