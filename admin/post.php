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
		<div class="col-md-9 py-2">
			<ul class="nav nav-tabs">
			  <li class="nav-item">
			    <a class="nav-link active" data-toggle="tab" href="#add">Add New</a>
			  </li>
			  <li class="nav-item">
			    <a class="nav-link" data-toggle="tab" href="#list">All Posts</a>
			  </li>			  
			</ul>
			<div id="myTabContent" class="tab-content">
			  <div class="tab-pane active p-2" id="add">
				  	<?php 				  		
					if (isset($_POST['post'])) {
						$title = $_POST['post-title'];
						$para = $_POST['post-para'];
						$cat = $_POST['cat'];
						$u_id = $_SESSION['u_id'];
						if (empty($title) || empty($para) || empty($cat)) {
							echo '<div class="alert alert-danger" role="alert">
							  Please type input
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
						}else{
							$con = mysqli_connect('localhost','root','','cms_mini');
							$sql = "INSERT INTO posts (title,para,cat,u_id) VALUES ('$title','$para','$cat','$u_id')";
							if (mysqli_query($con,$sql)) {
								echo '<div class="alert alert-success" role="alert">
								  <b>'.$title.'</b> is successfully added.
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>';
								}else{
									echo '<div class="alert alert-danger" role="alert">
									  <b>'.$title.'</b> is failed.
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>';
								}
							}
						}

					if (isset($_POST['update'])) {
						$post_id = $_POST['post_id'];
						$title = $_POST['post-title'];
						$para = $_POST['post-para'];
						$cat = $_POST['cat'];
						$u_id = $_SESSION['u_id'];
						if (empty($title) || empty($para) || empty($cat)) {
							echo '<div class="alert alert-danger" role="alert">
							  Please type input
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
							    <span aria-hidden="true">&times;</span>
							  </button>
							</div>';
						}else{
							$con = mysqli_connect('localhost','root','','cms_mini');
							$sql = "UPDATE posts SET title='$title',para='$para',cat='$cat' WHERE p_id=$post_id";			

							if (mysqli_query($con,$sql)) {
								echo '<div class="alert alert-success" role="alert">
								  <b>'.$title.'</b> is successfully updated.
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
								    <span aria-hidden="true">&times;</span>
								  </button>
								</div>';
								}else{
									echo '<div class="alert alert-danger" role="alert">
									  <b>'.$title.'</b> is failed.
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
									    <span aria-hidden="true">&times;</span>
									  </button>
									</div>';
								}
						}
					}
						

					if (isset($_GET['post_update'])) {
						$post_update = $_GET['post_update'];
						$con = mysqli_connect('localhost','root','','cms_mini');
						$sql = "SELECT * FROM posts WHERE p_id = $post_update";
						$query = mysqli_query($con,$sql);
						$out = mysqli_fetch_assoc($query);
						?>
						<form method="post">
							<input type="hidden" value="<?php echo $out['p_id'] ?>" name="post_id">
							<div class="form-group">
								<label for="newpost" class="h4">Post Title</label>
								<input type="text" class="form-control" id="newpost" value="<?php echo $out['title']; ?>" placeholder="Post Title" name="post-title">
							</div>
							<div class="form-group">
							 <textarea name="post-para" id="summernote" ><?php echo $out['para']; ?></textarea>
							</div>
							<div class="form-group w-50 ">			     
						      <div class="form-group w-50 ">			     
						      <select class="form-control" name="cat" id="">
						      	 <?php 
					      	 	    $con = mysqli_connect('localhost','root','','cms_mini');
									$sql = "SELECT * FROM categories";
									$query = mysqli_query($con,$sql);
									$no = 0;
									while ($cat_out = mysqli_fetch_assoc($query)) {
									$no++;
									?>
									<option value="<?php echo $cat_out['id']; ?>" <?php echo $out['cat'] == $no ? 'selected':''; ?>><?php echo $cat_out['cat_name']; ?>	
									</option>
						        <?php } ?>
						      </select>
						    </div>
						    </div>
							<div class="form-group text-right">
								<button type="submit" class="btn btn-primary btn-lg " id="post" name="update">
									Update
								</button>
								<a href="post.php" class="btn btn-secondary btn-lg ">Cancel</a>
							</div>
						</form>
					<?php }else{ ?>
						<form method="post">
							<div class="form-group">
								<label for="newpost" class="h4">Post Title</label>
								<input type="text" class="form-control" id="newpost" placeholder="Post Title" name="post-title">
							</div>
							<div class="form-group">
							 	<textarea name="post-para" id="summernote"></textarea>
							</div>
							<div class="form-group w-50 ">			     
						      <select class="form-control" name="cat" id="">
						      	 <?php
									    $con = mysqli_connect('localhost','root','','cms_mini');
										$sql = "SELECT * FROM categories";
										$query = mysqli_query($con,$sql);
										while ($out = mysqli_fetch_assoc($query)) {									
										?>
						        	<option value="<?php echo $out['id']; ?>">
						        		<?php echo $out['cat_name']; ?>				        		
						        	</option>
						        <?php } ?>
						      </select>
						    </div>
							<div class="form-group text-right">
								<button type="submit" class="btn btn-primary btn-lg " id="post" name="post">
									Post
								</button>
							</div>
						</form>
					<?php } ?>
				<script>
				    $(document).ready(function() {
				        $('#summernote').summernote({
						  height: 250
						  });
				    });
				</script>			    
			  </div>
			  <div class="tab-pane p-2" id="list">
			  	<table class="table table-hover table-striped">
					<thead class="table-primary">
					    <tr>
					      <th scope="col">No</th>
					      <th scope="col">Functions</th>
					      <th scope="col">Post Title</th>
					      <th scope="col">Category</th>
					      <th scope="col">Time</th>
					    </tr>
					 </thead>
				  	<tbody>
					   <?php 
					    $con = mysqli_connect('localhost','root','','cms_mini');
						$sql = "SELECT * FROM posts INNER JOIN categories ON posts.cat=categories.id";
						$query = mysqli_query($con,$sql);
						$no = 0;
						while ($out = mysqli_fetch_assoc($query)) {			
						$no++;				
						?>
					    <tr>
					      <th scope="row"><?php echo $no; ?></th>
					      <td>
					      	<a href="post.php?post_update=<?php echo $out['p_id']; ?>" class="btn btn-warning btn-sm mr-1 rounded">Update</a>
					      	<a href="del.php?post_del=<?php echo $out['p_id']; ?>" class="btn btn-danger btn-sm rounded">Delete</a>
					      </td>
					      <td><?php echo $out['title']; ?></td>
					      <td><?php echo $out['cat_name']; ?></td>
					      <td><?php echo $out['time']; ?></td>
					    </tr>
						<?php } ?>
					</tbody>
				</table>
			  </div>			 
			</div>		
		</div>
	</div>
</div>
