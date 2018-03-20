
<?php
if ( is_user_logged_in() ) {
    header('Location:http://carauctioninc.us.tempcloudsite.com/car/memberflow/');
} else {
    get_header();
}
?>
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



<section id="form-details">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center title">
           

                <h2>Looking for <span>Government Seized</span> Car Auctions!</h2>

                <p>Getting started is as easy as 1, 2, 3. Follow these simple instructions to get started finding quality cheap cars.</p>

            </div>

        </div>
        

        <div class="row">

            <div class="col-md-12 post">

                <table>
                 <?php $query = new WP_Query( array( 'category_name' => 'form-details', 'order' => 'ASC' ) ); 



while ( $query->have_posts() ) {
    $query->the_post();


?>



                                <tr>

                                    <td >
                                        <div class="cl-img">
                                            <?php the_post_thumbnail(); ?>
                                        </div>
                                       <div class="cl-text">
                                            <h2><?php the_title(); ?></h2>
                                           
                                           <p><?php the_content(); ?></p>
                                       </div>

                                    </td>

                                </tr>
                            <?php  wp_reset_postdata(); } ?>

                   

                    

                </table>

            </div>

        </div>



    </div>

    <!-- /.container -->

</section>



<!--/form-details-->

<!--footer_widget_area-->



<div id="footer_widget_area">



    <div class="container fo-content">

        <div class="row">







<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
    <ul id="sidebar">
        <?php dynamic_sidebar( 'sidebar-1' ); ?>
    </ul>
<?php endif; ?>










        </div>


        <div class="row">

            <?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
    <ul id="sidebar">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
    </ul>
<?php endif; ?>


        </div>
        <div class="row to-search-tar">
            <a href="#search-area"><button class="btn btn-primary btn-lg">Get a Price</button></a>
        </div>

    </div>

</div>

<!--/footer_widget_area-->

    

<?php get_footer(); ?>