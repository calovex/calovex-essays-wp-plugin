<?php
//Dependencies 
require '../../../../../wp-load.php';
class client_management
{  
  //VARIABLE DEFINITION 

    public $user_password, $username, $user_nicename, $user_url, $user_email,$display_name,$nickname, $first_name,   $last_name,
     $description,$rich_editing,  $syntax_highlighting,   $comment_shortcuts, $admin_color, $use_ssl, $user_registered,   
     $show_admin_bar_front, $role, $locale, $sex, $phone, $country;  
  
     //CONSTRUCTOR  
  function __construct($user_data){
     //Sanitization of input and Harshing of password is done by wp functions
    $this->user_password=$user_data['user_pass'];
    $this->username=$user_data['user_login']; 
    $this->user_nicename=$user_data['user_nicename']; 
    $this->user_url=$user_data['user_url']; 
    $this->user_email=$user_data['user_email'];
    $this->display_name=$user_data['display_name'];
    $this->nickname=$user_data['nickname']; 
    $this->first_name=$user_data['first_name'];   
    $this->last_name=$user_data['last_name'];
    $this->description=$user_data['description'];
    $this->rich_editing=$user_data['rich_editing']; 
    $this->syntax_highlighting=$user_data['syntax_highlighting']; 
    $this->comment_shortcuts=$user_data['comment_shortcuts']; 
    $this->admin_color=$user_data['admin_color'];
    $this->use_ssl=$user_data['use_ssl']; 
    $this->user_registered=$user_data['user_registered'];   
    $this->show_admin_bar_front=$user_data['show_admin_bar_front']; 
    $this->role=$user_data['role'];
    $this->locale=$user_data['locale']; 
    $this->sex=$user_data['sex']; 
    $this->phone=$user_data['phone_number'];   
    $this->country=$user_data['country']; 

   }

  //ADD USERS
	function add_users  ()
	{    
    $userdatax = array(
    'ID'                    => 0,    //(int) User ID. If supplied, the user will be updated.
    'user_pass'             => $this->user_password,   //(string) The plain-text user password.
    'user_login'            => $this->username,   //(string) The user's login username.
    'user_nicename'         => $this->user_nicename,   //(string) The URL-friendly user name.
    'user_url'              => $this->user_url,   //(string) The user URL.
    'user_email'            => $this->user_email,   //(string) The user email address.
    'display_name'          => $this->display_name,   //(string) The user's display name. Default is the user's username.
    'nickname'              => $this->nickname,   //(string) The user's nickname. Default is the user's username.
    'first_name'            => $this->first_name,   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if display_name is not specified.
    'last_name'             => $this->last_name,   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if display_name is not specified.
    'description'           => $this->description,   //(string) The user's biographical description.
    'rich_editing'          => $this->rich_editing,   //(string|bool) Whether to enable the rich-editor for the user. False if not empty.
    'syntax_highlighting'   => $this->syntax_highlighting,   //(string|bool) Whether to enable the rich code editor for the user. False if not empty.
    'comment_shortcuts'     => $this->comment_shortcuts,   //(string|bool) Whether to enable comment moderation keyboard shortcuts for the user. Default false.
    'admin_color'           => $this->admin_color,   //(string) Admin color scheme for the user. Default 'fresh'.
    'use_ssl'               => $this->use_ssl,   //(bool) Whether the user should always access the admin over https. Default false.
    'user_registered'       => $this->user_registered,   //(string) Date the user registered. Format is 'Y-m-d H:i:s'.
    'show_admin_bar_front'  => $this->show_admin_bar_front,   //(string|bool) Whether to display the Admin Bar for the user on the site's front end. Default true.
    'role'                  => $this->role,   //(string) User's role.
    'locale'                => $this->locale,   //(string) User's locale. Default empty.
	
	 'sex'                    => $this->sex,   //(string) User's locale. Default empty.
	 'phone_number'           => $this->phone,   //(string) User's locale. Default empty.
	 'country'                => $this->country,   //(string) User's locale. Default empty.	 
 
    );      	  
     wp_insert_user($userdatax );
     
     // var_dump($wpdb);
     // echo "dsfsdfsdfsdf".$wpdb->last_error;
     
	}
	
	
} // End of class
/*
$user_data=array(
  'ID'                    => 0,    //(int) User ID. If supplied, the user will be updated.
  'user_pass'             => '12345',// $_SESSION['password'],   //(string) The plain-text user password.
  'user_login'            => 'alex@gmail.com' ,   //(string) The user's login username.
  'user_nicename'         =>  'alex ovey',   //(string) The URL-friendly user name.
  'user_url'              => '',   //(string) The user URL.
  'user_email'            => 	'myemail@filo.com' ,   //(string) The user email address.
  'display_name'          => '',   //(string) The user's display name. Default is the user's username.
  'nickname'              => '',   //(string) The user's nickname. Default is the user's username.
  'first_name'            => 	'filo' ,   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
  'last_name'             => 	'bully' ,   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
  'description'           => '',   //(string) The user's biographical description.
  'rich_editing'          => '',   //(string|bool) Whether to enable the rich-editor for the user. False if not empty.
  'syntax_highlighting'   => '',   //(string|bool) Whether to enable the rich code editor for the user. False if not empty.
  'comment_shortcuts'     => '',   //(string|bool) Whether to enable comment moderation keyboard shortcuts for the user. Default false.
  'admin_color'           => '',   //(string) Admin color scheme for the user. Default 'fresh'.
  'use_ssl'               => '',   //(bool) Whether the user should always access the admin over https. Default false.
  'user_registered'       => '',   //(string) Date the user registered. Format is 'Y-m-d H:i:s'.
  'show_admin_bar_front'  => '',   //(string|bool) Whether to display the Admin Bar for the user on the site's front end. Default true.
  'role'                  => '',   //(string) User's role.
  'locale'                => '',   //(string) User's locale. Default empty.
  
   'sex'                  => '',   //(string) User's locale. Default empty.
   'phone_number'         => '2332434234',   //(string) User's locale. Default empty.
   'country'              => 'Kenya',   //(string) User's locale. Default empty.	 
  );

$calovex_user= new client_management($user_data);
$calovex_user->add_users();
if ($calovex_user) {echo "success";} else {echo 'failed';}
var_dump($user_data)
*/
?>

