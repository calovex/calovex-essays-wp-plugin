<?php
class calovex_admin_plugin{
 
	 public function calovex_plugin_setup() 
	 { 
		//loading scripts/js 
		 wp_register_script ( 'mysample', plugins_url ( 'js/admin/myjs.js', __FILE__ ) );
		 wp_register_style ( 'mysample', plugins_url ( 'css/admin/mystyle.css', __FILE__ ) );
		
		
		
		//loading styles/css
		

		 //registering memu
		 add_action ( 'admin_menu', array ($this, 'setup_menu' ) ); 
		
	 }


	 public function setup_menu() 
		 {
			 //add_menu_page( string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '', string $icon_url = '', int $position = null )
			 add_menu_page( 
					__( 'Calovex Academic Pro', 'textdomain' ),
					'C-Academic Pro',
					'manage_options',
					'custompageslug',
					array ($this, 'dashboard'),
					plugins_url( 'myplugin/images/icon.png' ),
					6
				); 		
			 add_submenu_page ( 'custompageslug', 'View Orders', 'View Orders', 'manage_options', 'view-orders', array ($this,'view_client_orders' ) );
			 //add_submenu_page ( 'sample-page-dashboard', 'Inner Page', 'Inner Page', 'manage_options', 'inner-page', array ($this,'innerpage_define' ) );
		 }// end function
		 
		 
	 function dashboard() 
	 {     
		 //implementing the registerd javascript and css in the page
		 wp_enqueue_script('mysample');
		 wp_enqueue_style('mysample');     
		 //wp_enqueue_script( 'jquery-ui-sortable');
		 //wp_enqueue_media(); //Enqueues all scripts, styles, settings, and templates necessary to use all media JS APIs.
		 
		 $saved_data =  get_option('save_plugin_settings');
		 $saved_data = $saved_data ? unserialize($saved_data) : null ;
		 
		 include_once (WP_PLUGIN_DIR . '/academic/templates/admin/dashboard_view.php');
			
	 }// end function
	 
	 
	 function view_client_orders() 
	{     
		 wp_enqueue_script('mysample');
		 wp_enqueue_style('mysample');
		 
		 $saved_data =  get_option('save_plugin_settings');
		 
		 $saved_data = $saved_data ? unserialize($saved_data) : null ;
		 
		 include_once (WP_PLUGIN_DIR . '/academic/templates/admin/innerpage_view.php');
 
	} // end function
} //End of class
	 
//calling the class
$calovex_admin_obj = new calovex_admin_plugin ();

$calovex_admin_obj->calovex_plugin_setup();
?>