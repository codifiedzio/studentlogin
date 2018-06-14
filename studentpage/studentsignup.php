<html>
<head>

<style>

input[type=text], select {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}
input[type=password], select {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}
input[type=textarea], select {
	width: 100%;
	padding: 12px 20px;
	margin: 8px 0;
	display: inline-block;
	border: 1px solid #ccc;
	border-radius: 4px;
	box-sizing: border-box;
}
.submitbn{
	text-align:center;
}
input[type=submit] {
	width: 50%;
	background-color: #4CAF50;
	color: white;
	padding: 14px 20px;
	margin: 8px 0;
	border: none;
	border-radius: 4px;
	cursor: pointer;
	text-align:center;
}

input[type=submit]:hover {
	background-color: #45a049;
}

div {
	border-radius: 5px;
	background-color: #f2f2f2;
	padding: 20px;
}
.topnav {
	overflow: hidden;
	background-color: #333;
}
.gender{
	width:30%;
}
.topnav a {
	float: left;
	display: block;
	color: #f2f2f2;
	text-align: center;
	padding: 14px 16px;
	text-decoration: none;
}
.topnav a:hover {
	background-color: #ddd;
	color: black;
}
p{
	font-size:17px;
}
</style>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
</head>
<script>
//for validation of form
function checkForm(form)
{
var email = document.forms["form"]["email"].value;
var n = (document.forms["form"]["username"].value).length;
var p = (document.forms["form"]["password"].value).length;
			
var filter = /^([a-zA-Z0-9_.-])+@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})+$/;
	if (!filter.test(email)){
		alert('Please enter a valid e-mail address.');
		form.email.focus();
		return false;
		}
	if(form.password.value != form.cnfrmpassword.value){
		alert("Passwords should match");
		form.password.focus();
		return false;
	}

	if(form.firstname.value == ""){
		alert("Please Fill the Firstname Column");
		form.firstname.focus();
		return false;
	}
	if(form.lastname.value == ""){
		alert("Please Fill the lastname Column");
		form.lastname.focus();
		return false;
	}
	if(form.email.value == "" ){
		alert("Invalid EmailId");
		form.email.focus();
		return false;	
	}
	
	if(form.username.value == ""){
		alert("Please Fill the username Column ");
		form.username.focus();
		return false;
	}
	if(form.password.value == "" ){
		alert("Please Fill the password Column");
		form.password.focus();
		return false;
	}

	if(form.cnfrmpassword.value == ""){
		alert("Please Fill the Confirmpassword Column");
		form.cnfrmpassword.focus();
		return false;
	}
	if(n<6){
		alert("username should be more than 6 characters");
		form.username.focus();
		return false;
	}
	if(p<6){
		alert("password should be more than 6 characters");
		form.password.focus();
		return false;
	}
	if(n>12){
		alert("Username too long.");
		form.username.focus();
		return false;
	}
	if(n>20){
		alert("password too long.");
		form.password.focus();
		return false;
	}
	
	
}
</script>
<body>
	<div class="row">
		<div class="col-sm">
			<div class="topnav">
				<a href="#">Home</a>
				<a href="#">Setions</a>
				<a href="#">Links</a>
			</div>
		</div>
	</div>
<div class="container">
	<h3>Please fill the complete form.</h3>
	<form name="form" action="loginpage.php" onsubmit="return checkForm(this);" method='POST'>
	<div>
		<label>First Name*</label>
		<input type="text" name="firstname" placeholder="Your name..">
	</div>	
	<div>
		<label for="lname">Last Name*</label>
		<input type="text" id="lname" name="lastname" placeholder="Your last name..">
			
	</div>
		<div>	
			<label for="email">Email Id*</label>
			<input type="text" id="email" name="email" placeholder="Your email Id..">

		</div>
		<div>		
			<label for="uname">Username*</label>
			<input type="text" id="username" name="username" placeholder="(Your Username must be unique and between 6-12 characters.)">
		</div>
		<div>
			<label for="password">Password*</label>
			<input type="password" id="password" name="password" placeholder="(Your Password must be 6-20 characters long.)">
		</div>
		<div>	
			<label for="cnfrmpassword">Confirm Password*</label>
			<input type="password" id="cnfrmpassword" name="cnfrmpassword" placeholder=" ">
			<div id="password_error" class="val_error"></div>
		</div>
		<div class="gender">
			<label for="gender">Gender</label>
			<select id="gender" name="gender">
	  		<option value="Male">Male</option>
	 		<option value="Female">Female</option>
	 		<option value="others">Others</option>
			</select>
		</div>
  				
			<div class="submitbn">
				<p> *All fields are mandatory</p>
				<input type="submit" name="submit"  value="submit">
			</div>
			
  		</form>
	
</div>

</body>
</html>