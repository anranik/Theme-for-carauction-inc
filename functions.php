<?php


//Add thumbnail, automatic feed links and title tag support
add_theme_support( 'post-thumbnails' );
add_theme_support( 'automatic-feed-links' );
add_theme_support( 'title-tag' );
add_theme_support( 'html5', array( 'search-form' ) );

//Add content width (desktop default)
if ( ! isset( $content_width ) ) {
    $content_width = 768;
}

//Add menu support and register main menu
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
      array(
        'footer_menu' => 'Footer Menu'
      )
    );
}
///change the logo
function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/img/logo.png);
            padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );


function my_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'my_login_logo_url' );

function my_login_logo_url_title() {
    return 'Home of carauction';
}
add_filter( 'login_headertitle', 'my_login_logo_url_title' );



//excerpt lengt

function new_excerpt_length($length) {
    return 40;
}
add_filter('excerpt_length', 'new_excerpt_length');

// Replaces the excerpt "Read More" text by a link
function new_excerpt_more($more) {
       global $post;
    return '<a class="moretag" href="'. get_permalink($post->ID) . '"> Read More...</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');

//Add menu support and register main menu
if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
          'top-menu-member' => 'Member Menu'
        )
    );
}

// theme text domain_existsadd_action('after_setup_theme', 'my_theme_setup');
function my_theme_setup(){
    load_theme_carauction('carauction', get_template_directory() . '/languages');
}


/*-------------------------------------------------------
      *     Include the TGM Plugin Activation class
*-------------------------------------------------------*/
  define('BANR_FUNCTIONS', get_template_directory()  . '/lib');
include_once(BANR_FUNCTIONS.'/tgm-plugin-activation/class-tgm-plugin-activation.php'); // Plugin Activation Class
include_once(BANR_FUNCTIONS.'/tgm-plugin-activation/tgm-plugin-activator.php'); // Plugin Activator
include_once(BANR_FUNCTIONS.'/cmb2/init.php'); // Plugin Activator
include_once(BANR_FUNCTIONS.'/cmb2/metabox.php'); // Plugin Activator

// meta box intrigation








 // advance search setup
/*require_once('wp-advanced-search/wpas.php');
 function my_search_form() {
    $args = array();
    $args['fields'][] = array(
                          'type' => 'generic',
                          'id' => 'color',
                          'format' => 'select',
                          'values' => array('red' => 'Red', 'blue' => 'Blue')
                    );
    $args['fields'][] = array(
                          'type' => 'generic',
                          'id' => 'color2',
                          'format' => 'select',
                          'values' => array('red' => 'Red', 'blue' => 'Blue')
                    );
    $args['fields'][] = array(
                          'type' => 'generic',
                          'id' => 'color3',
                          'format' => 'select',
                          'values' => array('red' => 'Red', 'blue' => 'Blue')
                    );
    $args['fields'][] = array('type' => 'taxonomy',
                              'taxonomy' => 'category',
                              'format' => 'select');
    $args['wp_query'] = array('post_type' => 'submit');
    register_wpas_form('my-form', $args);    
}
add_action('init', 'my_search_form');
*/
function wpse_load_custom_search_template(){
    if( isset($_REQUEST['search']) == 'advanced' ) {
        require('advanced-search-result.php');
        die();
    }
}
add_action('init','wpse_load_custom_search_template');
///////////////////


function implement_ajax() {
if(isset($_POST['main_catid']))
    {
    $categories=  get_categories('child_of='.$_POST['main_catid'].'&hide_empty=0'.'&taxonomy=country');
      $categories_vehical=  get_categories('child_of='.$_POST['main_catid'].'&hide_empty=0'.'&taxonomy=vehical');
      foreach ($categories as $cat) {
        $option .= '<option value="'.$cat->term_id.'">';
        $option .= $cat->cat_name;
        $option .= '</option>';
      }

      foreach ($categories_vehical as $cat) {
        $option .= '<option value="'.$cat->term_id.'">';
        $option .= $cat->cat_name;
        $option .= '</option>';
      }
      echo '<option value="" selected="selected">Select</option>'.$option;
    die();
    } // end if
}
add_action('wp_ajax_my_special_ajax_call', 'implement_ajax');
add_action('wp_ajax_nopriv_my_special_ajax_call', 'implement_ajax');



/// for vehical autosub category


// register post type for car
/**
 * Register a custom post type called "car".
 *
 * @see get_post_type_labels() for label keys.
 */
/*function anr_codex_car_init() {
    $labels = array(
        'name'                  => _x( 'Car', 'Post type general name', 'carauction' ),
        'singular_name'         => _x( 'car', 'Post type singular name', 'carauction' ),
        'menu_name'             => _x( 'cars', 'Admin Menu text', 'carauction' ),
        'name_admin_bar'        => _x( 'car', 'Add New on Toolbar', 'carauction' ),
        'add_new'               => __( 'Add New', 'carauction' ),
        'add_new_item'          => __( 'Add New car', 'carauction' ),
        'new_item'              => __( 'New car', 'carauction' ),
        'edit_item'             => __( 'Edit car', 'carauction' ),
        'view_item'             => __( 'View car', 'carauction' ),
        'all_items'             => __( 'All cars', 'carauction' ),
        'search_items'          => __( 'Search cars', 'carauction' ),
        'parent_item_colon'     => __( 'Parent cars:', 'carauction' ),
        'not_found'             => __( 'No cars found.', 'carauction' ),
        'not_found_in_trash'    => __( 'No cars found in Trash.', 'carauction' ),
        'featured_image'        => _x( 'car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'carauction' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'archives'              => _x( 'car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'carauction' ),
        'insert_into_item'      => _x( 'Insert into car', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'carauction' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this car', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'carauction' ),
        'filter_items_list'     => _x( 'Filter cars list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'carauction' ),
        'items_list_navigation' => _x( 'cars list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'carauction' ),
        'items_list'            => _x( 'cars list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'carauction' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'car' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
    );
 
    register_post_type( 'car', $args );
}
 
add_action( 'init', 'anr_codex_car_init' );*/

// register post type for car
/**
 * Register a custom post type called "car".
 *
 * @see get_post_type_labels() for label keys.
 */
function anr_codex_upcoming_auction_init() {
    $labels = array(
        'name'                  => _x( 'upcoming_auction', 'Post type general name', 'carauction' ),
        'singular_name'         => _x( 'upcoming_auction', 'Post type singular name', 'carauction' ),
        'menu_name'             => _x( 'upcoming_auctions', 'Admin Menu text', 'carauction' ),
        'name_admin_bar'        => _x( 'upcoming_auction', 'Add New on Toolbar', 'carauction' ),
        'add_new'               => __( 'Add New', 'carauction' ),
        'add_new_item'          => __( 'Add New upcoming_auction', 'carauction' ),
        'new_item'              => __( 'New upcoming_auction', 'carauction' ),
        'edit_item'             => __( 'Edit upcoming_auction', 'carauction' ),
        'view_item'             => __( 'View upcoming_auction', 'carauction' ),
        'all_items'             => __( 'All upcoming_auctions', 'carauction' ),
        'search_items'          => __( 'Search upcoming_auctions', 'carauction' ),
        'parent_item_colon'     => __( 'Parent upcoming_auctions:', 'carauction' ),
        'not_found'             => __( 'No upcoming_auctions found.', 'carauction' ),
        'not_found_in_trash'    => __( 'No upcoming_auctions found in Trash.', 'carauction' ),
        'featured_image'        => _x( 'car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'carauction' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'archives'              => _x( 'car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'carauction' ),
        'insert_into_item'      => _x( 'Insert into upcoming_auction', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'carauction' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this upcoming_auction', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'carauction' ),
        'filter_items_list'     => _x( 'Filter upcoming_auctions list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'carauction' ),
        'items_list_navigation' => _x( 'upcoming_auctions list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'carauction' ),
        'items_list'            => _x( 'upcoming_auctions list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'carauction' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'upcoming_auction' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title','editor', 'thumbnail' ),
    );
 
    register_post_type( 'upcoming_auction', $args );
}
 
add_action( 'init', 'anr_codex_upcoming_auction_init' );


// register post type for car
/**
 * Register a custom post type real_state.
 *
 * @see get_post_type_labels() for label keys.
 */
function anr_codex_real_state_init() {
    $labels = array(
        'name'                  => _x( 'real_state', 'Post type general name', 'carauction' ),
        'singular_name'         => _x( 'real_state', 'Post type singular name', 'carauction' ),
        'menu_name'             => _x( 'real_states', 'Admin Menu text', 'carauction' ),
        'name_admin_bar'        => _x( 'real_state', 'Add New on Toolbar', 'carauction' ),
        'add_new'               => __( 'Add New', 'carauction' ),
        'add_new_item'          => __( 'Add New real_state', 'carauction' ),
        'new_item'              => __( 'New real_state', 'carauction' ),
        'edit_item'             => __( 'Edit real_state', 'carauction' ),
        'view_item'             => __( 'View real_state', 'carauction' ),
        'all_items'             => __( 'All real_states', 'carauction' ),
        'search_items'          => __( 'Search real_states', 'carauction' ),
        'parent_item_colon'     => __( 'Parent real_states:', 'carauction' ),
        'not_found'             => __( 'No real_states found.', 'carauction' ),
        'not_found_in_trash'    => __( 'No real_states found in Trash.', 'carauction' ),
        'featured_image'        => _x( 'car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'carauction' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'archives'              => _x( 'car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'carauction' ),
        'insert_into_item'      => _x( 'Insert into real_state', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'carauction' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this real_state', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'carauction' ),
        'filter_items_list'     => _x( 'Filter real_states list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'carauction' ),
        'items_list_navigation' => _x( 'real_states list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'carauction' ),
        'items_list'            => _x( 'real_states list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'carauction' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'real_state' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title','editor', 'thumbnail' ),
    );
 
    register_post_type( 'real_state', $args );
}
 
add_action( 'init', 'anr_codex_real_state_init' );

// register post type for car
/**
 * Register a custom post type resource.
 *
 * @see get_post_type_labels() for label keys.
 */
function anr_codex_resource_init() {
    $labels = array(
        'name'                  => _x( 'resource', 'Post type general name', 'carauction' ),
        'singular_name'         => _x( 'resource', 'Post type singular name', 'carauction' ),
        'menu_name'             => _x( 'resources', 'Admin Menu text', 'carauction' ),
        'name_admin_bar'        => _x( 'resource', 'Add New on Toolbar', 'carauction' ),
        'add_new'               => __( 'Add New', 'carauction' ),
        'add_new_item'          => __( 'Add New resource', 'carauction' ),
        'new_item'              => __( 'New resource', 'carauction' ),
        'edit_item'             => __( 'Edit resource', 'carauction' ),
        'view_item'             => __( 'View resource', 'carauction' ),
        'all_items'             => __( 'All resources', 'carauction' ),
        'search_items'          => __( 'Search resources', 'carauction' ),
        'parent_item_colon'     => __( 'Parent resources:', 'carauction' ),
        'not_found'             => __( 'No resources found.', 'carauction' ),
        'not_found_in_trash'    => __( 'No resources found in Trash.', 'carauction' ),
        'featured_image'        => _x( 'car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'carauction' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'archives'              => _x( 'car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'carauction' ),
        'insert_into_item'      => _x( 'Insert into resource', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'carauction' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this resource', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'carauction' ),
        'filter_items_list'     => _x( 'Filter resources list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'carauction' ),
        'items_list_navigation' => _x( 'resources list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'carauction' ),
        'items_list'            => _x( 'resources list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'carauction' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'resource' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title','editor', 'thumbnail' ),
    );
 
    register_post_type( 'resource', $args );
}
 
add_action( 'init', 'anr_codex_resource_init' );

// register post type for car
/**
 * Register a custom post type auction_houses.
 *
 * @see get_post_type_labels() for label keys.
 */
function anr_codex_auction_houses_init() {
    $labels = array(
        'name'                  => _x( 'auction_houses', 'Post type general name', 'carauction' ),
        'singular_name'         => _x( 'auction_houses', 'Post type singular name', 'carauction' ),
        'menu_name'             => _x( 'auction_housess', 'Admin Menu text', 'carauction' ),
        'name_admin_bar'        => _x( 'auction_houses', 'Add New on Toolbar', 'carauction' ),
        'add_new'               => __( 'Add New', 'carauction' ),
        'add_new_item'          => __( 'Add New auction_houses', 'carauction' ),
        'new_item'              => __( 'New auction_houses', 'carauction' ),
        'edit_item'             => __( 'Edit auction_houses', 'carauction' ),
        'view_item'             => __( 'View auction_houses', 'carauction' ),
        'all_items'             => __( 'All auction_housess', 'carauction' ),
        'search_items'          => __( 'Search auction_housess', 'carauction' ),
        'parent_item_colon'     => __( 'Parent auction_housess:', 'carauction' ),
        'not_found'             => __( 'No auction_housess found.', 'carauction' ),
        'not_found_in_trash'    => __( 'No auction_housess found in Trash.', 'carauction' ),
        'featured_image'        => _x( 'car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'carauction' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'archives'              => _x( 'car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'carauction' ),
        'insert_into_item'      => _x( 'Insert into auction_houses', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'carauction' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this auction_houses', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'carauction' ),
        'filter_items_list'     => _x( 'Filter auction_housess list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'carauction' ),
        'items_list_navigation' => _x( 'auction_housess list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'carauction' ),
        'items_list'            => _x( 'auction_housess list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'carauction' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'auction_houses' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title','editor', 'thumbnail' ),
    );
 
    register_post_type( 'auction_houses', $args );
}
 
add_action( 'init', 'anr_codex_auction_houses_init' );

/////////////////////////////////////
add_action( 'init', 'register_cpt_cars' );

function register_cpt_cars() {

  $labels = array(
    'name' => __( 'car', 'cars' ),
    'singular_name' => __( 'cars', 'cars' ),
    'add_new' => __( 'Add New Car', 'cars' ),
    'add_new_item' => __( 'Add New cars', 'cars' ),
    'edit_item' => __( 'Edit cars', 'cars' ),
    'new_item' => __( 'New cars', 'cars' ),
    'view_item' => __( 'View cars', 'cars' ),
    'search_items' => __( 'Search car', 'cars' ),
    'not_found' => __( 'No car found', 'cars' ),
    'not_found_in_trash' => __( 'No car found in Trash', 'cars' ),
    'parent_item_colon' => __( 'Parent cars:', 'cars' ),
    'menu_name' => __( 'Cars', 'cars' ),
  );

  $args = array(
    'labels' => $labels,
    'hierarchical' => false,
    'supports' => array( 'title','editor', 'thumbnail', 'custom-fields' ),
    'taxonomies' => array( 'country', 'state', 'city', 'car_types' ),
    'public' => true,
    'show_ui' => true,
    'show_in_menu' => true,
    'menu_position' => 10,
    'show_in_nav_menus' => true,
    'publicly_queryable' => true,
    'exclude_from_search' => true,
    'has_archive' => false,
    'query_var' => 'cutom_car',
    'can_export' => true,
    'rewrite' => true,
    'capability_type' => 'post'
  );

  register_post_type( 'cars', $args );
}








add_action( 'init', 'create_country_taxonomies', 0 );

function create_country_taxonomies() {
  // Add new taxonomy, make it hierarchical (like categories)
  $labels = array(
    'name'              => _x( 'Country', 'taxonomy general name' ),
    'singular_name'     => _x( 'Country', 'taxonomy singular name' ),
    'search_items'      => __( 'Search country' ),
    'all_items'         => __( 'All country' ),
    'parent_item'       => __( 'Parent country' ),
    'parent_item_colon' => __( 'Parent country:' ),
    'edit_item'         => __( 'Edit country' ),
    'update_item'       => __( 'Update country' ),
    'add_new_item'      => __( 'Add New country' ),
    'new_item_name'     => __( 'New country Name' ),
    'menu_name'         => __( 'Country' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'country' ),
  );

  register_taxonomy( 'country', array( 'cars' ), $args );

  // vehical_type texanonmy
  $labels = array(
    'name'              => _x( 'Vehical', 'taxonomy general name' ),
    'singular_name'     => _x( 'Vehical', 'taxonomy singular name' ),
    'search_items'      => __( 'Search Vehical' ),
    'all_items'         => __( 'All Vehical' ),
    'parent_item'       => __( 'Parent Vehical' ),
    'parent_item_colon' => __( 'Parent Vehical:' ),
    'edit_item'         => __( 'Edit Vehical' ),
    'update_item'       => __( 'Update Vehical' ),
    'add_new_item'      => __( 'Add New Vehical' ),
    'new_item_name'     => __( 'New Vehical Name' ),
    'menu_name'         => __( 'Vehical' ),
  );

  $args = array(
    'hierarchical'      => true,
    'labels'            => $labels,
    'show_ui'           => true,
    'show_admin_column' => true,
    'query_var'         => true,
    'rewrite'           => array( 'slug' => 'vehical' ),
  );

  register_taxonomy( 'vehical', array( 'cars' ), $args );

}


/////////////////////////////////////////

// register post type for member slider
/**
 * Register a custom post type called "car".
 *
 * @see get_post_type_labels() for label keys.
 */
function anr_codex_mslider_init() {
    $labels = array(
        'name'                  => _x( 'member_slider', 'Post type general name', 'carauction' ),
        'singular_name'         => _x( 'member_slider', 'Post type singular name', 'carauction' ),
        'menu_name'             => _x( 'member_slider', 'Admin Menu text', 'carauction' ),
        'name_admin_bar'        => _x( 'member_slider', 'Add New on Toolbar', 'carauction' ),
        'add_new'               => __( 'Add New', 'carauction' ),
        'add_new_item'          => __( 'Add New member_slider', 'carauction' ),
        'new_item'              => __( 'New member_slider', 'carauction' ),
        'edit_item'             => __( 'Edit member_slider', 'carauction' ),
        'view_item'             => __( 'View member_slider', 'carauction' ),
        'all_items'             => __( 'All member_slider', 'carauction' ),
        'search_items'          => __( 'Search member_slider', 'carauction' ),
        'parent_item_colon'     => __( 'Parent member_slider:', 'carauction' ),
        'not_found'             => __( 'No member_slider found.', 'carauction' ),
        'not_found_in_trash'    => __( 'No member_slider found in Trash.', 'carauction' ),
        'featured_image'        => _x( 'car Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'carauction' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'carauction' ),
        'archives'              => _x( 'car archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'carauction' ),
        'insert_into_item'      => _x( 'Insert into member_slider', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'carauction' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this member_slider', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'carauction' ),
        'filter_items_list'     => _x( 'Filter member_slider list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'carauction' ),
        'items_list_navigation' => _x( 'member_slider list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'carauction' ),
        'items_list'            => _x( 'member_slider list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'carauction' ),
    );
 
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'member_slider' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail', 'editor' ),
    );
 
    register_post_type( 'member_slider', $args );
}
 
add_action( 'init', 'anr_codex_mslider_init' );


// filter the Gravity Forms button type
add_filter('gform_submit_button', 'form_submit_button', 10, 2);
function form_submit_button($button, $form){
    return "<button class='button btn' id='gform_submit_button_{$form["id"]}'><span>{$form['button']['text']}</span></button>";
}

// Register sidebar
add_action('widgets_init', 'theme_register_sidebar');
function theme_register_sidebar() {
    if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
      'name' => __( 'home footer', 'carauction' ),
            'id' => 'sidebar-1',
            'before_widget' => '<div id="%1$s" class="col-xs-12 col-sm-6 col-md-3 widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
         ));
    };
      if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
          'name' => __( 'home footer2', 'carauction' ),
          'id' => 'sidebar-2',
            'before_widget' => '<div id="%1$s" class="col-xs-12 col-sm-6 col-md-6 widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
         ));
      }
      if ( function_exists('register_sidebar') ) {
        register_sidebar(array(
          'name' => __( 'Page Sidebar', 'carauction' ),
          'id' => 'sidebar-page',
            'before_widget' => '<div id="%1$s" class="widget col-md-12 widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4>',
            'after_title' => '</h4>',
         ));
      }
}

// Bootstrap_Walker_Nav_Menu setup

add_action( 'after_setup_theme', 'bootstrap_setup' );

if ( ! function_exists( 'bootstrap_setup' ) ):

    function bootstrap_setup(){

        add_action( 'init', 'register_menu' );

        function register_menu(){
      register_nav_menu( 'top-menu', 'Top Menu' ); 
    }

        class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {


            function start_lvl( &$output, $depth = 0, $args = array() ) {

                $indent = str_repeat( "\t", $depth );
                $output    .= "\n$indent<ul class=\"dropdown-menu\">\n";

            }

            function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {

                if (!is_object($args)) {
                    return; // menu has not been configured
                }

                $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

                $li_attributes = '';
                $class_names = $value = '';

                $classes = empty( $item->classes ) ? array() : (array) $item->classes;
                $classes[] = ($args->has_children) ? 'dropdown' : '';
                $classes[] = ($item->current || $item->current_item_ancestor) ? 'active' : '';
                $classes[] = 'menu-item-' . $item->ID;


                $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
                $class_names = ' class="' . esc_attr( $class_names ) . '"';

                $id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
                $id = strlen( $id ) ? ' id="' . esc_attr( $id ) . '"' : '';

                $output .= $indent . '<li' . $id . $value . $class_names . $li_attributes . '>';

                $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
                $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
                $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
                $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
                $attributes .= ($args->has_children)        ? ' class="dropdown-toggle" data-toggle="dropdown"' : '';

                $item_output = $args->before;
                $item_output .= '<a'. $attributes .'>';
                $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
                $item_output .= ($args->has_children) ? ' <b class="caret"></b></a>' : '</a>';
                $item_output .= $args->after;

                $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
            }

            function display_element( $element, &$children_elements, $max_depth, $depth=0, $args, &$output ) {

                if ( !$element )
                    return;

                $id_field = $this->db_fields['id'];

                //display this element
                if ( is_array( $args[0] ) )
                    $args[0]['has_children'] = ! empty( $children_elements[$element->$id_field] );
                else if ( is_object( $args[0] ) )
                    $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
                $cb_args = array_merge( array(&$output, $element, $depth), $args);
                call_user_func_array(array(&$this, 'start_el'), $cb_args);

                $id = $element->$id_field;

                // descend only when the depth is right and there are childrens for this element
                if ( ($max_depth == 0 || $max_depth > $depth+1 ) && isset( $children_elements[$id]) ) {

                    foreach( $children_elements[ $id ] as $child ){

                        if ( !isset($newlevel) ) {
                            $newlevel = true;
                            //start the child delimiter
                            $cb_args = array_merge( array(&$output, $depth), $args);
                            call_user_func_array(array(&$this, 'start_lvl'), $cb_args);
                        }
                        $this->display_element( $child, $children_elements, $max_depth, $depth + 1, $args, $output );
                    }
                        unset( $children_elements[ $id ] );
                }

                if ( isset($newlevel) && $newlevel ){
                    //end the child delimiter
                    $cb_args = array_merge( array(&$output, $depth), $args);
                    call_user_func_array(array(&$this, 'end_lvl'), $cb_args);
                }

                //end this element
                $cb_args = array_merge( array(&$output, $element, $depth), $args);
                call_user_func_array(array(&$this, 'end_el'), $cb_args);
            }
        }
    }
endif;


// START THEME OPTIONS
// custom theme options for user in admin area - Appearance > Theme Options
function pu_theme_menu()
{
  add_theme_page( 'Theme Option', 'Theme Options', 'manage_options', 'pu_theme_options.php', 'pu_theme_page');  
}
add_action('admin_menu', 'pu_theme_menu');

function pu_theme_page()
{
?>
    <div class="section panel">
      <h1>Custom Theme Options</h1>
      <form method="post" enctype="multipart/form-data" action="options.php">
      <hr>
        <?php 

          settings_fields('pu_theme_options'); 
        
          do_settings_sections('pu_theme_options.php');
          echo '<hr>';
        ?>
            <p class="submit">  
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />  
            </p>
      </form>
    </div>
    <?php
}

add_action( 'admin_init', 'pu_register_settings' );

/**
 * Function to register the settings
 */
function pu_register_settings()
{
    // Register the settings with Validation callback
    register_setting( 'pu_theme_options', 'pu_theme_options' );

    // Add settings section
    add_settings_section( 'pu_text_section', 'Social Links', 'pu_display_section', 'pu_theme_options.php' );

    // Create textbox field
    $field_args = array(
      'type'      => 'text',
      'id'        => 'twitter_link',
      'name'      => 'twitter_link',
      'desc'      => 'Twitter Link - Example: http://twitter.com/username',
      'std'       => '',
      'label_for' => 'twitter_link',
      'class'     => 'css_class'
    );

    // Add twitter field
    add_settings_field( 'twitter_link', 'Twitter', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );   

    $field_args = array(
      'type'      => 'text',
      'id'        => 'facecar_link',
      'name'      => 'facecar_link',
      'desc'      => 'Facecar Link - Example: http://facecar.com/username',
      'std'       => '',
      'label_for' => 'facecar_link',
      'class'     => 'css_class'
    );

    // Add facecar field
    add_settings_field( 'facecar_link', 'Facecar', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    $field_args = array(
      'type'      => 'text',
      'id'        => 'gplus_link',
      'name'      => 'gplus_link',
      'desc'      => 'Google+ Link - Example: http://plus.google.com/user_id',
      'std'       => '',
      'label_for' => 'gplus_link',
      'class'     => 'css_class'
    );

    // Add Google+ field
    add_settings_field( 'gplus_link', 'Google+', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    $field_args = array(
      'type'      => 'text',
      'id'        => 'youtube_link',
      'name'      => 'youtube_link',
      'desc'      => 'Youtube Link - Example: https://www.youtube.com/channel/channel_id',
      'std'       => '',
      'label_for' => 'youtube_link',
      'class'     => 'css_class'
    );

    // Add youtube field
    add_settings_field( 'youtube_ink', 'Youtube', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    $field_args = array(
      'type'      => 'text',
      'id'        => 'linkedin_link',
      'name'      => 'linkedin_link',
      'desc'      => 'LinkedIn Link - Example: http://linkedin.com/in/username',
      'std'       => '',
      'label_for' => 'linkedin_link',
      'class'     => 'css_class'
    );

    // Add LinkedIn field
    add_settings_field( 'linkedin_link', 'LinkedIn', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    $field_args = array(
      'type'      => 'text',
      'id'        => 'instagram_link',
      'name'      => 'instagram_link',
      'desc'      => 'Instagram Link - Example: http://instagram.com/username',
      'std'       => '',
      'label_for' => 'instagram_link',
      'class'     => 'css_class'
    );

    // Add Instagram field
    add_settings_field( 'instagram_link', 'Instagram', 'pu_display_setting', 'pu_theme_options.php', 'pu_text_section', $field_args );

    // Add settings section title here
    add_settings_section( 'section_name_here', 'Section Title Here', 'pu_display_section', 'pu_theme_options.php' );
    
    // Create textarea field
    $field_args = array(
      'type'      => 'textarea',
      'id'        => 'settings_field_1',
      'name'      => 'settings_field_1',
      'desc'      => 'Setting Description Here',
      'std'       => '',
      'label_for' => 'settings_field_1'
    );

    // section_name should be same as section_name above (line 116)
    add_settings_field( 'settings_field_1', 'Setting Title Here', 'pu_display_setting', 'pu_theme_options.php', 'section_name_here', $field_args );   


    // Copy lines 118 through 129 to create additional field within that section
    // Copy line 116 for a new section and then 118-129 to create a field in that section
}


// allow wordpress post editor functions to be used in theme options
function pu_display_setting($args)
{
    extract( $args );

    $option_name = 'pu_theme_options';

    $options = get_option( $option_name );

    switch ( $type ) {  
          case 'text':  
              $options[$id] = stripslashes($options[$id]);  
              $options[$id] = esc_attr( $options[$id]);  
              echo "<input class='regular-text$class' type='text' id='$id' name='" . $option_name . "[$id]' value='$options[$id]' />";  
              echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";
          break;
          case 'textarea':  
              $options[$id] = stripslashes($options[$id]);  
              //$options[$id] = esc_attr( $options[$id]);
              $options[$id] = esc_html( $options[$id]); 

              printf(
                wp_editor($options[$id], $id, 
                    array('textarea_name' => $option_name . "[$id]",
                        'style' => 'width: 200px'
                        )) 
                );
              // echo "<textarea id='$id' name='" . $option_name . "[$id]' rows='10' cols='50'>".$options[$id]."</textarea>";  
              // echo ($desc != '') ? "<br /><span class='description'>$desc</span>" : "";  
          break; 
    }
}

function pu_validate_settings($input)
{
  foreach($input as $k => $v)
  {
    $newinput[$k] = trim($v);
    
    // Check the input is a letter or a number
    if(!preg_match('/^[A-Z0-9 _]*$/i', $v)) {
      $newinput[$k] = '';
    }
  }

  return $newinput;
}

// Add custom styles to theme options area
add_action('admin_head', 'custom_style');

function custom_style() {
  echo '<style>
    .appearance_page_pu_theme_options .wp-editor-wrap {
      width: 75%;
    }
    .regular-textcss_class {
        width: 50%;
    }
    .appearance_page_pu_theme_options h3 {
        font-size: 2em;
        padding-top: 40px;
    }
  </style>';
}

// END THEME OPTIONS


/**
 * Load site scripts.
 */
function bootstrap_theme_enqueue_scripts() {
    $template_url = get_template_directory_uri();

    // jQuery.
    wp_enqueue_script( 'jquery' );

    // Bootstrap
    wp_enqueue_script( 'bootstrap-script', $template_url . '/js/bootstrap.min.js', array( 'jquery' ), null, true );

  wp_enqueue_style( 'bootstrap-style', $template_url . '/css/bootstrap.min.css' );
  wp_enqueue_style( 'theme-style', $template_url . '/css/theme.css' );
    wp_enqueue_style( 'theme-style-workflow', $template_url . '/css/workflow.css' );

    //Main Style
    wp_enqueue_style( 'main-style', get_stylesheet_uri() );
  // main js
  wp_enqueue_script( 'theme-script', $template_url . '/js/theme.js', array( 'jquery' ), null, true );


    // Load Thread comments WordPress script.
    if ( is_singular() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action( 'wp_enqueue_scripts', 'bootstrap_theme_enqueue_scripts', 1 );


//form child elemennt



?>