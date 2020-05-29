<?php
 include 'connect.php';
?>
<?php
if(isset($_POST['submit'])) 
{
  $name=$_SESSION['name'];
  $email=$_SESSION['email'];
  //$id=$_SESSION['id'];
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
            //$mobile2=mysqli_real_escape_string($con,$_POST['mobile'][$i+1]);
            $email=mysqli_real_escape_string($con,$_POST['email'][$i]);
            //$email2=mysqli_real_escape_string($con,$_POST['email'][$i+1]);
            $v="UPDATE contact_list set Name='$name',Email='$email',DOB='$DOB',Mobile='$mobile' WHERE Name='$name' AND Email='$email'";
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
<html>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script>  
 $(document).ready(function(){  
 	    var i=1;
      var r=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="telephone" name="mobile[]" placeholder="Enter your Name" class="form-control" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });
      $('#add1').click(function(){  
           r++;  
           $('#dynamic_field1').append('<tr id="row'+r+'"><td><input type="text" name="email[]" placeholder="Enter your email" class="form-control" /></td><td><button type="button" name="remove" id="'+r+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>

 <style>
 	.navbar-custom
 	{
 		background-color:#9cc7da;
 	}
 	input[type=text] 
 	{
     width: 100%;
     padding: 20px 20px;
     margin: 8px 0;
     box-sizing: border-box;
    }
    input[type=email] 
 	{
     width: 100%;
     padding: 20px 20px;
     margin: 8px 0;
     box-sizing: border-box;
    }
    input[type=Mobile] 
 	{
     width: 100%;
     padding: 20px 20px;
     margin: 8px 0;
     box-sizing: border-box;
    }
    input[type=date] 
 	{
     width: 100%;
     padding: 20px 20px;
     margin: 8px 0;
     box-sizing: border-box;
    }
 	.nav
 	{
 		border-radius:0px;
 	}
 	.glyphicon-arrow-left:before
 	{
 		margin-right:5px;
 	}
 	.style1
 	{
 		color:black;
 		background-color:#9cc7da;
 		text-decoration: none;
 	}
 	.form-control
 	{
 		border-radius: 0px;
 	}
 	.space
 	{
       border: 1px solid black;
       background-color:white;
 	}
 	body
 	{
 		background-color:#f2f2f2;
 	}
 	.form1
    {
    	background-color: white;
    }
    .spin
    {
    	float:right;
    }
    .fa
    {
    	margin-right:15px;
    	margin-bottom:1px;
    }
    .colors1
    {
    	color:white;
    	background-color:black;
    	border-radius:50%;
    }
    #butttons
    {
    	border-radius: 50%;
    }
 </style>
</head>
<body class="booking">
<nav class="navbar navbar-custom">
  <ul class="nav navbar-nav">
    <li><a href="#" class="style1">RM-PHONEBOOK</a></li>
  </ul>
</nav>
<div class="container">
<div class="row">
<div class="col-md-6 col-md-offset-3 space">
<form action="update.php" method="POST">
<br>
<i class="fa fa-arrow-left " style="font-size:30px"></i>Add new contact
<br>
<br>
<label for="Name">Name</label>
<div class="form-group">
<input class="form-control" type="text" name="name" placeholder="Name" value="">
</div>
<br>
<label for="date">DOB</label>
<div class="form-group">
<input class="form-control" type="date" name="DOB" placeholder="dd/mm/yyyy"  class="glyphicon glyphicon-triangle-bottom" value="">
</div>
<br>
<label for="date">Mobile</label>
<table id="dynamic_field">
<tr>
<div class="form-group">
<td width="480px"><input class="form-control" type="telephone" name="mobile[]" placeholder="Enter your Name" value=""></td>
<td><button type="button" name="add" id="add" class="glyphicon glyphicon black" id="buttons">+</button></td>
</div> 
</tr> 
</table> 
<br>
<label for="date">Email</label>
<table id="dynamic_field1">
<tr>
<div class="form-group">
<td width="480px"><input class="form-control" type="text" name="email[]" placeholder="Enter your eamil" value=""></td>
<td><button type="button" name="add1" id="add1" class="glyphicon glyphicon black" id="buttons">+</button></td>
</div> 
</tr> 
</table> 
<br>
<div class="container1">
<div class="text"><button class="btn btn-success spin" type="Submit" class="button1" name="submit">Submit</button></div>
</div>
<br>
<br>
</form>
</div>
</div>
</div> 
</body>
</html>
<td><div class="form-group"></div></td>  