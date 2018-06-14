<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<style>
p{
	color:black;
	
}

 div.gallery {
	margin: 5px;
	
	border: 1px solid #ccc;
	float: left;
	width: 180px;
}

div.gallery:hover {
	border: 1px solid;
}

div.gallery img {
	width: 100%;
}

div.desc {
	padding: 15px;
	text-align: center;
}
.new{
	line-height:2em;
}
.heading{
	margin-top: 30px;
}
.linkname{
	width: 600px;
}
body {
	font-family: "Lato", sans-serif;
}

.sidenav {
	height: 100%;
	width: 0;
	position: fixed;
	z-index: 1;
	top: 0;
	left: 0;
	background-color: #111;
	overflow-x: hidden;
	transition: 0.5s;
	padding-top: 80px;
	overflow-y: auto;
	
	
	
}
.sideways{
	margin-top:100px;
}

.subject {
	padding: 8px 8px 8px 32px;
	text-decoration: none;
	font-size: 25px;
	color: #818181;
	display: block;
	transition: 0.3s;
	background-color:#111;
	border:none;
}

.subject:hover {
	color: #f1f1f1;
	border:none;
}

.sidenav .closebtn {
	position: absolute;
	top: 0;
	right: 25px;
	font-size: 36px;
	margin-left: 50px;
}

#main {
	transition: margin-left .5s;
	padding: 18px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


.navigation{
	text-align: center;	
}

.searchnav{
	text-align: left;
}
#sidnavcntnt{
	font-size:26px;
	color:white;
}
.side{
	text-align:left;
}

::-webkit-scrollbar {
	width: 10px;
}

/* Track */
::-webkit-scrollbar-track {
	background: #f1f1f1; 
}
 
/* Handle */
::-webkit-scrollbar-thumb {
	background: #888; 
}

/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
	background: #555; 
}

#myDropdown1{
	display:none;
	padding: 8px 8px 8px 32px;
	text-decoration: none;
	font-size: 18px;
	color: #818181;
	display: block;
	transition: 0.3s;
	background-color:#111;
	border:none;
}
#myDropdown2{
	display:none;
	padding: 8px 8px 8px 32px;
	text-decoration: none;
	font-size: 18px;
	color: #818181;
	display: block;
	transition: 0.3s;
	background-color:#111;
	border:none;
}

#subject:hover {
	color: #f1f1f1;
	border:none;
}
</style>


</head>

<body>



<nav class="navbar navbar-inverse">
  <div class="container-fluid">
	<div class="navbar-header">
	  <a class="navbar-brand" href="#">WebSiteName</a>
	</div>
	<ul class="nav navbar-nav">
	  <li class="active"><a href="#">Home</a></li>
	  <li><a href="#">Page 1</a></li>
	  <li><a href="#">Page 2</a></li>
	  <li><a href="#">Page 3</a></li>
	</ul>
  </div>
</nav>

<div class="container-fluid text-center"> 

<!-- side div for subject from here -->
	
	<div class="row">
		<div id="newdiv" class="sideways">
			<div id="mySidenav" class="sidenav">
  				<a href="javascript:void(0)" class="closebtn" onmouseover="closeNav()">&times;</a>
				<p id="sidnavcntnt">Subjects</p>
				<?php
					//inserting data into database 'subjectdata'
					$con=mysqli_connect("localhost", "root", "") ;
					mysqli_select_db($con,"subjectdata") or die(mysql_error());
					if(isset($_POST['submit']))
					{
							$Subjects[]=$_POST['Subjects'];
							foreach($Subjects as $c)
							$size=count($c);
							for($i=0;$i<$size;$i++)
							{
								$con=mysqli_connect("localhost", "root", "") ;
								mysqli_select_db($con,"subjectdata") or die(mysql_error());
								$sql="INSERT INTO subjects VALUES('$c[$i]')";
								mysqli_query($con,$sql);
							}
					}
				?>
				<?php
				//retreiving data from sql 
				$con=mysqli_connect("localhost", "root", "") ;
				mysqli_select_db($con,"subjectdata") or die(mysql_error());
				$result = mysqli_query($con,"SELECT * FROM subjects"); //Selecting data from database.
				$a = array(); //creating an empty array.
				while($row= mysqli_fetch_array($result))
				{	
					$new = $row['sub']; //putting data in array	
					array_push($a,$new);
				}
				?>
				
				<?php
					//looping over button element
					for($i=0;$i<=4;$i++)
				{	
					$ram = $a[$i];
					$sub = "<button class='subject' id=".$i.">".$ram."</button>";
					echo $sub; 
				}
				?>
				<hr>	
				<p id="sidnavcntnt">Library</p>
				<button class="subject" href="#">History</button>
				<button class="subject" href="#">Watch Later</button>
				<button class="subject" href="#">Liked Vidos</button>
				<hr>
				<p id="sidnavcntnt">Subscribed</p>
				<button class="subject">Institutes</button>
			</div>
		</div>
				<div class="side">
					<div id="main">
  						<span style="font-size:20px;cursor:pointer" onclick="openNav()">&#9776; Options</span> <!--function call on button pressed -->
					</div>
				</div>
	</div>
</div>

<!-- div for main body page Leave this section -->

<div class="container" id="hero">
	<div class="heading">
		<h1>English<h6>Subscribed Videos</h6></h1>
	</div>
	<div class="row">
		<div class="gallery">
			<a id="thumbnail" class="thumbnail" aria-hidden="true" tab-index="-1" rel="null" href="player.php">
			<img class="thmbnl" height="151" width="201" src="thumbnail.jpg"><br><br>
			<div class="desc"><a href="player.php"><p>Video 1<br></a> Video is about education</p></div>
			</a>
		</div>
		<div class="gallery">
			<a id="thumbnail" class="thumbnail" aria-hidden="true" tab-index="-1" rel="null" href="player.php">
				<img class="thmbnl" height="151" width="201" src="thumbnail2.jpg"><br><br>
				
				<div class="desc"><a href="player.php"><p>Video 2<br></a> Video is about education</p></div>
			</a>
		</div>
		
		<div class="gallery">
			<a id="thumbnail" class="thumbnail" aria-hidden="true" tab-index="-1" rel="null" href="player.php">
				<img class="thmbnl" height="151" width="201" src="thumbnail2.jpg"><br><br>
				
				<div class="desc"><a href="player.php"><p>Video 2<br></a> Video is about education</p></div>
			</a>
		</div>
		<div class="gallery">
			<a id="thumbnail" class="thumbnail" aria-hidden="true" tab-index="-1" rel="null" href="player.php">
				<img class="thmbnl" height="151" width="201" src="thumbnail3.jpg"><br><br>
				
				<div class="desc"><a href="player.php"><p>Video 3<br></a>Video is about education</p></div>
			</a>
		</div>
	</div>

	<div class="heading">
		<h1>Hindi</h1>
	</div>
	<div class="row">
		<div class="gallery">
			<a id="thumbnail" class="thumbnail" aria-hidden="true" tab-index="-1" rel="null" href="player.php">
			<img class="thmbnl" height="151" width="201" src="thumbnail.jpg"><br><br>
			<div class="desc"><a href="player.php"><p>Video 1<br></a> Video is about education</p></div>
			</a>
		</div>
		<div class="gallery">
			<a id="thumbnail" class="thumbnail" aria-hidden="true" tab-index="-1" rel="null" href="player.php">
				<img class="thmbnl" height="151" width="201" src="thumbnail2.jpg"><br><br>
				
				<div class="desc"><a href="player.php"><p>Video 2<br></a> Video is about education</p></div>
			</a>
		</div>
	</div>
	
	<div class="heading">
		<h1>Maths</h1>
	</div>
	
	<div class="row">
		<div class="gallery">
			<a id="thumbnail" class="thumbnail" aria-hidden="true" tab-index="-1" rel="null" href="player.php">
			<img class="thmbnl" height="151" width="201" src="thumbnail.jpg"><br><br>
			<div class="desc"><a href="player.php"><p>Video 1<br></a> Video is about education</p></div>
			</a>
		</div>
		<div class="gallery">
			<a id="thumbnail" class="thumbnail" aria-hidden="true" tab-index="-1" rel="null" href="player.php">
				<img class="thmbnl" height="151" width="201" src="thumbnail2.jpg"><br><br>
				
				<div class="desc"><a href="player.php"><p>Video 2<br></a> Video is about education</p></div>
			</a>
		</div>
	</div>
	
</div>

</div>
<div id="mathslist">
 <ul>
		  <li>Item 1</li>
		  <li>Item 2</li>
		  <li>Item 3</li>
		  <li>Item 4</li>
		  <li>Item 5</li>
		  <li>Item 6</li>
		  <li>Item 7</li>
	 </ul>
</div>
<script>

function openNav() {
	document.getElementById("mySidenav").style.width = "250px";
	document.getElementById("main").style.marginLeft = "250px";
	
	
	<!-- looping for getting element from subject -->
	var i;
	for(i=0;i<=2;i++)
	{
		new1 = document.getElementById([i]).textContent; <!-- text content of element -->
		if(new1=='Biology')
		{
			var x = document.getElementById([i]).id; <!-- if elements text is Biology save its id into variabe x for hover -->
			
		}	
		else if(new1=='Maths')
		{
			var m = document.getElementById([i]).id;
		}
	}

}

function closeNav() {
	document.getElementById("mySidenav").style.width = "0";
	document.getElementById("main").style.marginLeft= "0";
}
function refreshData()
{
	var display = document.getElementById("hero");
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.open("GET", "shitpage.php",true);
	xmlhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
	xmlhttp.send();
	xmlhttp.onreadystatechange = function() 
	{
		if (this.readyState == 4 && this.status == 200)
		{
			display.innerHTML = this.responseText;
		} 
		else 
		{
		  display.innerHTML = "Loading...";
		};
	}
}
	




</script>
</body>





