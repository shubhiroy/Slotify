<?php
include_once("includes/config.php");
include_once("classes/User.php");
include_once("classes/Artist.php");
include_once("classes/Album.php");
include_once("classes/Song.php");
include_once("classes/Playlist.php");

//session_destroy(); LOGOUT

if(isset($_SESSION['userLoggedIn'])) {
	$userLoggedIn = $_SESSION['userLoggedIn'];
	echo "<script> var userLoggedIn = '$userLoggedIn' </script>";
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
</head>

<body>
	<!-- <script type="text/javascript">
		$(function(){
			function callback () {
				var audioElement = new Audio();
				audioElement.setTrack("assets/music/bensound-acousticbreeze.mp3");
				//audioElement.audio.play();
			}
			window.addEventListener("load", callback, false);

		});
	</script> -->
	<div id="mainContainer">

		<div id="topContainer">

			<?php include("includes/navBarContainer.php"); ?>

			<div id="mainViewContainer">

				<div id="mainContent">