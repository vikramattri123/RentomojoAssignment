<?php
include 'connect.php';
$r=0;
if(isset($_POST['search']))
{ 
   $search= $_POST['search'];
   $view="SELECT * FROM contact_list WHERE Name LIKE '$search%' || Email='$search' || Mobile='$search' ORDER BY name ";
}
else
{
  $view="select * from contact_list ORDER BY Name ASC";
  $search="";
}
$result= mysqli_query($con,$view);
?>
<!DOCTYPE html>
<html>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style> 
input[type=text] {
  width: 70%;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  font-size: 16px;
  background-image: url('searchicon.png ');
  background-image: right;
  background-color: white;
  background-position: 10px 10px; 
  background-repeat: no-repeat;
  padding: 12px 20px 12px 40px;
  -webkit-transition: width 0.4s ease-in-out;
  transition: width 0.4s ease-in-out;
}
.collapsible {
  background-color: white;
  color: black;
  cursor: pointer;
  padding: 18px;
  width: 70%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  border:1px solid black;
}

.active, .collapsible:hover {
  background-color: white;
}

.collapsible:after {
  content: '\25BC';
  color: black;
  font-weight: bold;
  float: right;
  margin-left: 5px;
  border:none;
}

.active:after {
  content: "\25B2";
}

.content {
  padding: 0 18px;
  max-height: 0;
  width:70%;
  overflow: hidden;
  transition: max-height 0.5s ease-out;
  background-color:#9cc7da;
  border:1px solid black;
}
.navbar-custom
{
 background-color:#9cc7da;
}
.style1
 {
  margin-left:20px;
}
.escape
{
  float:right;
}
table
{
  border-collapse: separate;
  border-spacing: 0 15px;
}
.joint
{
  background-color: white;
  border:1px solid black;
  margin-bottom: 5px;
}
.fa-fw
{
}

</style>
</head>
<body>
  <nav class="navbar navbar-custom">
  <ul class="nav navbar-nav">
    <li><a href="#" class="style1">RM-PHONEBOOK</a></li>
  </ul>
</nav>
  <br>
  <br>
  <div class="col-md-7 col-md-offset-3">
  <form action="delete_data.php" method="POST">
  <input type="text" name="search" class="sub" placeholder="Search" value="<?php echo $search; ?>">
  <button class="btn" class="submit">Search</button>
  <br>
  <br>
</form>
<?php while($row = mysqli_fetch_object($result)) { ?>
<!-- <form action="delete.php" method="POST"> -->
<button class="collapsible"><?php echo $row->Name?></button>
<div class="content">
<table>
  <br>
<tr>
 <td style="width:400px"><?php echo $row->DOB ?></td>
  <td><a href='update.php' class='btn btn-primary' class='add_item_link'>Edit</a></td>
  <td><a href='delete_data.php' class='btn btn-danger' class='remove_item_link'>Remove</a></td>
</tr>
<br>
</table>
<div class="joint">
  <table>
  <?php
  include 'connect.php';
  $id=  mysqli_insert_id($con);
  $_SESSION['pid']=$id;
  $_SESSION['name']=$row->Name;
  $_SESSION['email']=$row->Email;
  ?>
    <tr>
     <td style="width:200px" class="fa fa-phone-square"><b><?php echo $row->Mobile ?></b></td> 
     <td style="width:20px" class="fa fa-envelope"><b><?php echo $row->Email ?></b></td>
    </tr>
    <tr>
     <td style="width:200px" class="fa fa-phone-square"><b><?php echo $row->Reference_No ?></b></td> 
     <td style="width:20px" class="fa fa-envelope"><b><?php echo $row->Alternate_Email ?></b></td>
    </tr>
  </table>
</div>
</div>
<?php } ?>
<!-- </form> -->
<script>
var coll = document.getElementsByClassName("collapsible");
var i;
for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
    } 
  });
}
</script>
 </div>
</body>
</html>