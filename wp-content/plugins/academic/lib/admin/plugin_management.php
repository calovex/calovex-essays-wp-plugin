<?php
// initial set up of the  plugin 
require '../../../../../wp-load.php';

orders_table();


register_activation_hook( __FILE__, 'calovex_plugin_setup' );
//plguin update 
add_action( 'plugins_loaded', 'calovex_plugin_update' );

//add option --datbase version
add_option( "calovex_academic_db_version", "1.0" );

$calovex_plugin_version="1.0";
$charset_collate = $wpdb->get_charset_collate();

function calovex_plugin_setup() 
{	
    global $calovex_plugin_version;
    //plugin setup
	$installed_version=calovex_academic_db_version;
    if ($installed_version != $calovex_plugin_version )        
	    create_add_calovex_academic_database(); 
}

function calovex_plugin_update()
{	
	//update the option 
	update_option( "jal_db_version", $jal_db_version );
	//update all the tables
	create_add_calovex_academic_database();
	
}


function create_add_calovex_academic_database()
{
    //These fuctions call and create various tables
	users_table (); 
	users_table (); 
	billing_table();
	messages_tables();
	uploads_table();
	reviews_table () ;
	assigned_orders_tables(); 
	orders_table();
}

//USERS TABLE 
function users_table () 
{
	global $wpdb;
	$users_table = $wpdb->prefix .'users';
	$users_sql = "CREATE TABLE $users_table (
				  
				  `sex` varchar(10) NOT NULL,	
				  `phone_number` int(10) NOT NULL,
				  `country` varchar(25) NOT NULL,
				  `client_type` varchar(50) NOT NULL,
				  ) $charset_collate;";

	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta($users_sql );	
}


//payment /billing	
function billing_table()
{  
   global $wpdb;
   $billing_table = $wpdb->prefix .'billing';
   $billing_sql="CREATE TABLE $billing_table (
  `billing_id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `transaction_id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `transaction_date` datetime NOT NULL,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `transaction_type` varchar(20) NOT NULL,  
   PRIMARY KEY (billing_id)
   )$charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta($billing_sql);	
}
	
//messages 	
function messages_tables()	
{
   global $wpdb;
   $messages_table = $wpdb->prefix . 'messages';

   $messages_sql="CREATE TABLE   $messages_table (
  `message_id` int(50) NOT NULL AUTO_INCREMENT,
  `sent_from_id` int(10) NOT NULL,
  `sent_to_id` int(10) NOT NULL,
  `content` text NOT NULL,
  `message_head` varchar(100) NOT NULL,
  `order_id` int(20) NOT NULL,
  `status_general` varchar(20) NOT NULL,
  `date_sent` date DEFAULT NULL,
  `date_read` date DEFAULT NULL,
  `sender_type` varchar(10) NOT NULL,
  PRIMARY KEY (`message_id`)
   )$charset_collate;";
   
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
	dbDelta($messages_sql);	
}

//uploads 
function uploads_table()
{
	global $wpdb;
    $uploads_table = $wpdb->prefix .'uploads';
    $uploads_sql="CREATE TABLE $uploads_table (
  `upload_id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `type` varchar(35) NOT NULL,
  `size` int(5) NOT NULL,
  `date_uploaded` date NOT NULL,
  `owner` int(10) NOT NULL,
  `plagiarism` int(3) NOT NULL,  
  `order_id` varchar(50) NOT NULL,
  `papertype` varchar(15) NOT NULL,
   PRIMARY KEY (`upload_id`)
   ) $charset_collate;";
   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta($uploads_sql);	
}

// review 
function reviews_table ()
{	
   global $wpdb;
   $review_table = $wpdb->prefix . 'reviews';
   $reviews_sql="CREATE TABLE  $review_table(
  `review_id` int(10) NOT NULL AUTO_INCREMENT,
  `reviewed_order_id` varchar(50) NOT NULL,  
  `reviewed_by` int(10) NOT NULL,
  `person_reviewed` int(10) NOT NULL, 
  `review_rating` varchar(20) NOT NULL,  
  `review_details` text NOT NULL,   
   PRIMARY KEY (`review_id`)
   ) $charset_collate;";
   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta($reviews_sql);	
}
	
// writer assignment of orders
function assigned_orders_tables()
{
  global $wpdb;
  $assigned_orders_table = $wpdb->prefix . 'assigned_orders';
  $assigned_orders_sql="CREATE TABLE $assigned_orders_table (
  `assignment_id` int(10) NOT NULL AUTO_INCREMENT,
  `assigned_order_id` varchar(50) NOT NULL,  
  `assigned_to` int(10) NOT NULL,
  `date_assigned` varchar(20) NOT NULL,  
  `order_progress` varchar(20) NOT NULL,   
  PRIMARY KEY (`assignment_id`)
  ) $charset_collate;";
   require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
   dbDelta($assigned_orders_sql);	
}

	

//ORDERS TABLE 
 function orders_table()
 {  
    global $wpdb;
    $orders_table=$wpdb->prefix.'posts'; 
	
	$orders_table_sql="CREATE TABLE $orders_table (
  `product_id` int(50) NOT NULL,  
  `amount` double NOT NULL,
  `topic` varchar(250) NOT NULL,
  `doctype` varchar(15) NOT NULL,
  `date_required` datetime NOT NULL,
  `writerlevel` varchar(15) NOT NULL,
  `spacing` varchar(15) NOT NULL,  
  `number_of_pages` int(5) NOT NULL, 
  `one_page_summary` varchar(5) NOT NULL,
  `subject_area` varchar(20) NOT NULL,
  `academic_level` varchar(20) NOT NULL,
  `reference_style` varchar(10) NOT NULL,
  `number_of_references` int(5) NOT NULL,
  `prefered_language` varchar(20) NOT NULL,
  `order_description` text NOT NULL,
  `night_calls` varchar(5) NOT NULL,
  `preffered_writer` int(10) NOT NULL,  
  `processing` varchar(15) DEFAULT NULL,   
  `completion_date` date NOT NULL,
  `papertype` varchar(10) NOT NULL,  
  `progress` varchar(3) NOT NULL,
  `source_of_external_order` varchar(10) NOT NULL,
  `link` varchar(200) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `client_approval` varchar(15) NOT NULL,
  `approval_date` datetime NOT NULL,
	) $charset_collate;	";
	require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta($orders_table_sql);
 }

 

//FUNCTION TO ADD DATA TO TABLES - not tested
function add_table_data()
{
	$welcome_name = 'Mr. WordPress';
	$welcome_text = 'Congratulations, you just completed the installation!';

	$table_name = $wpdb->prefix . 'liveshoutbox';

	$wpdb->insert( 
		$table_name, 
		array( 
			'time' => current_time( 'mysql' ), 
			'name' => $welcome_name, 
			'text' => $welcome_text, 
		) 
	);

}


?>