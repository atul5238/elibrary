<?php
$msg1=$msg2=$msg3=$msg4=NULL;
?>
<div class="modal fade" id="addAdminModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog " role="form">
    <form action='/addadmin' method="POST" enctype="multipart/form-data" >
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Add New Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
       
          <div class="col mt-2">
            <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Name*"  required> 
            <small class="form-text text-muted text-danger" id='erroruser_name'><?=$msg1?></small>   
          </div>
          
           <div class="col mt-2 ">
             <input type="email" class="form-control" id="email" name="email" placeholder="Email*"  required>
             <small class="form-text text-muted text-danger" id='erroremail'><?=$msg2?></small>  
           </div>
           <div class="col mt-2 ">
             <input type="password"  class="form-control" id="password" name="password" placeholder="Password *" required>
             <small class="form-text text-muted text-danger" id='errorpassword'><?=$msg2?></small>  
           </div>
         
          
    <div class="modal-footer">
      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      <button type="submit" class="btn btn-primary">Create Admin</button>
    </div>
  </div>
</form>
</div>
</div>