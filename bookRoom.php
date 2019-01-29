<?php
include('connection.php');
include('session.php');

   if($_SERVER["REQUEST_METHOD"] == "POST") {
      
      $roomid = mysqli_real_escape_string($db,$_POST['roomid']);
      $username = mysqli_real_escape_string($db,$_POST['username']);
      $userphone = mysqli_real_escape_string($db,$_POST['userphone']);
      $fromdate_d = mysqli_real_escape_string($db,$_POST['fdd']);
      $fromdate_m = mysqli_real_escape_string($db,$_POST['fmm']);
      $fromdate_y = mysqli_real_escape_string($db,$_POST['fyyyy']);
      $todate_d = mysqli_real_escape_string($db,$_POST['tdd']);
      $todate_m = mysqli_real_escape_string($db,$_POST['tmm']);
      $todate_y = mysqli_real_escape_string($db,$_POST['tyyyy']);

		$insert="UPDATE rooms SET username='$username',userphone='$userphone',fromdate='$fromdate_y-$fromdate_m-$fromdate_d',todate='$todate_y-$todate_m-$todate_d' WHERE roomid='$roomid'";
		$sql=mysqli_query($db,$insert);
		if($sql==1){
		//continue;
		$insert="UPDATE rooms SET status=0 WHERE roomid='$roomid'";
			$booking_status='<font color="green">Room Booked succesfully to '.$username.'.';
		}
		else{
			$booking_status='<font color="red">Can not book room.';
		}
   }
?>

