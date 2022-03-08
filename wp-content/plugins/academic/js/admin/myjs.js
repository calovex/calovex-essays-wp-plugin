
jQuery('.btn-click-me').click(function(){
 alert('welcome !!!');
});
 
 
 
//data insert & update
jQuery('.my_form').submit(function(e){
 
 
 jQuery('#loadingDiv').show();
 
 
 var form=jQuery(this); 
 jQuery.ajax({
     url: ajaxurl+"?action="+form.attr("data-action") ,
     type: 'POST',
     data: jQuery(this).serialize(),
     success: function( data ){
     	console.log(data);
     }
   });
 
 e.preventDefault();
});