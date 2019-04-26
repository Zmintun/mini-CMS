<div class="list-group">
		  <a href="" class="list-group-item list-group-item-action active">
		   Recent Posts
		  </a>
		  <?php 
		  	$con = mysqli_connect('localhost','root','','cms_mini');
			$sql = "SELECT * FROM posts";
			$query = mysqli_query($con,$sql);
		  	$no = 0;
		  	while ($out = mysqli_fetch_assoc($query)) {
			$no++;
		   ?>
		  		<a href="single.php?post_id=<?php echo($out['p_id']) ?>" class="list-group-item list-group-item-action"><?php echo $no.". ".$out['title']; ?></a>
		  <?php } ?>
		</div>