<?


<div>
 <h2>Hi this is Dash board</h2>
 <div>Dashboard contents will come here</div>
 <div>
 <?php 
 
 echo ($saved_data && isset($saved_data['name']) && $saved_data['name'] !='') ?  'Welcome <span class="mysample-name" >'. $saved_data['name']. '</span>' : '';
 
 ?>
 <button class="btn-click-me">Click Me</button>
 </div>
</div>