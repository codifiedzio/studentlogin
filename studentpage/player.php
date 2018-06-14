<html>
<head>
<style type="text/css">
div#video-player-box{ width:550px;background:#000; margin:0px auto; }
div#video-controls-bar{background:#333;padding:10px; color:#CCC; font-family: "Trebuchet MS";}
input#seekslider{ width:140px;cursor:pointer;}
input#volumeslider{width:70px;cursor:pointer;}
input#playpausebtn{cursor:pointer;}
input[type='range']{
	-webkit-appearance: none !important;
	background: #000;
	border:#666 1px;
	height:4px;
}
input[type='range']::-webkit-slider-thumb {
	-webkit-appearance: none !important;
	background: #FFF;
	height: 15px;
	width: 15px;
	border-radius:100%;
	cursor:pointer;
}
#mutebtn{
	cursor: pointer;
}
#fullscreenbtn{
	cursor: pointer
}
#playpausebtn{
	cursor:pointer;
}
.o-play-btn {
  position: relative;
  background: transparent;
  border: none;
  outline: none;
}
.o-play-btn__icon {
  height: 30px;
  width: 30px;
  line-height: 30px;
  position: relative;
  z-index: 0;
  box-sizing: border-box;
  display: inline-block;
  overflow: hidden;
}
.o-play-btn__icon:before, .o-play-btn__icon:after {
  content: '';
  position: absolute;
  transition: 0.3s;
  background: #FFF;
  height: 100%;
  width: 50%;
  top: 0;
}
.o-play-btn__icon:before {
  left: 0;
}
.o-play-btn__icon:after {
  right: 0;
}
.o-play-btn__mask {
  position: absolute;
  z-index: 1;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  display: block;
}
.o-play-btn__mask:before, .o-play-btn__mask:after {
  content: '';
  position: absolute;
  left: 0;
  height: 100%;
  width: 150%;
  background: #333;
  transition: all 0.3s ease-out;
}
.o-play-btn__mask:before {
  top: -100%;
  transform-origin: 0% 100%;
  transform: rotate(26.5deg);
}
.o-play-btn__mask:after {
  transform-origin: 0% 0%;
  transform: rotate(-26.5deg);
  top: 100%;
}
.o-play-btn--playing .o-play-btn__icon:before {
  transform: translateX(-25%);
}
.o-play-btn--playing .o-play-btn__icon:after {
  transform: translateX(25%);
}
.o-play-btn--playing .o-play-btn__mask:before, .o-play-btn--playing .o-play-btn__mask:after {
  transform: rotate(0);
}

body {
  color: black;
  font-family: arial, sans-sarif;
  background-color: white;
  text-align: center;
}


</style>
<script>
var vid, playbtn, seekslider, curtimetext, durtimetext, mutebtn, volumeslider,fullscreenbtn,screen;

function intializePlayer(){
	vid = document.getElementById("my_video");
	playbtn = document.getElementById("playpausebtn");
	seekslider = document.getElementById("seekslider");
	curtimetext = document.getElementById("curtimetext");
	durtimetext = document.getElementById("durtimetext");
	mutebtn = document.getElementById("mutebtn");
	volumeslider = document.getElementById("volumeslider");
	fullscreenbtn = document.getElementById("fullscreenbtn");
	//event listeners 
	playbtn.addEventListener("click",playPause,false);
	seekslider.addEventListener("change",vidSeek,false);
	vid.addEventListener("timeupdate",seektimeupdate,false);
	mutebtn.addEventListener("click",vidmute,false);
	volumeslider.addEventListener("change",setvolume,false);
	fullscreenbtn.addEventListener("click",toggleFullScreen,false);
	vid.addEventListener("click",screenplaypause,false);

	}
window.onload = intializePlayer;
function playPause(){

if(vid.paused)
{
	vid.play();	
	$('.o-play-btn').on('click', function () 
	{
  	$(this).toggleClass('o-play-btn--playing');
	});
	
}
else{
	vid.pause();
	$('.o-play-btn').on('click', function () 
	{
  	$(this).toggleClass('o-play-btn--playing');
	});
	}	
}
function screenplaypause(){
if(vid.paused){
	vid.play();
	
}
else{
	vid.pause();
	
	}
}
function vidSeek(){
	var seekto = vid.duration * (seekslider.value / 100);
	vid.currentTime = seekto;	
	
}
function seektimeupdate(){
	var nt = vid.currentTime * (100/vid.duration);
	seekslider.value = nt;
	var curmins = Math.floor(vid.currentTime / 60);
	var cursecs = Math.floor(vid.currentTime - curmins * 60);
	var durmins = Math.floor(vid.duration / 60);
	var dursecs = Math.floor(vid.duration - durmins * 60 );
	if(cursecs < 10)
	{
		cursecs = "0"+cursecs;
		
	}
	if(dursecs < 10)
	{
		dursecs = "0"+dursecs;
	}
	if(curmins < 10)
	{
		curmins = "0"+curmins;
	}
	if(durmins < 10)
	{
		durmins = "0"+durmins;
	}
	curtimetext.innerHTML= curmins+":"+cursecs;
	durtimetext.innerHTML= durmins+":"+dursecs;
	
}
function vidmute(){
	if(vid.muted)
	{
		vid.muted = false;
		mutebtn.innerHTML = "Mute";
	}
	else
	{
		vid.muted = true;
		mutebtn.innerHTML = "Unmute";
	}
} 	
function setvolume(){
	vid.volume = volumeslider.value / 100;
}
function toggleFullScreen(){
	if(vid.requestFullScreen){
		vid.requestFullScreen();
	}
	else if(vid.webkitRequestFullScreen){
		vid.webkitRequestFullScreen();
	}
	else if(vid.mozRuestFullScreen){
		vid.mozRequestFullScreen();
	}

}
</script>

</head>
<body>
<?php
if(isset($_POST['submitbtn'])){
	$lname = $_POST['linkname'];
	echo $lname;
}
?>

<div id="video-player-box">
	<video id="my_video" width="550" height="320" class="videoplayer" autoplay>
		<source src="Usher Ft. Pitbull - DJ Got Us Fallin' In Love.mp4">
	</video>
	
	<div id="video-controls-bar">
		<button id="playpausebtn" class="o-play-btn">
		<i class="o-play-btn__icon">
		<div class="o-play-btn__mask"></div>
  		</i>
		</button>
		<input id="seekslider" type="range" min="0" max="100" value="0" step="1">
		<span id="curtimetext"></span> / <span id="durtimetext"></span>
		<button id="mutebtn">Mute</button>
		<input id="volumeslider" type="range" min="0" max="100" value="100" step="1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<button id="fullscreenbtn">[ &nbsp; ]</button>
	</div>

</div>

</body>
</html>