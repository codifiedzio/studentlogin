<html>
<?php
	session_start();
?>

<script>
function validateForm() {
	var x = document.forms["formname"]["username"].value;
	if (x == "") {
		alert("Name must be filled out");
		return false;
	}
	var y = document.forms["formname"]["password"].value
	if (y== ""){
		alert("Password must be given");
		return false;
	}
}

</script>
<?php 
$con = mysqli_connect('localhost','root','');
if(!$con)
{
		echo 'Not connected to server';
}
if(!mysqli_select_db($con, 'idea1'))
{
		echo 'database not connected';
}


if(isset($_POST['submit']))
{
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$username=$_POST['username'];
	$cnfrmpassword=$_POST['cnfrmpassword'];
	$gender=$_POST['gender'];

	$sql="INSERT INTO students VALUES ('$firstname','$lastname','$email','$username','$cnfrmpassword','$gender')";
	

	if (mysqli_query($con, $sql))
	{
		echo "New record created successfully";
	}
	else 
	{
   		echo "Error: " . $sql . "<br>" . mysqli_error($con);
	}
	
}
?>
<head>
<style>
img{
border-radius: 50%;
	display: block;
	margin-left: auto;
	margin-right: auto;
	max-width: 150px; 
	max-height: 150px;
}
h4{
	color: #020202;
	text-align:center;
}
.button{
	background-color: #f44336;
	border-radius: 12px;
	color: #020202; 
	font-family: 'Source Sans Pro', sans-serif
	border: 2px solid ;
	border-color: #f44336;
	padding: 16px 32px;
	text-align: center;
	text-decoration: none;
	display: inline-block;
	font-size: 16px;
	margin: 4px 2px;
	-webkit-transition-duration: 0.4s; /* Safari */
	transition-duration: 0.4s;
	cursor: pointer;
}	
.button:hover {
		background-color: #4CAF50;
		color: white;
		border-color: #4CAF50;
}
h3{
		color: #020202; font-family: 'Source Sans Pro', sans-serif; font-size: 45px; font-weight: 350;text-align:center;
}
input[type=text], select {
	width: 50%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
	font-family: 'Source Sans Pro', sans-serif;

}
input[type=submit]:hover {
	background-color: #45a049;
}

input[type=password], select {
	width: 50%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}
input[type=submit]:hover {
	background-color: #45a049;
}
.heading{
	line-height:5em;
}
.name{
	text-align:center;
}
.password{
	text-align:center;
}
</style>
<body>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
<div class="container">
  <div class="row">
	<div class="col-sm">
	 <div class="heading">
	 	<br><br><br><br>
		<h4>We offer some of the best courses from around the world!</h4>
	 </div>
	</div>
	<div class="col-sm">
		<div style="padding:15px;text-align:center;">
  			<center><img src="img_avatar.png"<img></center>
		</div>

	  <form name='formname' id='register' action='checkbox.php' method='POST' onsubmit="return validateForm()" accept-charset='UTF-8' enctype="multipart/form-data">
		<h3>Login Now</h3>
		<br>
		<div class="name">
		<label for='name'><h4><center>Username: </center></h4></label>
		</div>
		<center><input type='text' name='username' id='name' maxlength="50" placeholder="Your username.."/></center><br>
		<div class="password">
		<label for='password' ><h4><center>Password:</center></h4></label> 
		<div class="password">
		<center><input type='password' name='password' id='password' maxlength="50"  placeholder="Your password.."/> </center><br>

		<center><input name="submit" class = "button" type="submit"></center>




		<center><p><a href="forgotpass.php"><h6>Forgot Password</h6></a></p></center>
		<center><p><a href="forgotusr.php"><h6>Forgot Username</h6></a></p></center>
 
		</form>
	
	</div>
  </div>
</div>
</body>
</html>