<?php
include 'connect.php';
$email=$_SESSION['email'];
$name=$_SESSION['name'];
$k="DELETE FROM contact_list WHERE Name='$name' AND Email='$email'";
$store= mysqli_query($con,$k);
header("Location:contact_list.php");
?>