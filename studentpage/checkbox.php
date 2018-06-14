<html>
<head>
<?php
//for credentials validity 

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
		$username=$_POST['username'];
		$password=$_POST['password'];
	//new query
		$sql1= "SELECT username FROM students WHERE username = '$username' AND password = '$password'";
		$result = mysqli_query($con,$sql1); 
		if(mysqli_num_rows($result))
		{
		}

	else
	{
		echo '<script>';
		echo "alert('Username or Password didn't matched!)";
		echo '</script>';
		header("Location: " . "http://" . $_SERVER['HTTP_HOST'] . "/idea1/studentpage/loginpage.php");	
	}
}
?>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<style>
.submit-btn{
	-webkit-transition-duration: 0.4s; /* Safari */
	transition-duration: 0.4s;
	background-color:white;
	border: 2px solid #4CAF50;

}

.submit-btn:hover {
	background-color: #4CAF50; /* Green */
	color: white;
}
</style>
</head>
<body>
<nav class="navbar navbar-default">
	<div class="container-fluid">
		<div class="navbar-header">
		<a class="navbar-brand" href="#">WebSiteName</a>
	</div>
	<ul class="nav navbar-nav">
	  <li class="active"><a href="">Profile</a></li>
	  
	  <li><a href="home-student.php">Home</a></li>
	</ul>
  </div>
</nav>
<div class="container">
	<div class="row">
		<div class="col-sm-10">
			<h1>Please Select the subjects for your program</h1>
			<form method="POST" name="form1" onsubmit="return checkbox()" action="home-student.php" >
				<input type="checkbox" name="Subjects[]" class="Physics" value="Physics">Physics<br>
				<input type="checkbox" name="Subjects[]" class="Chemistry" value="Chemistry">Chemistry<br>
				<input type="checkbox" name="Subjects[]" class="Maths" value="Maths">Maths<br>
				<input type="checkbox" name="Subjects[]" class="Biology" value="Biology">Biology<br>
	
				<br><br>
				<div class="submit">
					<input class="submit-btn" type="submit" name="submit" value="submit"></div>
				</div>
			</form>
				
		</div>
	</div>
</div>
<script>
function checkbox(){
if($('input[type="checkbox"]:checked').length == 0) {
	alert('Please select at least one option.');  
	return false; 
}
}
</script>




</body>