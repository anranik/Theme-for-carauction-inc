<?php





function anr_custom_fields(){



$banr = new_cmb2_box (array(

		'title' => 'it is title',

		'id' => 'a_text',

		'object_types' => array('page','post')



	));





$banr -> add_field(array(

	'name'       => __( 'Car Type', 'cmb2' ),

		'desc'       => __( 'field description (optional)', 'cmb2' ),

		'id'         => 'car_type',

		'type'       => 'text_small', // function should return a bool value

		// 'sanitization_cb' => 'my_custom_sanitization', // custom sanitization callback parameter

		// 'escape_cb'       => 'my_custom_escaping',  // custom escaping callback parameter

		// 'on_front'        => false, // Optionally designate a field to wp-admin only

		'repeatable'      => true,

	));

$banr->add_field( array(

		'name' => __( 'Car Manufacturer', 'cmb2' ),

		'desc' => __( 'field description (optional)', 'cmb2' ),

		'id'   =>  'car_manu',

		'type' => 'text_small',

		'repeatable' => true,

	) );

$banr->add_field( array(

		'name' => __( 'Country', 'cmb2' ),

		'desc' => __( 'field description (optional)', 'cmb2' ),

		'id'   =>  'car_country',

		'type' => 'text_small',

		'repeatable' => true,

	) );

$banr->add_field( array(

		'name' => __( 'State', 'cmb2' ),

		'desc' => __( 'field description (optional)', 'cmb2' ),

		'id'   =>  'car_state',

		'type' => 'text_small',

		'repeatable' => true,

	) );







// custom field for member slider

$member_sli = new_cmb2_box (array(

		'title' => 'it is title',

		'id' => 'a_member_slider',

		'object_types' => array('member_slider')



	));





$member_sli -> add_field(array(

	'name'       => __( 'Car logo at member slider', 'cmb2' ),

		'desc'       => __( 'field description (optional)', 'cmb2' ),

		'id'         => 'car_member_s_logo',

		'type'       => 'file'

	));







	// custom field for cars

$cars_d = new_cmb2_box (array(

		'title' => 'it is title',

		'id' => 'car_post_meta',

		'object_types' => array('cars')



	));





$cars_d->add_field( array(

		'name' => __( 'Year', 'cmb2' ),

		'desc' => __( 'Add year', 'cmb2' ),

		'id'   =>  'car_year',

		'type' => 'text_small',

		//'repeatable' => true,

	) );



$cars_d->add_field( array(

		'name' => __( 'Make', 'cmb2' ),

		'desc' => __( 'Add make', 'cmb2' ),

		'id'   =>  'car_make',

		'type' => 'text_small',

		//'repeatable' => true,

	) );



$cars_d->add_field( array(

		'name' => __( 'Model', 'cmb2' ),

		'desc' => __( 'Add model', 'cmb2' ),

		'id'   =>  'car_model',

		'type' => 'text_small',

		//'repeatable' => true,

	) );



$cars_d->add_field( array(

		'name' => __( 'Color', 'cmb2' ),

		'desc' => __( 'Color of the car', 'cmb2' ),

		'id'   =>  'car_color',

		'type' => 'text_small',

		//'repeatable' => true,

	) );



$cars_d->add_field( array(

		'name' => __( 'Bid price', 'cmb2' ),

		'desc' => __( 'Bid price', 'cmb2' ),

		'id'   =>  'car_bid',

		'type' => 'text_small',

		//'repeatable' => true,

	) );


// custom field for member slider

$member_sli = new_cmb2_box (array(

		'title' => 'it is title',

		'id' => 'a_member_slider',

		'object_types' => array('member_slider')



	));





$member_sli -> add_field(array(

	'name'       => __( 'Car logo at member slider', 'cmb2' ),

		'desc'       => __( 'field description (optional)', 'cmb2' ),

		'id'         => 'car_member_s_logo',

		'type'       => 'file'

	));







	// custom field for Real Estate

$real_state_meta = new_cmb2_box (array(

		'title' => 'Real state meta',

		'id' => 'real_state_post_meta',

		'object_types' => array('real_state')



	));





$real_state_meta->add_field( array(

		'name' => __( 'Auction date', 'cmb2' ),

		'desc' => __( 'Add auction date', 'cmb2' ),

		'id'   =>  'real_state_date',

		'type' => 'text_small',
		) );

$real_state_meta->add_field( array(

		'name' => __( 'Auction price', 'cmb2' ),

		'desc' => __( 'Add auction price', 'cmb2' ),

		'id'   =>  'real_state_price',

		'type' => 'text_small',

) );

$real_state_meta->add_field( array(

		'name' => __( 'Auction place', 'cmb2' ),

		'desc' => __( 'Add auction place', 'cmb2' ),

		'id'   =>  'real_state_place',

		'type' => 'text_small',

		//'repeatable' => true,

	) );

$real_state_meta->add_field( array(

		'name' => __( 'Auction link', 'cmb2' ),

		'desc' => __( 'Add auction link', 'cmb2' ),

		'id'   =>  'real_state_link',

		'type' => 'text_small',

		//'repeatable' => true,

	) );



	// custom field for upcoming auctions

$upcoming_auction_meta = new_cmb2_box (array(

		'title' => 'Auction meta',

		'id' => 'upcoming_auction_post_meta',

		'object_types' => array('upcoming_auction')



	));





$upcoming_auction_meta->add_field( array(

		'name' => __( 'Auction date', 'cmb2' ),

		'desc' => __( 'Add auction date', 'cmb2' ),

		'id'   =>  'upcoming_auction_date',

		'type' => 'text_small',
		) );

$upcoming_auction_meta->add_field( array(

		'name' => __( 'Auction bid', 'cmb2' ),

		'desc' => __( 'Add auction bid', 'cmb2' ),

		'id'   =>  'upcoming_auction_price',

		'type' => 'text_small',

) );

$upcoming_auction_meta->add_field( array(

		'name' => __( 'Auction place', 'cmb2' ),

		'desc' => __( 'Add auction place', 'cmb2' ),

		'id'   =>  'upcoming_auction_place',

		'type' => 'text_small',

		//'repeatable' => true,

	) );
$upcoming_auction_meta->add_field( array(

		'name' => __( 'Auction link', 'cmb2' ),

		'desc' => __( 'Add auction link', 'cmb2' ),

		'id'   =>  'upcoming_auction_link',

		'type' => 'text_small',

		//'repeatable' => true,

	) );
	// custom field for upcoming auctions

$auction_houses_meta = new_cmb2_box (array(

		'title' => 'Auction meta',

		'id' => 'auction_houses_post_meta',

		'object_types' => array('auction_houses')



	));





$auction_houses_meta->add_field( array(

		'name' => __( 'Auction date', 'cmb2' ),

		'desc' => __( 'Add auction date', 'cmb2' ),

		'id'   =>  'auction_houses_date',

		'type' => 'text_small',
		) );

$auction_houses_meta->add_field( array(

		'name' => __( 'Auction bid', 'cmb2' ),

		'desc' => __( 'Add auction bid', 'cmb2' ),

		'id'   =>  'auction_houses_price',

		'type' => 'text_small',

) );

$auction_houses_meta->add_field( array(

		'name' => __( 'Auction place', 'cmb2' ),

		'desc' => __( 'Add auction place', 'cmb2' ),

		'id'   =>  'auction_houses_place',

		'type' => 'text_small',

		//'repeatable' => true,

	) );
$auction_houses_meta->add_field( array(

		'name' => __( 'Auction link', 'cmb2' ),

		'desc' => __( 'Add auction link', 'cmb2' ),

		'id'   =>  'auction_houses_link',

		'type' => 'text_small',

		//'repeatable' => true,

	) );



}

add_action('cmb2_init','anr_custom_fields' );