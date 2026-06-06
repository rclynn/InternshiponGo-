<?php if(!isset($_SESSION['intershipgo_adviser'])){
  	  echo"<script type='text/javascript'>window.location.replace('login.php')</script>";
}else
{
	  $instructorID = $_SESSION['intershipgo_adviser'];
      $adviser=mysqli_query($con,"SELECT instructor.* from instructor where instructorID = '$instructorID'")or die(mysqli_error($con));
      $rowadviser=mysqli_fetch_object($adviser);
}?>