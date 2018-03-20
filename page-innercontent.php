<?php get_header(); ?>

  
<!-- top-slider-section-->


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


<!--search area-->

<section id="search-area">

    <div class="search-top-head">

            <div class="container">

                <div class="row">

                    <div class="col-md-12">

                        <img src=" <?php echo get_template_directory_uri (); ?>/img/get-price.png" alt="some">

                        <h2>Find Bargains From Over <span>5,000 Auction Sources</span></h2>

                    </div>

                </div>

            </div>

        </div>

    <div class="container">

        <div class="row search-row">

            <div class="col-xs-12 col-sm-6 search-img">

                <div class="img-selected"><img name='image-swap' src="http://carauctioninc.us.tempcloudsite.com/car/wp-content/uploads/2016/04/begin-1.gif" alt="some">
                <div id="imgc">
                


                </div>





<script type="text/javascript">
var pictureList = [];
 

<?php

$terms = get_terms( 'vehical' , array( 'parent' => 0 ) );
$count = count( $terms );

if ( $count > 0 ) {
    foreach ( $terms as $term ) {

    if (function_exists('get_wp_term_image'))
        {
            $i++;
            $meta_image = get_wp_term_image($term->term_taxonomy_id ); 
   
            echo  'pictureList['.$term->term_id.'] =' . '"'.$meta_image.'"; ';

        }}
}
?>


</script>





                </div>

            </div>

            <?php get_search_form( ); ?>

        </div>

    </div>



</section>

<!--/search area-->

<!--form-details-->



<section id="search-result-area">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center title">

                <h2>CURRENT AUCTION SEARCH RESULT</h2>

                <p>The Below Auction Data Queried on: Sun Mar 20 2016 : 16:08:14 EST</p>
                <div class="innep-p"><p>
                    Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. <br><br>

Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. <br><br>

Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. Some content will go here. 
                </p></div>

            </div>

        </div>

    </div>

    <!-- /.container -->

</section>

    

<?php get_footer(); ?>