<?php
include("connection.php");
$uid=$_POST['email'];
$pass=$_POST['pass'];
$stmt = mysqli_prepare($con, "SELECT * FROM patient WHERE patientID=?");
mysqli_stmt_bind_param($stmt, "s", $uid);
mysqli_stmt_execute($stmt);
$qry = mysqli_stmt_get_result($stmt);
$flag=0;
while($row=mysqli_fetch_array($qry))
{
	if($uid==$row['patientID'] && password_verify($pass, $row['password']))
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
