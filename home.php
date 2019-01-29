<?php
include('connection.php');
include('session.php');
$room_status = '<font color="green">Available</font>';

   if(($_SERVER["REQUEST_METHOD"] == "POST")&&($_POST['Bookroom'])=='Book') {
      
      $roomid = mysqli_real_escape_string($db,$_POST['roomid']);
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $userphone = mysqli_real_escape_string($db,$_POST['userphone']);
      $fromdate_d = mysqli_real_escape_string($db,$_POST['fdd']);
      $fromdate_m = mysqli_real_escape_string($db,$_POST['fmm']);
      $fromdate_y = mysqli_real_escape_string($db,$_POST['fyyyy']);
      $todate_d = mysqli_real_escape_string($db,$_POST['tdd']);
      $todate_m = mysqli_real_escape_string($db,$_POST['tmm']);
      $todate_y = mysqli_real_escape_string($db,$_POST['tyyyy']);

		$insert1="UPDATE rooms SET status=0 WHERE roomid='$roomid'";
		$sql1=mysqli_query($db,$insert1);
		$insert="insert into rooms(roomid,status,username,userphone,fromdate,todate) values('$roomid',1,'$username','$userphone','$fromdate_y-$fromdate_m-$fromdate_d','$todate_y-$todate_m-$todate_d')";
		$sql=mysqli_query($db,$insert);
		if($sql==1){
			$booking_status='<font color="green">Room succesfully booked to '.$username.'.';
		}
		else{
			$booking_status='<font color="red">Can not book room.';
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
			<div class="head">
				<h1>MEETING ROOM BOOKING SYSTEM</h1>
				<a href="logout.php" class="logout">Logout</a>
			</div>
			<div class="content-main">
				<h3>Welcome <font color="red"><?php echo strtoupper($user) ?></font></h3>
				<h1 style="text-align:center;color:#a13ef1;">Meeting Rooms</h1>
				<div class="available-rooms">
						<div class="room"><p>AB-I Auditorium</p>
							<img src="rooms/rgukt.png" class="room-img" alt="No image" />
							<p>ID : <font color="blue">R001</p></font>
							<p>Location : RGUKT Basar</p>
							<p>Status: <?php echo $room_status ?></p>
							<font size="2">
								<a class="book-room" id="myBtn" onclick="bookModel();">Book Room</a>
								<a class="more-room" onclick="moreModel();">More...</a>
							</font>
						</div>
						<div class="room"><p>SAC Auditorium</p>
							<img src="rooms/rgukt.png" class="room-img" alt="No image" />
							<p>ID : <font color="blue">R002</p></font>
							<p>Location : RGUKT Basar</p>
							<p>Status: <?php echo $room_status ?></p>
							<font size="2">
								<a class="book-room" id="myBtn" onclick="bookModel();">Book Room</a>
								<a class="more-room" onclick="moreModel1();">More...</a>
							</font>
						</div>
						<div class="room"><p>Yoga Hall</p>
							<img src="rooms/rgukt.png" class="room-img" alt="No image" />
							<p>ID : <font color="blue">R003</p></font>
							<p>Location : RGUKT Basar</p>
							<p>Status: <?php echo $room_status ?></p>
							<font size="2">
								<a class="book-room" id="myBtn" onclick="bookModel();">Book Room</a>
								<a class="more-room" onclick="moreModel2();">More...</a>
							</font>
						</div>
						<div class="room"><p>Placement Cell</p>
							<img src="rooms/rgukt.png" class="room-img" alt="No image" />
							<p>ID : <font color="blue">R004</p></font>
							<p>Location : RGUKT Basar</p>
							<p>Status: <?php echo $room_status ?></p>
							<font size="2">
								<a class="book-room" id="myBtn" onclick="bookModel();">Book Room</a>
								<a class="more-room" onclick="moreModel3();">More...</a>
							</font>
						</div>
				</div>
			</div>
		</div>

<!-- myModels -->
<!-- bookModel0 -->
<div id="bookModel" class="modal">

  <div class="modal-content">
    <span class="close" onclick="closeModal();">&times;</span>
    <h2>Booking Room</h2>
    <form class="booking-form" name="booking-form" action="" method="post">
    	<p style="font-size:18px;">Please provide details</p>
    	<label>Room Id</label>:&nbsp;&nbsp;&nbsp; <input type="text" name="roomid" required/>
    	<label>Username</label>:&nbsp;&nbsp;&nbsp; <input type="text" name="username" required/>
    	<label>Phone</label>:&nbsp;&nbsp;&nbsp; <input type="text" name="userphone" required/>
    	<label>From Date</label>
    	:&nbsp;&nbsp;&nbsp;<select class="dd" name="fdd"><option class="dd">dd</option<br /><?php for($i=1;$i<32;$i++){	echo '<option class="d'.$i.'">'.$i.'</option>';	} ?></select>
		<select class="mm" name="fmm"><option class="mm">mm</option<br /><?php for($i=1;$i<13;$i++){	echo '<option class="m'.$i.'">'.$i.'</option>';	} ?></select>
		<select class="yyyy" name="fyyyy"><option class="yyyy">yyyy</option<br /><?php for($i=2017;$i<2038;$i++){	echo '<option class="y'.$i.'">'.$i.'</option>';	} ?></select><br />
		
    	<label>To Date</label>
    	:&nbsp;&nbsp;&nbsp;<select class="dd" name="tdd"><option class="dd">dd</option<br /><?php for($i=1;$i<32;$i++){	echo '<option class="d'.$i.'">'.$i.'</option>';	} ?></select>
		<select class="mm" name="tmm"><option class="mm">mm</option<br /><?php for($i=1;$i<13;$i++){	echo '<option class="m'.$i.'">'.$i.'</option>';	} ?></select>
		<select class="yyyy" name="tyyyy"><option class="yyyy">yyyy</option<br /><?php for($i=2017;$i<2038;$i++){	echo '<option class="y'.$i.'">'.$i.'</option>';	} ?></select>    	
    	<input type="submit" name="Bookroom" value="Book" />
    </form>
  </div>
</div>

<!-- moreModel0 -->
<div id="moreModel" class="modal">

  <div class="modal-content">
    <span class="close" onclick="mcloseModal();">&times;</span>
    <h2>AB-I Auditorium</h2>
  </div>
</div>

<!-- moreModel1 -->
<div id="moreModel1" class="modal">

  <div class="modal-content">
    <span class="close" onclick="mcloseModal1();">&times;</span>
    <h2>SAC Auditorium</h2>
  </div>
</div>

<!-- moreModel2 -->
<div id="moreModel2" class="modal">

  <div class="modal-content">
    <span class="close" onclick="mcloseModal2();">&times;</span>
    <h2>Yoga hall</h2>
  </div>
</div>

<!-- moreModel3 -->
<div id="moreModel3" class="modal">

  <div class="modal-content">
    <span class="close" onclick="mcloseModal3();">&times;</span>
    <h2>Placement Cell</h2>
  </div>
</div>

<!-- Model Content End-->

<script>
//bookModal0
function bookModel(){
	document.getElementById('bookModel').style.display = "block";
}
function closeModal(){
	document.getElementById('bookModel').style.display = "none";	
}
window.onclick = function(event) {
    if (event.target == document.getElementById('bookModel')) {
        document.getElementById('bookModel').style.display = "none";
    }
}

//moreModal0
function moreModel(){
	document.getElementById('moreModel').style.display = "block";
}
function mcloseModal(){
	document.getElementById('moreModel').style.display = "none";	
}
window.onclick = function(event) {
    if (event.target == document.getElementById('bookModel')) {
        document.getElementById('bookModel').style.display = "none";
    }
    if (event.target == document.getElementById('moreModel')) {
        document.getElementById('moreModel').style.display = "none";
    }
}


//moreModal1
function moreModel1(){
	document.getElementById('moreModel1').style.display = "block";
}
function mcloseModal1(){
	document.getElementById('moreModel1').style.display = "none";	
}
window.onclick = function(event) {
    if (event.target == document.getElementById('bookModel1')) {
        document.getElementById('bookModel1').style.display = "none";
    }
    if (event.target == document.getElementById('moreModel1')) {
        document.getElementById('moreModel1').style.display = "none";
    }
}

//moreModal2
function moreModel2(){
	document.getElementById('moreModel2').style.display = "block";
}
function mcloseModal2(){
	document.getElementById('moreModel2').style.display = "none";	
}
window.onclick = function(event) {
    if (event.target == document.getElementById('bookModel2')) {
        document.getElementById('bookModel2').style.display = "none";
    }
    if (event.target == document.getElementById('moreModel2')) {
        document.getElementById('moreModel2').style.display = "none";
    }
}

//moreModal4
function moreModel3(){
	document.getElementById('moreModel3').style.display = "block";
}
function mcloseModal3(){
	document.getElementById('moreModel3').style.display = "none";	
}
window.onclick = function(event) {
    if (event.target == document.getElementById('bookModel')) {
        document.getElementById('bookModel').style.display = "none";
    }
    if (event.target == document.getElementById('moreModel')) {
        document.getElementById('moreModel').style.display = "none";
    }
    if (event.target == document.getElementById('moreModel1')) {
        document.getElementById('moreModel1').style.display = "none";
    }
    if (event.target == document.getElementById('moreModel2')) {
        document.getElementById('moreModel2').style.display = "none";
    }
    if (event.target == document.getElementById('moreModel3')) {
        document.getElementById('moreModel3').style.display = "none";
    }
}
</script>



		<footer>
		</footer>
	</body>
</html>

