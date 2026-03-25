<?php
include("connection.php");
$uid=$_POST['uname'];
$pass=$_POST['pass'];
$stmt = mysqli_prepare($con, "SELECT * FROM admin WHERE Username=?");
mysqli_stmt_bind_param($stmt, "s", $uid);
mysqli_stmt_execute($stmt);
$qry = mysqli_stmt_get_result($stmt);
$flag=0;
while($row=mysqli_fetch_array($qry))
{
	if($uid==$row['Username'] && password_verify($pass, $row['Password']))
	{
		$flag=1;
		break;
	}
}
if($flag==1)
{
	session_start();
	$_SESSION['id']=$uid;
	header("Location:Admin.php");
}
else
{
	header("Location:Login.html");
}
?>
