<!DOCTYPE HTML>

<html>
	<head>
		<title>Heads Up Ent.</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="css/main.css" />
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="#">[Insert Logo Here]</a></h1>

				<!-- Nav -->
					<nav id="nav">
						<ul>
							<li class="current"><a href="#">Latest Posts</a></li>
							<li><a href="#"><?php echo $_SESSION["user_login"]; ?></a></li>
							<li><a href="#">Account Settings</a></li>
							<li><a href="#">Notifications</a></li>
						</ul>
					</nav>

				<!-- Search -->
					<section class="box search">
						<form method="GET" action="search.php" id="search">
							<input type="text" class="text" name="search" placeholder="Search" />
						</form>
					</section>

				<!-- Events -->
					<section class="box text-style1">
						<header>
							<h2>Upcoming Events</h2>	
						</header>
						<div class="inner">
							<p>
								<ul>
									<li><a href="">[Event #1]</a></li>
									<li><a href="">[Event #2]</a></li>
									<li><a href="">[Event #3]</a></li>
									<li><a href="#">See More...</a></li>
								</ul>
							</p>
						</div>
					</section>

				<!-- Friends List -->
					<section class="box friends-list">
						<header>
							<h2>Friends</h2>
						</header>
						<ul>
							<li><a href="#">Lorem ipsum dolor</a></li>
							<li><a href="#">Feugiat nisl aliquam</a></li>
							<li><a href="#">Sed dolore magna</a></li>
							<li><a href="#">Malesuada commodo</a></li>
							<li><a href="#">See More...</a></li>
						</ul>
					</section>

				<!-- Following List -->
					<section class="box follow-list">
						<header>
							<h2>Following</h2>
						</header>
						<ul>
							<li><a href="#">Lorem ipsum dolor</a></li>
							<li><a href="#">Feugiat nisl aliquam</a></li>
							<li><a href="#">Sed dolore magna</a></li>
							<li><a href="#">Malesuada commodo</a></li>
							<li><a href="#">See More...</a></li>
						</ul>
					</section>


				<!-- Copyright -->
					<ul id="copyright">
						<li><a href="">Logout</a></li>
						<li>&copy; Golden Infinity.</li>
					</ul>

			</div>
