<?php if (session_status() == PHP_SESSION_NONE) {
	session_start();
}
?>
<nav class="p-3 px-lg-5 border-bottom shadow-sm navbar navbar-expand-sm navbar-dark text-white bg-dark" style="z-index:3">

	<a href="/" class="navbar-brand ml-5" title='Go to home'>
		<h2>eLibrary</h2>
	</a>

	<?php if ((Request::uri() == '') || (Request::uri() == 'index') || (Request::uri() == 'index.php') || (Request::uri() == 'login') || (Request::uri() == 'editbook')) : ?>
		<button class="navbar-toggler mr-5" type="button" data-toggle="collapse" data-target="#navbartoggler" aria-controls="navbartoggler" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon" title="Menu"></span>
		</button>
	<?php endif; ?>

	<div class="collapse navbar-collapse" id="navbartoggler">
		<ul class="navbar-nav mr-lg-0 mx-auto text-center">
			<?php if ((Request::uri() == 'verifymsg')) : ?>
				<li class="nav-item">Done Verification?<a class="btn btn-outline-primary mr-5 ml-5" href="/index">Log in</a></li>

			<?php elseif ($type === 'inadmin') : ?>
				<li class="nav-item mt-2 mb-2">
				<a class="btn text-white <?php echo isset($_GET['view'])&& 'users' === $_GET['view']? 'font-weight-bolder': ''?>"  href="/login?view=users">
								<i class="fas fa-users"></i>
								Users
							</a>
				
					<a class="btn text-white  <?php echo isset($_GET['view'])&& 'books' === $_GET['view']? 'font-weight-bolder': ''?>" href="/login?view=books">
						<i class="fas fa-book"></i>
						Books
					</a>
				
				</li>
				<?php endif;  ?>
				<?php if (isset($_SESSION['username'])):?>
				<li class="nav-item mt-2 mb-2 mr-2">
					<a class="btn text-white " href="login?listbooks=shelf" title="list of read books">My Shelf</a>
				</li>
				<li class="nav-item mt-2 mb-2 mr-2">
					<a class="btn text-white " href="login?listbooks=fav" title="list of read books">My Favorites</a>
				</li>
				<li class="nav-item mt-2 mb-2 mr-2">
					<a class="btn text-white " href="login?listbooks=finised" title="list of read books">My Finished</a>
				</li>
				<li class="nav-item mt-2 mb-2 mr-2">
					<a class="btn text-white " href="login?listbooks=reading-history" title="list of read books">Reading History</a>
				</li>
				<li class="nav-item mr-3">
					Hello, <b><i><?= $_SESSION['username'] ?></i></b>
					<button type="button" class="btn btn-danger mt-2 mb-2 mr-lg-5 ml-lg-5 ml-2" data-toggle="modal" data-target="#logoutModal" title='logout my account'><i class="fas fa-sign-out-alt">Signout</i></button>
				</li>
			<?php endif;?>
			</ul>
	</div>
</nav>