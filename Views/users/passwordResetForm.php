<?php
if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
if(isset($_SESSION['type'])){
	header('location:/login');
}
$msg1=$emailid=NULL;
if(isset($_SESSION['error1'])){
	$msg1="<p class='text-danger'>{$_SESSION['error1']}</p>";
	unset($_SESSION['error1']);
}
if(isset($_SESSION['name'])){
	$emailid=$_SESSION['name'];
	unset($_SESSION['name']);
}
?>
<div class="d-flex bg-light py-5"  style="min-height:calc(100% - 180px);">
	<div class="my-auto w-100">
		<form method="POST" action="/send_reset_password_link" onsubmit="return checkFieldEmail('emailid')" class="border border-secondary p-4 rounded bg-dark text-white col-md-5 col-sm-6 col-9 col-xl-3 col-lg-4 mx-auto">
			<h5 class="text-center">Reset Your Password</h5>   
			<input type="email" class="form-control mt-4" name="resemailid" id="emailid"  placeholder="Enter Email Address *" value="<?=$emailid?>" >
			<small class="form-text text-muted text-danger"
			id='erroremailid'><?=$msg1 ?></small>
			<button class="btn  btn-primary btn-block mt-3" type="submit">Send Password Reset Email</button>
		</form>          
	</div>	
</div>
