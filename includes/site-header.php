
</head>
<body>
<header class="container-fluid bg-primary" >
  <div class="row">
  	<div class="col-12">
  		<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
		  <a class="navbar-brand" href="<?php echo $base; ?>">Mini CMS</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation" style="">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarColor01">
		    <ul class="navbar-nav mr-auto">
		    <?php 
			    $con = mysqli_connect('localhost','root','','cms_mini');
			    $sql = "SELECT * FROM categories";
			    $query = mysqli_query($con,$sql);
				while ($out = mysqli_fetch_assoc($query)) {
			?>
		      <li class="nav-item active">
		        <a class="nav-link" href="post.php?category_id=<?php echo($out['id']) ?>"><?php echo $out['cat_name']; ?><span class="sr-only">(current)</span></a>
		      </li>		
		    <?php } ?>      
		    </ul>
		    <form class="form-inline ">		      
		      <a href="admin/" class="btn btn-info" id="login" type="submit">Login</a>
		    </form>
		  </div>
		</nav>
  	</div>
  </div>
</header>