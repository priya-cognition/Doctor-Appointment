<?php
$conn = mysqli_connect("localhost", "root", "comrade", "hospital");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
