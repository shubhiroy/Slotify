<?php include_once("includes/includedFiles.php"); 

if(isset($_GET['id'])) {
	$albumId = $_GET['id'];
}
else {
	header("Location: index.php");
}
$album = new Album($con,$albumId);
?>

<div class="entityInfo">
	<div class="leftSection">
		<img src="<?php echo $album->getArtworkPath(); ?>" alt="Album Pic">
	</div>
	<div class="rightSection">
		<h2> <?php echo $album->getTitle(); ?> </h2>
		<p> <?php echo "By " . $album->getArtist(); ?> </p>
		<p> <?php echo $album->getNumberOfSongs() . " songs"; ?> </p>
	</div>
</div>

<div class="tracklistContainer">
	<ul class="tracklist">
		<?php
			$songIds = $album->getSongIds();
			$count = 1;
			foreach($songIds as $songId){
				$song = new Song($con,$songId);
				echo "<div class='tracklistRow'>
						<div class='tracklistCount'>
							<img src='assets/images/icons/play-white.png' alt='Play Button' onclick='setTrack(\"". $song->getId() ."\",tempPlaylist,true)'>
							<span>" . $count . "</span>
						</div>
						<div class='trackInfo'>
							<span class='trackName'>" . $song->getTitle() . "</span>
							<span class='artistName'>" .  $song->getArtist() . "</span>
						</div>
						<div class='trackOption'>
							<img src='assets/images/icons/more.png' alt='Track Option Button'>
						</div>
						<div class='trackDuration'>" . $song->getDuration() . "</div>
					  </div>";
				$count = $count + 1;
			}
		?>

		<script>
			let tempSongIds = '<?php echo json_encode($songIds); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
		</script>

	</ul>
</div>


