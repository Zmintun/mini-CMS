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
					<div class="col-md-4 py-5">
						<?php 
							if (isset($_POST['addnew'])) {								
								$cat = $_POST['cat'];
								if (empty($cat)) {
									echo '<div class="alert alert-danger" role="alert">
										  type input
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										</div>';
								}else {
									$con = mysqli_connect('localhost','root','','cms_mini');
									$sql = "INSERT INTO categories(cat_name) VALUES ('$cat')";
									$query = mysqli_query($con,$sql);
									if ($query) {
										echo '<div class="alert alert-success" role="alert">
											  <b>'.$cat.'</b> is added.
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>';
										}else{
											echo '<div class="alert alert-danger" role="alert">
											  Failed!
											  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
											    <span aria-hidden="true">&times;</span>
											  </button>
											</div>';
										}
									}								
								}

							if (isset($_POST['update'])) {
								$category_id = $_POST['category_id'];
								$cat = $_POST['cat'];
								if (empty($cat)) {
									echo '<div class="alert alert-danger" role="alert">
										  type input
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										</div>';
								}else {
								$con = mysqli_connect('localhost','root','','cms_mini');
								$sql = "UPDATE categories SET cat_name = '$cat' WHERE id = $category_id";
								$query = mysqli_query($con,$sql);
								if ($query) {
									echo '<div class="alert alert-success" role="alert">
										  Updated Success
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										</div>';
									}else{
										echo '<div class="alert alert-danger" role="alert">
										  Failed!
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										    <span aria-hidden="true">&times;</span>
										  </button>
										</div>';
									}									
								}
							}

						 ?>						
						<?php 
							if (isset($_GET['category_update'])) {
								$category_update = $_GET['category_update'];
								$con = mysqli_connect('localhost','root','','cms_mini');
								$sql = "SELECT * FROM categories WHERE id = $category_update";
								$query = mysqli_query($con,$sql);
								$out = mysqli_fetch_assoc($query);
								?>
								<form method="post">
									<input type="hidden" value="<?php echo $out['id'] ?>" name="category_id">
									<div class="form-group">
									<label for="cate" class="h4">Update Categories</label>
								      <input autocomplete="off" type="text" class="form-control" id="cate" placeholder="Category Name" name="cat" value="<?php echo $out['cat_name'] ?>">
								    </div>
								    <button class="btn btn-primary float-right" name="update">Update</button>  
								</form>	

							<?php } else { ?>
								<form method="post">
									<div class="form-group">
									<label for="cate" class="h4">Add New Categories</label>
								      <input type="text" class="form-control" id="cate" placeholder="Category Name" name="cat">
								    </div>
								    <button class="btn btn-primary float-right" name="addnew">Add New</button>								    
								</form>	
							<?php } ?>		
					</div>
					<div class="col-md-8 py-5">
						<table class="table table-hover table-striped">
							  <thead class="table-primary">
							    <tr>
							      <th scope="col">No</th>
							      <th scope="col">Name</th>
							      <th scope="col">Action</th>
							    </tr>
							  </thead>
							  <tbody>
							    <?php 
							    $con = mysqli_connect('localhost','root','','cms_mini');
								$sql = "SELECT * FROM categories";
								$query = mysqli_query($con,$sql);
								while ($out = mysqli_fetch_assoc($query)) {									
								?>
							    <tr>
							      <th scope="row"><?php echo $out['id']; ?></th>
							      <td><?php echo $out['cat_name']; ?></td>
							      <td>
							      	<a href="categories.php?category_update=<?php echo $out['id'] ?>" class="btn btn-warning btn-sm mr-1 rounded" name="update">Update</a>
							      	<a href="del.php?category_id=<?php echo $out['id'] ?>" class="btn btn-danger btn-sm rounded" name="del">Delect</a>
							      </td>
							    </tr>
								<?php }  ?>
							</tbody>
						</table>
					</div>
				</div>				
			</div>
		</div>
	</div>
</div>



