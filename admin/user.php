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
				<div class="row">
					<div class="col-md-6 py-5">
						<form>
						  <fieldset>
						    <div class="form-group">
						      <label for="Username">Username</label>
						      <input type="text" class="form-control" id="Username" placeholder="Enter Username">						      
						    </div>
						    <div class="form-group">
						      <label for="exampleInputEmail1">Email address</label>
						      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">						      
						    </div>
						    <div class="form-group">
						      <label for="password">Password</label>
						      <input type="password" class="form-control" id="password" placeholder="Enter Password">						      
						    </div>
						    <button type="submit" class="btn btn-primary">Submit</button>
						  </fieldset>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


