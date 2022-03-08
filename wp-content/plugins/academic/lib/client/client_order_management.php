<?php
//Dependencies 
require '../../../../../wp-load.php';


class client_order_management 
{
//Constructor 
    function __constructor()
    {
        
    }

	//Add orders
	function add_orders ($customer_id,$product_id,$amount,$topic,$doctype,$date,$writer_level,$spacing,$number_of_pages,$one_page_summary, 
	                     $subject_area,$academic_level,$reference_style,$number_of_references,$prefered_language,$order_description,
						 $order_status,$paper_type)	 
	{
		global $wpdb;
		$table_name=$wpdb->prefix.'posts';
		$entries=array(
				  'product_id'=>$product_id,  
				  'amount'=>$amount,
				  'topic'=>$topic,
				  'doctype'=>$doctype,
				  'date_required'=>$date,
				  'writerlevel'=>$writer_level,
				  'spacing'=>$spacing,  
				  'number_of_pages'=>$number_of_pages, 
				  'one_page_summary'=>$one_page_summary,
				  'subject_area'=>$subject_area,
				  'academic_level'=>$academic_level,
				  'reference_style'=>$reference_style,
				  'number_of_references'=>$number_of_references,
				  'prefered_language'=>$prefered_language,
				  'order_description'=>$order_description,
				  'processing'=>$order_status,				 
				  'papertype'=>$paper_type,  			  
				  'customer_id'=>$customer_id	);		
		$wpdb->insert($table_name,$entries);
	}

	
	// Add payment 
	function payment ($order_id,$transaction_id,$amount,$payment_method,$customer_id,$transaction_date,$first_name,$last_name,$email) {
		global $wpdb;
		$table_name="wp_billing";
		$entries=array(			
			'order_id'       =>$order_id,
			'transaction_id' =>$transaction_id,
			'amount'         =>$amount,
			'payment_method' =>$payment_method,
			'customer_id'    =>$customer_id,
			'transaction_date'=>$transaction_date,
			'first_name'      =>$first_name,
			'last_name'       =>$last_name,
			'email'            =>$email);
		$wpdb->insert($table_name,$entries);		
	}
	
		
	//SEND MESSAGE
	function send_message ($sent_from,$CUSTOMER_ID,$message,$messagehead,$order_id,$message_status,$message_date,$type)	
	{
		global $wpdb;
		$table_name="wp_messages";
		$entries=array(	
			'sent_from_id'=>'1',
			'sent_to_id'=>$CUSTOMER_ID, 
			'content'=>$message,
			'message_head'=>$messagehead, 
			'order_id'=>$order_id, 
			'status_general'=>$message_status,
			'date_sent'=>$message_date,
			'sender_type'=>	$type		
		);
		$wpdb->insert($table_name,$entries);					 
	}	
	
} 
//Am huppy I just used github
function ()
{}
?>