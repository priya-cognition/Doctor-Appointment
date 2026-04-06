<?php
include("connection.php");
$uid=$_POST['email'];
$pass=$_POST['pass'];
$qry=mysqli_query($conn, "select * from doctor");
$flag=0;
while($row=mysqli_fetch_array($qry))
{
	if($uid==$row['doctorID'] && $pass==$row['password'])
	{
		$flag=1;
		break;
	}
}
if($flag==1)
{
	session_start();
	$_SESSION['id']=$uid;
	header("Location:doctor_profile.php");
}
else
{
	header("Location:dlogin_inc.php");
}
?>