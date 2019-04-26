<?php 

	session_start();

	// Category Delete Start
	if (isset(($_GET['category_id']))) {
		$category_id = $_GET['category_id'];
		$con = mysqli_connect('localhost','root','','cms_mini');
		$sql = "DELETE FROM categories WHERE id = $category_id";
		$query = mysqli_query($con,$sql);
		header("location:categories.php");

	}
	// Category Delete End

	// Post Delete Start
	if (isset($_GET['post_del'])) {
		$post_del = $_GET['post_del'];
		$con = mysqli_connect('localhost','root','','cms_mini');
		$sql = "DELETE FROM posts WHERE p_id = $post_del";
		// die($sql);
		$query = mysqli_query($con,$sql);
		header("location:post.php");
	}
	

 ?>