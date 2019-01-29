<?php
include('connection.php');
   session_start();
   if(isset($_SESSION['login_user'])){
      header("location:home.php");
   }
$signup_status='';
if($_SERVER['REQUEST_METHOD']=='POST'){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$mail=$_POST['email'];
	$cpassword=$_POST['cpassword'];
	if($password!=$cpassword){
		$signup_status='passwordword does not match';
	}
	else{
		$insert="INSERT INTO users VALUE('$username','$mail',md5('$password'))";
		$sql=mysqli_query($db,$insert);
		if($sql==1){
			$signup_status='<font color="green">Account successfully created. <a href="index.php" style="text-decoration:none;">click here</a> to login</font>';
		}
		else{
			$signup_status='<font color="red">Can not Sign Up. Try using different name.</font>';
		}
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
			<a href="login.php" class="login">Login</a>

			<div class="description">
				<p>Description : Here you can book the Meeting Rooms online.</p>
			</div>
			
			<form class="LoginForm" name="LoginForm" action="" method="POST">
				<h3 style="text-align:center;margin-top:-5px;margin-bottom:25px;">Signup</h3>
				<label>Name : </label><input type="text" name="username" required/>
				<label>Email : </label><input type="email" name="email" required/>
				<label>Password :</label><input type="password" name="password" style="margin:0;" required />
				<label>Confirm Password :</label><input type="password" name="cpassword" required />
				<input id="loginInput" type="submit" name="signup" value="Sign Up"/>
				<p style="text-decoration:none;"><?php echo $signup_status ?></p>
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


