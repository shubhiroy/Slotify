<?php
	$query = "Select id from songs order by RAND() limit 10";
	$result = mysqli_query($con,$query);
	$resultArr = array();
	while($row = mysqli_fetch_array($result)){
		array_push($resultArr,$row['id']);
	}
	$jsonArr = json_encode($resultArr);
?>

<script>
$(document).ready(function(){
	currentPlaylist = <?php echo $jsonArr; ?> ;
	audioElement = new Audio();
	setTrack(currentPlaylist[0],currentPlaylist,false);
});

function setTrack(trackId,newPlaylist,play){
	$.post("includes/handlers/ajax/getSongJson.php",{ songId : trackId },function(trackData){
		let track = JSON.parse(trackData);
		$(".trackName span").text(track.title);
		$.post("includes/handlers/ajax/getArtistJson.php",{ artistId : track.artist },function(artistData){
			let artist = JSON.parse(artistData);
			$(".artistName span").text(artist.name);
		});
		$.post("includes/handlers/ajax/getAlbumJson.php",{albumId:track.album},function(albumData){
			let album = JSON.parse(albumData);
			$(".albumLink img").attr("src",album.artworkPath);
		});
		audioElement.setTrack(track);
	});
	if(play){
		play();
	}
}

function play(){
	console.log(audioElement);
	if(audioElement.audio.currentTime == 0){
		$.post("includes/handlers/ajax/updatePlayJson.php",{songId:audioElement.currentlyPlaying.id});
	}
	$(".controlButton.play").hide();
	$(".controlButton.pause").show();
	audioElement.play();
}

function pause(){
	$(".controlButton.play").show();
	$(".controlButton.pause").hide();
	audioElement.pause();
}

</script>

<div id="nowPlayingBarContainer">

	<div id="nowPlayingBar">

		<div id="nowPlayingLeft">
			<div class="content">
				<span class="albumLink">
					<img src="assets/images/artwork/clearday.jpg" class="albumArtwork">
				</span>
				<div class="trackInfo">

					<span class="trackName">
						<span>Happy Birthday</span>
					</span>

					<span class="artistName">
						<span>Reece Kenney</span>
					</span>

				</div>



			</div>
		</div>

		<div id="nowPlayingCenter">

			<div class="content playerControls">

				<div class="buttons">

					<button class="controlButton shuffle" title="Shuffle button">
						<img src="assets/images/icons/shuffle-btn.png" alt="Shuffle">
					</button>

					<button class="controlButton previous" title="Previous button">
						<img src="assets/images/icons/previous-btn.png" alt="Previous">
					</button>

					<button class="controlButton play" title="Play button" onclick="play();">
						<img src="assets/images/icons/play-btn.png" alt="Play">
					</button>

					<button class="controlButton pause" title="Pause button" style="display: none;" onclick="pause();">
						<img src="assets/images/icons/pause-btn.png" alt="Pause">
					</button>

					<button class="controlButton next" title="Next button">
						<img src="assets/images/icons/next-btn.png" alt="Next">
					</button>

					<button class="controlButton repeat" title="Repeat button">
						<img src="assets/images/icons/repeat-btn.png" alt="Repeat">
					</button>

				</div>


				<div class="playbackBar">

					<span class="progressTime current">0.00</span>

					<div class="progressBar">
						<div class="progressBarBg">
							<div class="progress"></div>
						</div>
					</div>

					<span class="progressTime remaining">0.00</span>


				</div>


			</div>


		</div>

		<div id="nowPlayingRight">
			<div class="volumeBar">

				<button class="controlButton volume" title="Volume button">
					<img src="assets/images/icons/volume-btn.png" alt="Volume">
				</button>

				<div class="progressBar">
					<div class="progressBarBg">
						<div class="progress"></div>
					</div>
				</div>

			</div>
		</div>




	</div>

</div>