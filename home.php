<?php
	//Every secure page should have the following code testing to see if 
	//the session variable has been set.
	session_start();
	if(!isset($_SESSION['username'])){
		header("location:index.php?action=no");
	}
	
?>

<?php include("sidebar.php"); ?>

	<!-- Content -->
		<div id="content">
			<div class="inner">

				<h2><?php echo $_SESSION['username'];?></h2>

			</div>
		</div>

		
<?php include("footer.php"); ?>