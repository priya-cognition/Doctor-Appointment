<?php
include("connection.php");
$uid=$_POST['email'];
$pass=$_POST['pass'];
$qry=mysqli_query($conn, "select * from patient");
$flag=0;
while($row=mysqli_fetch_array($qry))
{
	if($uid==$row['patientID'] && $pass==$row['password'])
	{
		$flag=1;
		break;
	}
}
if($flag==1)
{
	session_start();
	$_SESSION['id']=$uid;
	header("Location:patient_profile.php");
}
else
{
	header("Location:login_inc.php");
}
?>