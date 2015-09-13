<?php include("./db/connect.php"); ?>
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

		<?php
			//Assigning the Post from the form
			$reg = @$_POST['reg']; 

			$confirmation = '';
			$error = '';
	
			//Declaring variables to prevent errors
			$firstName = ""; //First Name
			$lastName = ""; //Last Name
			$username = ""; //Username
			$email = ""; //Email
			$email2 = ""; //Email Confirmation
			$password = ""; //Password
			$password2 = ""; //Password Confirmation
			$signUpDate = ""; //Sign Up Date
			$u_check = ""; //Check if username exists

			//registration form
			$firstName = strip_tags(@$_POST['firstName']);
			$lastName = strip_tags(@$_POST['lastName']);
			$username = strip_tags(@$_POST['username']);
			$email = strip_tags(@$_POST['email']);
			$email2 = strip_tags(@$_POST['email2']);
			$password = strip_tags(@$_POST['password']);
			$password2 = strip_tags(@$_POST['password2']);
			$signUpDate = date("Y-m-d"); //Year - Month - Day
			
			if ($reg) {
				
				if ($email==$email2) {
					// Check if user already exists
					$u_check = mysql_query("SELECT username FROM users WHERE username='$username'");
					// Count the amount of rows where username = $un
					$check = mysql_num_rows($u_check);
					//Check whether Email already exists in the database
					$e_check = mysql_query("SELECT email FROM users WHERE email='$email'");
					//Count the number of rows returned
					$email_check = mysql_num_rows($e_check);
					
					if ($check == 0) {
  
  						if ($email_check == 0) {
							
							//check all of the fields have been filed in
							if ($firstName&&$lastName&&$username&&$email&&$email2&&$password&&$password2) {

								// check that passwords match
								if ($password==$password2) {

									// check the maximum length of username/first name/last name does not exceed 25 characters
									if (strlen($username)>25||strlen($firstName)>25||strlen($lastName)>25) {
										
										echo "The maximum limit for username/first name/last name is 25 characters!";
									}
									else
									{
										// check the maximum length of password does not exceed 25 characters and is not less than 5 characters
										if (strlen($password)>30||strlen($password)<5) {
					
											echo "Your password must be between 5 and 30 characters long!";
										}
										else
										{
											//encrypt password and password 2 using md5 before sending to database
											$password = md5($password);
											$password2 = md5($password2);
											$query = mysql_query("INSERT INTO users VALUES ('','$username','$firstName','$lastName','$email','$password','$signUpDate','0','Write something about yourself.',null,null)");
											//die("<h2>Welcome to Heads Up Ent.</h2>Login to your account to get started ...");
											$confirmation = "<h2>Welcome to Heads Up Ent.</h2>Login to your account to get started ...";
										}
									}
								}
								else {
								
									$error = "Your passwords don't match!";
								}
							}
							else
							{
								$error = "Please fill in all of the fields";
							}
						}
						else
						{
							$error = "Sorry, but it looks like someone has already used that email!";
						}
					}
					else
					{
						$error = "Username already taken ...";
					}
				}
				else {
					$error = "Your E-mails don't match!";
				}
			}

			if(isset($_POST["user_login"]) && isset($_POST["password_login"]))
			{
				$user_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["user_login"]); //filter everything but numbers and letters
				$password_login = preg_replace('#[^A-Za-z0-9]#i', '', $_POST["password_login"]); //filter everyhting but numbers and letters

				$sql  = mysql_query("SELECT id FROM users WHERE username= '$user_login' OR email='$user_login' AND paassword='$password_login' LIMIT 1"); //Query

				//Check for their existance
				$userCount = mysql_num_rows($sql); //Count the number of rows returned
				if($userCount == 1)
				{
					while($row = mysql_fetch_array($sql)){
						$id = $row["id"];
					}
				

				$_SESSION["user_login"] = $user_login;
				header("location: index.php");
				exit();
				}else{
				echo 'That information is incorrect, try again';
				exit();

			}

		 ?>

		
		<!-- Content -->
			<div id="content">
				<div class="inner">

					<table>
						<tr>
							<td width="60%" valign="top">
								<h2>Join Heads Up Ent. Today!</h2>
								<br>
								<img src="images/lumen-nightclub.jpg" alt="Nightclub Scene" width="450">
							</td>
							<td width="40%" valign="top">
								<h2>Sign Up Below!</h2>
								<div class="Registration_Error"> <?php echo $error; ?></div>
								<form action="index.php" method="POST">
									<input type="text" name="firstName" size="25" placeholder="First Name"/><br>
									<input type="text" name="lastName" size="25" placeholder="Last Name"/><br>
									<input type="text" name="username" size="25" placeholder="Username"/><br>
									<input type="text" name="email" size="25" placeholder="Email"/><br>
									<input type="text" name="email2" size="25" placeholder="Email Confirmation"/><br>
									<input type="text" name="password" size="25" placeholder="Password"/><br>
									<input type="text" name="password2" size="25" placeholder="Password Confirmation"/><br>
									<div class="Confirmation"><?php echo $confirmation; ?></div>
									<input type="submit" name="reg" value="Sign Up!"/>
									
								</form>

							</td>
						</tr>
					</table>

					

				</div>
			</div>

		<!-- Sidebar -->
			<div id="sidebar">

				<!-- Logo -->
					<h1 id="logo"><a href="#">[Insert Logo Here]</a></h1>

				<!-- Login Section -->
					<section class="box text-style1">
						<header>
							<h2>Welcome Back!</h2>	
						</header>

						<form action="index.php" method="POST">
							<input type="text" name="user_login" placeholder="Email or Username"/><br>
							<input type="text" name="password_login" placeholder="Password"/>
							<a href="#">Forgot your password?</a><br>
							<input type="submit" name="submit" value="Login"/>
							<!--Facebook Login Button-->
							<div class="fb-login-button" data-max-rows="1" data-size="large" data-show-faces="false" data-auto-logout-link="false"></div>
						</form>

						
					</section>

				<!-- Copyright -->
					<ul id="copyright">
						<li>&copy; Golden Infinity.</li>
					</ul>


			</div>

			<!--Facebook JavaScript SDK-->
			<script>
		      window.fbAsyncInit = function() {
		        FB.init({
		          appId      : '407161576144570',
		          xfbml      : true,
		          version    : 'v2.4'
		        });
		      };

		      (function(d, s, id){
		         var js, fjs = d.getElementsByTagName(s)[0];
		         if (d.getElementById(id)) {return;}
		         js = d.createElement(s); js.id = id;
		         js.src = "//connect.facebook.net/en_US/sdk.js";
		         fjs.parentNode.insertBefore(js, fjs);
		       }(document, 'script', 'facebook-jssdk'));
    		</script>

<?php include("footer.php"); ?>