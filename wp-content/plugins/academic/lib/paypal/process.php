<?php

var_dump($_POST);


include_once("config.php");
include_once("paypal.class.php");

$paymentType = 'Auth'; // Payment type

$paypalmode = ($PayPalMode=='sandbox') ? '.sandbox' : '';

if($_POST) //Post Data received from product list page.
{
	//Mainly we need 4 variables from product page Item Name, Item Price, Item Number and Item Quantity.
	//Please Note : People can manipulate hidden field amounts in form,
	//In practical world you must fetch actual price from database using item id. Eg: 
	$email =$_POST["email"];
	$firstname=$_POST["email"];
	$lastname=$_POST["email"];
	$password=$_POST["password"];
	$country=$_POST["country"];
	$countrycode=$_POST["country_code"];
	$areacode=$_POST["area_code"];
	$phonenumber=$_POST["phone_number"];
	
			
			
    // paper details
	$topic=$_POST["topic"];

	$type_of_document='literatre';//$_POST["itemname"];
	$academic_level=$_POST["academic_level"];
	$urgency=$_POST["urgency"];	
	$spacing=$_POST["spacing"];	
	$reference_style=$_POST["reference_style"];
	$language=$_POST["language"];	
	$references=$_POST["references"];	
    $description=$_POST["description"];	
	$subject=$_POST["subject"];
	
	//order details
	$ItemName 		= 'product 1';//$_POST["itemname"];//$_POST["itemname"]; //Item Name
	$ItemPrice 		= $_POST["itemprice"]; //Item Price
	$ItemNumber 	= $_POST["itemnumber"];//$_POST["itemnumber"]; //Item Number
	$ItemDesc 		=$subject; //$_POST["itemdesc"]"; //Item Number
					   
	$ItemQty 		= $_POST["itemQty"]; // Item Quantity
	$ItemTotalPrice = ($ItemPrice*$ItemQty); //(Item Price x Quantity = Total) Get total amount of product; 

	//discount	
	//Other important variables like tax, shipping cost
	$TotalTaxAmount 	= 0;  //Sum of tax for all items in this order. 
	$HandalingCost 		= 0;  //Handling cost for this order.
	$InsuranceCost 		= 0;  //shipping insurance cost for this order.
	$ShippinDiscount 	= 0; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= 0; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
	
	//Grand total including all tax, insurance, shipping cost and discount
	$GrandTotal = $ItemTotalPrice;//($ItemTotalPrice + $TotalTaxAmount + $HandalingCost + $InsuranceCost + $ShippinCost + $ShippinDiscount);
	
	//Parameters for SetExpressCheckout, which will be sent to PayPal
	$padata = 	'&METHOD=SetExpressCheckout'.
				'&RETURNURL='.urlencode($PayPalReturnURL ).
				'&CANCELURL='.urlencode($PayPalCancelURL).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				
				'&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
				'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
				'&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
				'&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
				'&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).
				
								
				'&NOSHIPPING=1'. //set 1 to hide buyer's shipping address, in-case products that does not require shipping
				
				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				//'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
				//'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
				//'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
				//'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
				//'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode).
				'&LOCALECODE=GB'. //PayPal pages to match the language on your website.
				'&LOGOIMG=http:../paypal/Image/logo2.png'. //site logo
				'&CARTBORDERCOLOR=FFFFFF'. //border color of cart
				'&ALLOWNOTE=1';
				
				############# set session variable we need later for "DoExpressCheckoutPayment" #######
				$_SESSION['ItemName'] 			=  $ItemName; //Item Name
				$_SESSION['ItemPrice'] 			=  $ItemPrice; //Item Price
				$_SESSION['ItemNumber'] 		=  $ItemNumber; //Item Number
				$_SESSION['ItemDesc'] 			=  $ItemDesc; //Item Number
				$_SESSION['ItemQty'] 			=  $ItemQty; // Item Quantity
				$_SESSION['ItemTotalPrice'] 	=  $ItemTotalPrice; //(Item Price x Quantity = Total) Get total amount of product; 
				$_SESSION['TotalTaxAmount'] 	=  $TotalTaxAmount;  //Sum of tax for all items in this order. 
				$_SESSION['HandalingCost'] 		=  $HandalingCost;  //Handling cost for this order.
				$_SESSION['InsuranceCost'] 		=  $InsuranceCost;  //shipping insurance cost for this order.
				$_SESSION['ShippinDiscount'] 	=  $ShippinDiscount; //Shipping discount for this order. Specify this as negative number.
				$_SESSION['ShippinCost'] 		=   $ShippinCost; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
				$_SESSION['GrandTotal'] 		=  $GrandTotal;

				//CUSTOMER DETAILS
				$_SESSION['email'] 			 =	$email;
				$_SESSION['first_name']		 =	$firstname;
				$_SESSION['last_name']		 =	$lastname;	
				$_SESSION['password'] 		 =	$password;
				$_SESSION['country']		 =	$country;
				$_SESSION['country_code']	 =	$countrycode;
				$_SESSION['area_code']		 =  $areacode;
				$_SESSION['phone_number']	 =	$phonenumber;
				
				//order details
			    $_SESSION["topic"]=$topic;
			    $_SESSION["document_type"]=$type_of_document;				
				$_SESSION["academic_level"]=$academic_level;
				$_SESSION["urgency"]=$urgency;				
				$_SESSION["spacing"]=$spacing;				
				$_SESSION["reference_style"]=$reference_style;				
				$_SESSION["language"]=$language;				
				$_SESSION["references"]=$references;				
				$_SESSION["description"]=$description;				
				$_SESSION["subject"]=$subject;
				
		//We need to execute the "SetExpressCheckOut" method to obtain paypal token
		$paypal= new MyPayPal();
		$httpParsedResponseAr = $paypal->PPHttpPost('SetExpressCheckout', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
		
		//Respond according to message we receive from Paypal
		if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"]))
		{

				//Redirect user to PayPal store with Token received.
			 	$paypalurl ='https://www'.$paypalmode.'.paypal.com/cgi-bin/webscr?cmd=_express-checkout&token='.$httpParsedResponseAr["TOKEN"].'';
				header('Location: '.$paypalurl);
			 
		}else{
			//Show error message
			echo '<div style="color:red;"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
		}

}

//Paypal redirects back to this page using ReturnURL, We should receive TOKEN and Payer ID
if(isset($_GET["token"]) && isset($_GET["PayerID"]))
{
	//we will be using these two variables to execute the "DoExpressCheckoutPayment"
	//Note: we haven't received any payment yet.
	
	$token = $_GET["token"];
	$payer_id = $_GET["PayerID"];
	
	//get session variables
	$ItemName 			= $_SESSION['ItemName']; //Item Name
	$ItemPrice 			= $_SESSION['ItemPrice'] ; //Item Price
	$ItemNumber 		= $_SESSION['ItemNumber']; //Item Number
	$ItemDesc 			= $_SESSION['ItemDesc']; //Item Number
	$ItemQty 			= $_SESSION['ItemQty']; // Item Quantity
	$ItemTotalPrice 	= $_SESSION['ItemTotalPrice']; //(Item Price x Quantity = Total) Get total amount of product; 
	$TotalTaxAmount 	= $_SESSION['TotalTaxAmount'] ;  //Sum of tax for all items in this order. 
	$HandalingCost 		= $_SESSION['HandalingCost'];  //Handling cost for this order.
	$InsuranceCost 		= $_SESSION['InsuranceCost'];  //shipping insurance cost for this order.
	$ShippinDiscount 	= $_SESSION['ShippinDiscount']; //Shipping discount for this order. Specify this as negative number.
	$ShippinCost 		= $_SESSION['ShippinCost']; //Although you may change the value later, try to pass in a shipping amount that is reasonably accurate.
	$GrandTotal 		= $_SESSION['GrandTotal'];
	
		

	$padata = 	'&TOKEN='.urlencode($token).
				'&PAYERID='.urlencode($payer_id).
				'&PAYMENTREQUEST_0_PAYMENTACTION='.urlencode("SALE").
				
				//set item info here, otherwise we won't see product details later	
				'&L_PAYMENTREQUEST_0_NAME0='.urlencode($ItemName).
				'&L_PAYMENTREQUEST_0_NUMBER0='.urlencode($ItemNumber).
				'&L_PAYMENTREQUEST_0_DESC0='.urlencode($ItemDesc).
				'&L_PAYMENTREQUEST_0_AMT0='.urlencode($ItemPrice).
				'&L_PAYMENTREQUEST_0_QTY0='. urlencode($ItemQty).

				/* 
				//Additional products (L_PAYMENTREQUEST_0_NAME0 becomes L_PAYMENTREQUEST_0_NAME1 and so on)
				'&L_PAYMENTREQUEST_0_NAME1='.urlencode($ItemName2).
				'&L_PAYMENTREQUEST_0_NUMBER1='.urlencode($ItemNumber2).
				'&L_PAYMENTREQUEST_0_DESC1=Description text'.
				'&L_PAYMENTREQUEST_0_AMT1='.urlencode($ItemPrice2).
				'&L_PAYMENTREQUEST_0_QTY1='. urlencode($ItemQty2).
				*/

				'&PAYMENTREQUEST_0_ITEMAMT='.urlencode($ItemTotalPrice).
				'&PAYMENTREQUEST_0_TAXAMT='.urlencode($TotalTaxAmount).
				'&PAYMENTREQUEST_0_SHIPPINGAMT='.urlencode($ShippinCost).
				'&PAYMENTREQUEST_0_HANDLINGAMT='.urlencode($HandalingCost).
				'&PAYMENTREQUEST_0_SHIPDISCAMT='.urlencode($ShippinDiscount).
				'&PAYMENTREQUEST_0_INSURANCEAMT='.urlencode($InsuranceCost).
				'&PAYMENTREQUEST_0_AMT='.urlencode($GrandTotal).
				'&PAYMENTREQUEST_0_CURRENCYCODE='.urlencode($PayPalCurrencyCode);
	
	//We need to execute the "DoExpressCheckoutPayment" at this point to Receive payment from user.
	$paypal= new MyPayPal();
	$httpParsedResponseAr = $paypal->PPHttpPost('DoExpressCheckoutPayment', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);
	
	//Check if everything went ok..
	if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
	{
                   /* Only for testing puporse (Disabled )
			echo '<h2>Success</h2>';
			echo 'Your Transaction ID : '.urldecode($httpParsedResponseAr["PAYMENTINFO_0_TRANSACTIONID"]); */
			
				/*
				//Sometimes Payment are kept pending even when transaction is complete. 
				//hence we need to notify user about it and ask him manually approve the transaction
				*/
				
				if('Completed' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					//echo '<div style="color:green">Payment Received! Your product will be sent to you very soon!</div>';
				}
				elseif('Pending' == $httpParsedResponseAr["PAYMENTINFO_0_PAYMENTSTATUS"])
				{
					echo '<div style="color:red">Transaction Complete, but payment is still pending! '.
					'You need to manually authorize this payment in your <a target="_new" href="http://www.paypal.com">Paypal Account</a></div>';
				}

				// we can retrive transection details using either GetTransactionDetails or GetExpressCheckoutDetails
				// GetTransactionDetails requires a Transaction ID, and GetExpressCheckoutDetails requires Token returned by SetExpressCheckOut
				$padata = 	'&TOKEN='.urlencode($token);
				$paypal= new MyPayPal();
				$httpParsedResponseAr = $paypal->PPHttpPost('GetExpressCheckoutDetails', $padata, $PayPalApiUsername, $PayPalApiPassword, $PayPalApiSignature, $PayPalMode);

				if("SUCCESS" == strtoupper($httpParsedResponseAr["ACK"]) || "SUCCESSWITHWARNING" == strtoupper($httpParsedResponseAr["ACK"])) 
				{					
				
					#### SAVE BUYER INFORMATION IN DATABASE ###
					//see (http://www.sanwebe.com/2013/03/basic-php-mysqli-usage) for mysqli usage
					
					$buyerName = $httpParsedResponseAr["FIRSTNAME"].' '.$httpParsedResponseAr["LASTNAME"];
					$buyerEmail = $httpParsedResponseAr["EMAIL"];										
							
			     //SAVE BUYER INFORMATION
				require_once '..\client\client_management.php';
				$user_data=array(
					'ID'                    => 0,    //(int) User ID. If supplied, the user will be updated.
					'user_pass'             => $_SESSION['password'],   //(string) The plain-text user password.
					'user_login'            => $_SESSION['email'] ,   //(string) The user's login username.
					'user_nicename'         => $buyerName,   //(string) The URL-friendly user name.
					'user_url'              => '',   //(string) The user URL.
					'user_email'            => 	$_SESSION['email'] ,   //(string) The user email address.
					'display_name'          => '',   //(string) The user's display name. Default is the user's username.
					'nickname'              => '',   //(string) The user's nickname. Default is the user's username.
					'first_name'            => 	$_SESSION['first_name'] ,   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
					'last_name'             => 	$_SESSION['last_name'] ,   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
					'description'           => '',   //(string) The user's biographical description.
					'rich_editing'          => '',   //(string|bool) Whether to enable the rich-editor for the user. False if not empty.
					'syntax_highlighting'   => '',   //(string|bool) Whether to enable the rich code editor for the user. False if not empty.
					'comment_shortcuts'     => '',   //(string|bool) Whether to enable comment moderation keyboard shortcuts for the user. Default false.
					'admin_color'           => '',   //(string) Admin color scheme for the user. Default 'fresh'.
					'use_ssl'               => '',   //(bool) Whether the user should always access the admin over https. Default false.
					'user_registered'       => '',   //(string) Date the user registered. Format is 'Y-m-d H:i:s'.
					'show_admin_bar_front'  => '',   //(string|bool) Whether to display the Admin Bar for the user on the site's front end. Default true.
					'role'                  => 'author',   //(string) User's role.
					'locale'                => '',   //(string) User's locale. Default empty.
					
					 'sex'                  => '',   //(string) User's locale. Default empty.
					 'phone_number'         => $_SESSION['phone'],   //(string) User's locale. Default empty.
					 'country'              => $_SESSION['country'],   //(string) User's locale. Default empty.	 
				  );
				
				$calovex_user= new client_management($user_data);
				$userdatax=$calovex_user->add_users();  
                //End of save buyer information
					
							
				//SAVE ORDER DETAILS		
				    
					$the_user = get_user_by('email',$_SESSION['email']);
					$CUSTOMER_ID = $the_user->ID;

					$topic=$_SESSION["topic"];
					$customer_id=$CUSTOMER_ID;
					$date_placed=$httpParsedResponseAr["TIMESTAMP"];
					$doctype=$_SESSION["document_type"];
					$academic_level=$_SESSION["academic_level"];
					$urgency=$_SESSION["urgency"];
					$number_of_pages=$httpParsedResponseAr["L_QTY0"];
					$spacing=$_SESSION["spacing"];
					$cost_per_page=$httpParsedResponseAr["L_AMT0"];
					$reference_style=$_SESSION["reference_style"];
					$language=$_SESSION["language"];
					$description=$_SESSION["description"];
					$references=$_SESSION["references"];
					$subject=$_SESSION["subject"];
					$status="processing";	
					$product_id="1"; //Needs to be defined		
					$amount=$cost_per_page*$number_of_pages;	
					$writer_level="Average"; //Needs to be defined	
					$one_page_summary="false"; //Default is false
                    $paper_type="any"; //Yet to be defined
                     
					require_once '..\client\client_order_management.php';
					$order=new client_order_management();

				$order->add_orders($customer_id,$product_id,$amount,$topic,$doctype,$date_placed,$writer_level,$spacing,$number_of_pages,$one_page_summary, 
	                    				 $subject,$academic_level,$reference_style,$references,$language,$description,
										 $status,$paper_type); 
				
					//get the inserted order id
					$the_order_id=$wpdb->insert_id;
						 
                //End of save order details
									
				//INSERT BILLING DETAILS DETAILS
				
					$first_name=$httpParsedResponseAr["FIRSTNAME"];
					$last_name=$httpParsedResponseAr["LASTNAME"];
					//paid from email
					$email=$httpParsedResponseAr["EMAIL"];
					$order_id=$the_order_id;
					$transaction_id=$httpParsedResponseAr["PAYMENTREQUESTINFO_0_TRANSACTIONID"];
					$amount=$httpParsedResponseAr["ITEMAMT"];
					$type="paypal";
					$customer_id=$CUSTOMER_ID;
					$transaction_date=$httpParsedResponseAr["TIMESTAMP"];
					$payment_method="paypal";
					
					global $wpdb;
					$order->payment ($order_id,$transaction_id,$amount,$payment_method,$customer_id,$transaction_date,$first_name,$last_name,$email);
					
					// UPLOAD FILES
				  		//this will require order id
					
					
			 	// MESSAGES
					$message="Thank you  for placing an order with us. We will ensure you get a good grade.";
					$messagehead="Order successfully placed";
					$message_status="Not Read";
					$message_date=$httpParsedResponseAr["TIMESTAMP"];
					$type="Support";				
										
			    $order->send_message ($sent_from,$CUSTOMER_ID,$message,$messagehead,$order_id,$message_status,$message_date,$type);	
				//Register user to the next state: either login or read on how to use the system"
					//LOGIN USER	
				    wp_logout(); 								
					$creds = array('user_login'    => $_SESSION['email'],'user_password' =>$password,'remember'=> true);
				 	$user = wp_signon( $creds, false );	
		
			    header("location: ../../../../../../wp-login.php");
					
				} else  {
					echo '<div style="color:red"><b>GetTransactionDetails failed:</b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
					echo '<pre>';
					print_r($httpParsedResponseAr);
					echo '</pre>';
				}
	
	}else{
			echo '<div style="color:red"><b>Error : </b>'.urldecode($httpParsedResponseAr["L_LONGMESSAGE0"]).'</div>';
			echo '<pre>';
			print_r($httpParsedResponseAr);
			echo '</pre>';
	}
}
?>
