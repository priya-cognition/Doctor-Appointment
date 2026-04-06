<?php
include("connection.php");
$uid=$_POST['uname'];
$pass=$_POST['pass'];
$qry=mysqli_query($conn, "select * from admin");
$flag=0;
while($row=mysqli_fetch_array($qry))
{
	if($uid==$row['Username'] && $pass==$row['Password'])
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