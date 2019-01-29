<?php
   include("connection.php");
   session_start();
   if(isset($_SESSION['login_user'])){
      header("location:home.php");
   }
   $error = '';
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $password = md5(mysqli_real_escape_string($db,$_POST['password'])); 
      
      $sql = "SELECT username FROM users WHERE username = '$username' and password = '$password'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
		
      if($count == 1) {
         $_SESSION['login_user'] = $username;
         
         header("location: home.php");
      }else {
         $error = "Your Username or Password is invalid";
      }
   }
?>

<!Doctype html>
<html>
	<head>
		<title>MRBS</title>
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		
		<div class="content">
			<div class="head"><h1>MEETING ROOM BOOKING SYSTEM</h1></div>

			<div class="description">
				<p>Description : Here you can book the Meeting Rooms online.</p>
			</div>
			
			<form class="LoginForm" name="LoginForm" action="" method="POST">
				<h3 style="text-align:center;margin-top:-5px;margin-bottom:25px;">Login</h3>
				<label>Name : </label><input type="text" name="username" required/>
				<label>Password :</label><input type="password" name="password" required>
				<input id="loginInput" type="submit" name="submit" value="Login"/>
				<a href="ForgotPassword.php" class="link">Forgot password?</a><br />
				<a href="signup.php" class="link">Not yet registered?</a><br />
				<p><?php echo $error ?></p>
			</form>
			<div class="content-left">
				<h3>Recent Activities</h3>
				* Recent 1<br />* Recent 2<br />* Recent 3<br />* Recent 4<br />* Recent 5<br />
			</div>
			<div class="content-right">
				<h3>About Us</h3>
				<p>CSE students<br />AB-II 013 class</p>						
			</div>
		</div>
		<footer>
		</footer>
	</body>
</html>
