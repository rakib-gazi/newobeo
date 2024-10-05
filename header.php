<?php 
	include ('baseurl.php');
	ob_start();
?>
<!DOCTYPE html>
<html>
	<?php include('head.php');?>
	<body >
		<header>
			<!-- Navbar -->
			<nav class="bg-cyan-950 px-4 py-3 text-white fixed top-0 left-0 right-0 z-50">
				<div class="mx-4 flex justify-center items-center">
					<a href="<?php echo $baseurl?>dashboard/dashboard.php" >
						<img src="<?php echo $baseurl?>images/logo.png" alt="" class="h-12">
					</a>
				</div>
			</nav>
		</header>