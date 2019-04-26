<?php include 'includes/head.php'; ?> 
<?php include 'includes/site-header.php'; ?>
<div class="container-fluid">
  <div class="row py-5">
    <div class="col-md-9">
    	<div class="container">
    		<div class="row">
    			<?php 
    				if (isset($_GET['category_id'])) {
    					$category_id = $_GET['category_id'];
    					$con = mysqli_connect('localhost','root','','cms_mini');
    					$sql = "SELECT * FROM posts WHERE cat = $category_id";
    					$query = mysqli_query($con,$sql);
    					$no = 0;
    					while ($out = mysqli_fetch_assoc($query)) {
    					$no++;
								
				?>
    			<div class="col-sm-12 col-md-6 col-lg-4">
    				<div class="card text-white bg-primary mb-3">
					  <div class="card-header"><?php echo $out['time']; ?></div>
					  <div class="card-body">
					    <h4 class="card-title"><?php echo $no.". ".$out['title']; ?></h4>
					    <p class="card-text"><?php echo substr($out['para'], 0, 200) ?></p>
                        <a href="single.php?post_id=<?php echo($out['p_id']) ?>" class="btn btn-secondary btn-sm">More</a>
					  </div>					  
					</div>
    			</div>
    			
    			<?php } } ?>

    		</div>
    	</div>
    </div>
    
    <div class="col-md-3">
    	<?php include 'includes/recent.php'; ?>      
    </div>

  </div>
</div>

