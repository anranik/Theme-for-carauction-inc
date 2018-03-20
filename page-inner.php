<?php get_header(); ?>

  

 
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

            </div>

        </div>
        <div class="row">
            <div class="col-md-12 search-result">
                <table class="table">
                    <tr>
                        <th>YEAR</th>
                        <th>MAKE</th>
                        <th>MODEL</th>
                        <th>COLOR</th>
                        <th>BID</th>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                    <tr>
                        <td>2016</td>
                        <td>Ford</td>
                        <td>Sedan</td>
                        <td>Green</td>
                        <td>$932</td>
                    </tr>
                </table>
                <div class="get-mebrsp-btn">
                        <a href=""><button class="btn">Activate Your Membership Today!</button></a>
                    </div>
                    <!-- /.col-md-12 -->
            </div>
        </div>
                <div class="row promo">
                <div class="col-md-6">
                    <ul class="left-item">
                        <li>No Special License Required to Participate! </li>
                        <li>Open to all in the General Public Online! </li>
                        <li>Prices 90% Under Kelly Bluebook Cost! </li>
                        <li>+5000 Government Auction Sources w/ Growing Inventories!</li>
                        <li>Vehicles with only 1000 miles selling for $500! </li>
                        <li>Both Online and In Person Seized Auto Auctions Available!</li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="right-item">
                        <li>All Makes and Models, Sports Car, SUVs, Sedans, Trucks,</li>
                        <li>Luxury Vehicles, Vans, Motorcycles, Motor homes and more!</li>
                        <li>Pickup the Car of your Dreams at the Auction Outlet in your City!</li>
                        <li>Bonus: Seized Property & Goods Auctions Available!<br>
                        (Includes Boats, Land, Electronics, Jewelry, Furniture)</li>
                        <li>All for Pennies on the Dollar! CHEAP and must go!</li>
                    </ul>
                    
                </div>
                    
                </div>
                <!-- /.row -->

    </div>

    <!-- /.container -->

</section>



<!--/form-details-->


    <div id="activate-mebr">
        <div class="container">
            <div class="row">
                <div class="col-md-12 act-m-cont">
                    <h3>Membership Gives You Access to Auctions with:</h3>
                    <ul>
                        <li>Seized Surplus Cars, Trucks, Motorcycles, Boats </li>
                        <li>Seized Surplus Real Estate Property </li>
                        <li>Seized Surplus Electronics of all kinds </li>
                        <li>PLUS MORE ... All At Discounted Liquidation Prices!</li>
                    </ul>
                    <h1>Order Today! Packages starting at $9.99!</h1>
                    
                    <div class="get-mebrsp-btn">
                        <a href=""><button class="btn">Activate Your Membership Today!</button></a>
                    </div>




                </div>
                <!-- /.col-md-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </div>


    

<?php get_footer(); ?>