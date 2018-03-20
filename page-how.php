<?php
if ( is_user_logged_in() ) {
    get_header('member');
} else {
    get_header();
}
?>

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




<!--form-details-->



<section id="how-it-works">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center title">

                <h2>How it Works</h2>

            </div>

        </div>
        <div class="row">
            <div class="col-sm-12 how-text">
            <img src=" <?php echo get_template_directory_uri (); ?>/img/how-car.jpg" alt="">
                <p>Every day the government, banks and various organizations take possession of seized cars, trucks, vans, motorcycles and more. The volume of these seized properties are so high  that a fast and constant way to empty their inventories is in place. To do this auctions are held nationwide that empty inventories at discounted prices. Vehicles with prices up to 90% under blue book value are auctioned off every day.<br><br>

The good news is that every citizen has a right to these car auctions.<br><br>

The bad news is that not everyone actually has access to these auctions, or let alone knows where they are held. You are probably one of those persons.<br><br>

Auctions are not advertised on the radio, television or newspaper for the general public to find and join. And for those who take advantage of these auctions they are just fine with you not being a part of the action.</p><br>
                
            </div>
        </div>



    </div>

    <!-- /.container -->

</section>
<!-- the solution -->
<section id="the-solution">

    <div class="container">

        <div class="row">

            <div class="col-md-12 text-center title">

                <h2>The Solution</h2>

            </div>

        </div>
        <div class="row">
            <div class="col-sm-12 how-text">
            <img src=" <?php echo get_template_directory_uri (); ?>/img/how-car.png" alt="">
                <p>This is where a Car Auction Inc membership will help you. Our membership service allows you to join the action and find the vehicle you want to own and pay way below the suggested cost of the car at an auction. Just imagine finding the car of your dreams or even beyond those dreams at a price well within your budget.

Finding your Desired Car at an Auction

Using the "Get a price" form on our front page you get started by selecting the type of car, manufacturer, country, state and zip code of your residence. Then you press the "Go" button.</p><br>
                
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 car-details-demo">
                <p>The results you see is designed to show you a sample of the potential savings you can achieve by joining CarAuctionInc.com.</p>
                <p>
                    <img src=" <?php echo get_template_directory_uri (); ?>/img/card-detail-demo.jpg" alt="">
                </p>
                <p style="font-size: 16px">After you see the potential savings available to you, you will undoubtedly be ready to become a member of CarAuctionInc and see the locations that are auctioning off vehicles at bargain basement prices . Go ahead and take full advantage of the savings you're entitled to!
                    
                    <br>
                    <br>
                    From here all you need to do is setup a membership and you are on your way to the next auction in your area that has the car of your dreams at an easily affordable price!</p>
            </div>
            <!-- /.col-md-12 -->
        </div>
        <!-- /.row -->


    </div>

    <!-- /.container -->
    <div class="get-mebrsp-btn">
                        <a href="<?php echo get_home_url(); ?>"><button class="btn">Get A Price </button></a>
                    </div>

</section>



<!--/form-details-->

    

<?php get_footer(); ?>