<?php
include 'connect.php';
$name=$email=$mobile=$DOB=$email2=$mobile2=" ";
if(isset($_POST['submit']))	
{
	$count=0;
	$m=count($_POST['mobile']);
	$e=count($_POST['email']);
	if($m>$e)
	{
       $s=$m;
	}
	else
	{
		$s=$e;
	}
	if($e>0)
	{
		for($i=0; $i<1;$i++)
		{
           if(trim($_POST["mobile"][$i])!='')
           {
           	$name=mysqli_real_escape_string($con,$_POST['name']);
           	$DOB=mysqli_real_escape_string($con,$_POST['DOB']);
           	$mobile=mysqli_real_escape_string($con,$_POST['mobile'][$i]);
           	$mobile2=mysqli_real_escape_string($con,$_POST['mobile'][$i+1]);
           	$email=mysqli_real_escape_string($con,$_POST['email'][$i]);
           	$email2=mysqli_real_escape_string($con,$_POST['email'][$i+1]);
           	$v="insert into contact_list(Name,DOB,Mobile,email,Reference_NO,Alternate_Email) VALUES('$name','$DOB','$mobile','$email','$mobile2','$email2')";
           	mysqli_query($con,$v);
           	header("location:contact_list.php");
           }
		}
		echo "data Inserted";
	}
	else
	{
		echo "Some Error Occur";
	}
}
?>