<?php include '../includes/head.php'; ?> 
<?php include '../includes/site-header.php'; ?>
<div class="container">
	<div class="row py-5">
		<div class="col-md-4"></div>
		<div class="col-md-4">
			<?php 
				if (isset($_POST['login'])) {
					$uname = $_POST['uname'];
					$pass = $_POST['pass'];
					if ($uname == "admin" && $pass == 'admin') {

						session_start();
						$_SESSION['uname'] = $uname;
						$_SESSION['u_id'] = 1;
						header("location:index.php");
						
					}else{
						header("location:login.php");
					}
				}
			 ?>
			<form method="post">
				<div class="form-group">
			      <label for="uname">Username</label>
			      <input class="form-control" id="uname" name="uname" placeholder="Enter user name" type="text">
			      <small id="emailHelp" class="form-text text-muted"></small>
			    </div>
			    <div class="form-group">
			      <label for="password">Password</label>
			      <input class="form-control" id="password" name="pass" placeholder="Enter password" type="password">
			      <small id="emailHelp" class="form-text text-muted"></small>
			    </div>
			    <div class="form-group">      
			      <input type="submit" class="btn btn-primary" name="login" value="Login">      
			    </div>
			</form>
		</div>
		<div class="col-md-4"></div>
		<script type="text/javascript">
			$('#login').remove();
		</script>
	</div>
</div>

