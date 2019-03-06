<?php
include("includes/config.php");
include("classes/Artist.php");
include("classes/Album.php");
include("classes/Song.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
}
else {
	header("Location: register.php");
}

?>

<html>
<head>
	<title>Welcome to Slotify!</title>

	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="assets/js/script.js"></script>
	<script src="assets/js/register.js"></script>
</head>

<body>
	<script type="text/javascript">
		$(function(){
			function callback () {
				var audioElement = new Audio();
				audioElement.setTrack("assets/music/bensound-acousticbreeze.mp3");
				console.log('hi');
				audioElement.audio.play();
			}
			window.addEventListener("load", callback, false);

		});
	</script>
	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">

				<div id="mainContent">