
<?php get_header('trust'); ?>

<section id="main-slider">        

     <div id="myCarousel" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->





  <!-- Wrapper for slides -->

  <div class="carousel-inner " role="listbox">

 <?php $query = new WP_Query( array( 'category_name' => 'homeslider' ) ); 



while ( $query->have_posts() ) {
    $query->the_post();
    $i++; 
//$feat_image = the_post_thumbnail();


?>

<!--item-->

    <div class="item <?php if($i == 1){echo "active";} ?>" >

      <?php echo the_post_thumbnail() ; ?>

      <div class="carousel-caption">

        <h1><?php the_title(); ?></h1>

      </div>

    </div>
    <!-- /item -->

<?php wp_reset_postdata(); } ?>






</div>



</div>

</section>

<!-- /top-slider-section-->
<!-- /top-slider-section-->


<section id="post-wf-area">
        <div class="container">
            <div class="content-up">
             
             
             <div class="row">

                <div class="col-xs-12 col-sm-12 col-md-8 content-area col-md-offset-2 ">
                <h2 class="auction-title" style="text-transform: uppercase;"><?php the_title( ); ?></h2>
                     <!-- post -->

                    <?php the_content( ); ?>  
                    
                    <!-- post -->
                </div>

             </div>
            </div>
        </div>
</section>





<!--/footer_widget_area-->
<?php get_footer(); ?>