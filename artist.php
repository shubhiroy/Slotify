<?php 
include_once("includes/includedFiles.php");

if (isset($_GET['artistId'])) {
    $artistId = $_GET['artistId'];
} else {
    header("Location: index.php");
}
$artist = new Artist($con, $artistId);

?>

<div class="artistPage entityInfo borderBottom">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName();  ?></h1>
            <div class="headerButtons">
                <button class="button green">PLAY</button>
            </div>
        </div>
    </div>
</div> 

<div class="tracklistContainer borderBottom">
	<ul class="tracklist">
		<?php
			$songIds = $artist->getSongIds();
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