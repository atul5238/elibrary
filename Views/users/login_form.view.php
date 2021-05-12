<?php  if(isset($msg4)) : ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <?= $msg4 ?>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
<?php endif; ?>
<div class="border border-dark p-4 rounded bg-dark text-white col-sm-6 col-9 col-lg-12 mx-auto">
	<form method="POST" action="/login" >
		<h5 class="text-center">Login Here !</h5>   
		<input type="email" class="form-control mt-4" name="emailid" id="emailid"  placeholder="Enter Email Address *" value="<?=$emailid?>" required>
		<small class="form-text text-muted text-danger" id='erroremailid'><?=$msg1?></small>
		<input type="password" class="form-control mt-2" id="password" placeholder="Enter Password *" name="password" value='<?=$password?>' required>
		<small class="form-text text-muted text-danger" id="errorpassword"><?=$msg2?></small>
		<small class="form-text text-muted text-right"><a href="/reset_password">Forgot Password?</a></small>
		<button class="btn  btn-primary btn-block mt-2" type="submit">Log in</button>
		<div class="row mt-3 m-1">
			<hr class="d-inline col">
			<p class="text-white text-center d-inline col-7 mt-1">or</p>
			<hr class="d-inline col"> 	
		</div>         
		<a class="btn btn-block btn-link mt-1 " href="/index?register=1">Register</a> 	
	</div>
</form>          
</div>
