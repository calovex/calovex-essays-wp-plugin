<?php
/**
 * Plugin Name: Client Freelance Platform
 * Plugin URI: http://www.alexovey.com/freelance-plugin
 * Description: Free plugin for people wanting to start academic freelance websites
 * Version: 1.0
 * Author: Alex Ovey
 * Author URI: http://www.alexovey.com
 */
 

 //Retrieve all the required files
 $path=preg_replace('/wp-content.*$/','',__DIR__);
//echo $path;
require_once $path.'/wp-admin/includes/post.php';
require_once 'templates/order-form.php';
require_once 'includes/shortcodes.php';
require_once 'lib/admin/admin_dashboard.php';


//Register and load styles and scripts
//The scripts and styles must be loaded before they are enqueued
function init_method_t(){
	//registering javascript and css
	wp_register_script('order_calculator',plugins_url('js/ordercal.js',__FILE__),array(), false, true);
	wp_register_script('order_form_style_js',plugins_url('js/order_form_style_js.js',__FILE__),array(), false, true);
	
	wp_register_style('order_form',plugins_url('css/order_form_style.css',__FILE__));
	wp_register_style('order_formx','https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
	wp_register_style('extcss','https://fonts.googleapis.com/css?family=Raleway');
	
	wp_register_script('scriptx','https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js');
	wp_register_script('scripty','https://www.jqueryscript.net/demo/Creating-A-Modern-Multi-Step-Form-with-jQuery-CSS3/js/jquery.easing.min.js">
');
	
}

function enqueue_scripts_and_styles (){
	//enquing scripts and styles
	wp_enqueue_script('order_calculator');
	wp_enqueue_script('order_form_style_js');
	
	wp_enqueue_script('scriptx');
	wp_enqueue_script('scripty');
	wp_enqueue_style('order_formx');
	wp_enqueue_style('order_form');
	wp_enqueue_style('extcss');
	
	 	
}

add_action('init','init_method_t'); 
add_action('wp_enqueue_scripts','enqueue_scripts_and_styles');
add_action( 'init','ovey_academic_order_page' ); 




//SHORTCODES clients 

add_shortcode('PlacexOrder','create_order_form');




//SHORTCODES admin


//call to create page 
//ovey_academic_order_page($title,$content,$type); 

function ovey_academic_order_page() {
	
	// create order page 

	// Create place order page 
	$title='Place Order';
	$content='[PlacexOrder]';
	$type='page';
	
	
   if (!post_exists($title,$content,$date,$type)){
		$my_post = array(
		  'post_title'    => 'Place Order',
		  'post_content'  => '[PlacexOrder]',
		  'post_status'   => 'publish',
		  'post_author'   => 1,
		  'post_type'   => 'page',
		  'post_category' => array( 8,39 ));
   
		 
		// Insert the post into the database
		wp_insert_post( $my_post );
		} else {};
}		

// Creating the order form  
function create_order_form (){
	$content=ovey_order_form();
	//$content=plugins_url('css/order_form_style.css',__FILE__);
	return $content;
	
}


function beloxx()
{
		$args = array(
    'post_type'      => 'book',
    'posts_per_page' => 3,
		);
		$loop = new WP_Query($args);
		while ( $loop->have_posts() ) {
			$loop->the_post();
			?>
			<div class="entry-content">
				<?php the_title(); ?>
				<?php the_content(); ?>
			</div>
			<?php
		}

	echo '[Formx1]';
}
//Register custom menu page
function ovey_custom_menu()
{
	add_menu_page(
	'My Menu Page',
	'My Menu',
	'manage_options',
	'menuslxug',
	'belox',
	'',
	'',
	6
	);
	add_submenu_page(
	'menuslxug',
	'My Menu Page 1',
	'My Menu 1.2',
	'manage_options',
	'menuslxugx',
	'beloxx',
	'',
	'',
	1
	);
}
add_action('admin_menu','ovey_custom_menu');







 
 