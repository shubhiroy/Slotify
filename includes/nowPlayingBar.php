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
	Audio.updateVolumeProgress(audioElement.audio);

	$("#nowPlayingBarContainer").on("mousedown touchstart mousemove touchmove",function(e){
		e.preventDefault();
	});

	$(".playbackBar .progressBarBg").mousedown(function(){
		mouseDown = true;
	});
	$(".playbackBar .progressBarBg").mousemove(function(e){
		if(mouseDown){
			timeFromOffset(e,this);
		}
	});
	$(".playbackBar .progressBarBg").mouseup(function(e){
		timeFromOffset(e,this);
	});

	$(".volumeBar .progressBarBg").mousedown(function(){
		mouseDown = true;
	});
	$(".volumeBar .progressBarBg").mousemove(function(e){
		if(mouseDown){
			let fraction = e.offsetX / $(this).width();
			if(fraction >= 0 && fraction <= 1){
				audioElement.audio.volume = fraction;
			}
		}
	});
	$(".volumeBar .progressBarBg").mouseup(function(e){
		let fraction = e.offsetX / $(this).width();
			if(fraction >= 0 && fraction <= 1){
				audioElement.audio.volume = fraction;
			}
	});

	$(document).mouseup(function(){
		mouseDown = false;
	});
});

function timeFromOffset(mouse,progressBarBg){
	let fraction = mouse.offsetX / $(progressBarBg).width();
	let seconds = audioElement.audio.duration * fraction;
	audioElement.setTime(seconds);
}

function setTrack(trackId,newPlaylist,playTrack){
	currentIndex = currentPlaylist.indexOf(trackId);
	pause();
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
	if(playTrack){
		play();
	}
}

function play(){
	if(audioElement.audio.currentTime == 0 ){
		$.post("includes/handlers/ajax/updatePlaysJson.php",{songId:audioElement.currentlyPlaying.id});
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

function nextSong(){
	if(repeat == true){
		audioElement.setTime(0);
		play();
		return;
	}
	if(currentIndex == (currentPlaylist.length - 1)){
		currentIndex = 0;
	}else{
		currentIndex++;
	}
	setTrack(currentPlaylist[currentIndex],currentPlaylist,true);
}

function setRepeat(){
	repeat = !repeat;
	let repeatImage = repeat ? "repeat-btn.png" : "no-repeat-btn.png"
	$(".controlButton.repeat img").attr("src","assets/images/icons/" + repeatImage);
}

</script>

<div id="nowPlayingBarContainer">

	<div id="nowPlayingBar">

		<div id="nowPlayingLeft">
			<div class="content">
				<span class="albumLink">
					<img src="assets/images/artwork/sweet.jpg" class="albumArtwork" alt="Album Pic">
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
						<img src="assets/images/icons/next-btn.png" alt="Next" onclick="nextSong()">
					</button>

					<button class="controlButton repeat" title="Repeat button">
						<img src="assets/images/icons/no-repeat-btn.png" alt="Repeat" onclick = "setRepeat()">
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