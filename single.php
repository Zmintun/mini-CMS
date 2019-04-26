<?php include 'includes/head.php'; ?> 
<?php include 'includes/site-header.php'; ?>
<div class="container-fluid">
  <div class="row py-5">
    <div class="col-md-9">
    	<div class="container">
    		<div class="row">
    			<?php 
    				if (isset($_GET['post_id'])) {
    					$post_id = $_GET['post_id'];
    					$con = mysqli_connect('localhost','root','','cms_mini');
    					$sql = "SELECT * FROM posts WHERE p_id = $post_id";
    					$query = mysqli_query($con,$sql);
                        $out = mysqli_fetch_assoc($query);  
                        }  					
								
				?>
    			<div class="jumbotron">
                  <h1 class="display-3"><?php echo $out['title']; ?></h1>                  
                  <hr class="my-4">
                  <p><?php echo $out['para']; ?></p>                  
                </div>    			
    			
    		</div>
    	</div>
    </div>
    
    <div class="col-md-3">
        <?php include 'includes/recent.php'; ?>      
    </div>      
    </div>

  </div>
</div>

