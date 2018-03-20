<?php get_header(''); ?>

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

                <div class="col-xs-12 col-sm-12 col-md-9 content-area">
                <h2 class="auction-title" style="text-transform: uppercase;">FREQUENTLY ASKED QUESTIONS

</h2>
<p>Select the category below that closet matches your question:</p>
                     <!-- post -->
                   <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
  <?php $query = new WP_Query( array( 'category_name' => 'faq' ) ); 



while ( $query->have_posts() ) {
    $query->the_post();
    $i++; 
//$feat_image = the_post_thumbnail();


?>

<!--panel-->
 <div class="panel panel-default">
    <div class="panel-heading" role="tab" id="heading<?php echo $i ?>">
      <h4 class="panel-title">
        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="false" aria-controls="collapse<?php echo $i; ?>">
          <?php the_title( ); ?>
        </a>
      </h4>
    </div>
    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
      <div class="panel-body">
        <?php the_content( ); ?>
      </div>
    </div>
       
  </div>


  <!-- panel -->
  

<?php wp_reset_postdata(); } ?>
  <div class="get-mebrsp-btn">
                        <a href="<?php echo get_home_url(); ?>"><button class="btn">Get A Price </button></a>
                    </div>

  <!-- panel -->
</div>



         
                    <!-- post -->
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