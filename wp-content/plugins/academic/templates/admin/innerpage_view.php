<div>
 
 <h2>This is inner page</h2>
 
 <form action="" method="post" class="my_form" data-action="save_my_settings">
 
 Enter Your name<br>
 
 <input type="text" name="yourname" id="yourname" class="text_box" placeholder="Enter your name" value="<?php echo $saved_data ? $saved_data['name'] : '' ; ?>"> 
 
 <input type="submit" value="Save">
 
 </form>
 

</div>