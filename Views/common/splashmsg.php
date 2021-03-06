<style>
	.warning-color{
		color:rgb(217,97,9);
	}
</style>
<?php 
if(!isset($_GET['msgtype']) || isset($_SESSION['type']))
	header('location:/');
elseif($_GET['msgtype']=='unverified'){
	$headermsg='';
	$bodymsg='We have sent you a verification link on your email, kindly verify!';
	$footermsg='';
}
elseif($_GET['msgtype']=='forgotpassword'){
	$headermsg='';
	$bodymsg='We have sent you an email to reset your password';
	$footermsg=' ';
}

elseif($_GET['msgtype']=='verificationfailed'){
	$headermsg='<span class="warning-color">Sorry, Something went wrong!</span>';
	$bodymsg='<span class="warning-color">Verification Failed</span>';
	$footermsg='<span class="warning-color">Please try again later!</span>';
}
else{
	$headermsg='';
	$bodymsg='Page Not Found!';
	$footermsg='';

}
?>
<div class="container-fluid bg-light d-flex p-5" style="min-height:calc(100% - 180px);">
	<div class="align-self-center bg-light w-100">
		<div class="col-sm-8 col-md-6 col-xl-4 col-lg-5 bg-light  text-center mx-auto w-100">
			<p class="lead"><?=$headermsg?></p>
			<hr class="my-4">
			<h1 class="display-6"><?=$bodymsg?></h1>
			<hr class="my-4">
			<p class="lead"><?=$footermsg?></p>
		</div>			
	</div>
</div>
