<?php 

	session_start();

	if ($_SESSION['uname']) {
		include 'tamplate/head.php';
		include 'tamplate/site-header.php';
		
	}else{
		header("location:login.php");
	}

 ?>

<div class="container-fluid">
	<div class="row">
		<?php include"tamplate/aside.php" ?>
		<div class="col-md-9">
			<div class="container-fluid">
				<div class="row py-5">
					<div class="card border-secondary mb-3" style="max-width: 20rem;">
					  <div class="card-header">Header</div>
					  <div class="card-body">
					    <h4 class="card-title">Secondary card title</h4>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
					<div class="card border-secondary mb-3" style="max-width: 20rem;">
					  <div class="card-header">Header</div>
					  <div class="card-body">
					    <h4 class="card-title">Secondary card title</h4>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
					<div class="card border-secondary mb-3" style="max-width: 20rem;">
					  <div class="card-header">Header</div>
					  <div class="card-body">
					    <h4 class="card-title">Secondary card title</h4>
					    <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
					  </div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


