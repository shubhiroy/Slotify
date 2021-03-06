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
                <button class="button green" onclick="setTrack(tempPlaylist[0],tempPlaylist,true)">PLAY</button>
            </div>
        </div>
    </div>
</div>

<div class="tracklistContainer borderBottom">
    <h2>SONGS</h2>
    <ul class="tracklist">
        <?php
		$songIds = $artist->getSongIds();
		$count = 1;
		foreach ($songIds as $songId) {
			$song = new Song($con, $songId);
			echo "<div class='tracklistRow'>
						<div class='tracklistCount'>
							<img src='assets/images/icons/play-white.png' alt='Play Button' onclick='setTrack(\"" . $song->getId() . "\",tempPlaylist,true)'>
							<span>" . $count . "</span>
						</div>
						<div class='trackInfo'>
							<span class='trackName'>" . $song->getTitle() . "</span>
							<span class='artistName'>" .  $song->getArtist() . "</span>
						</div>
						<div class='trackOption'>
							<input type='hidden' class='songId' value='".  $song->getId() ."'>
							<img src='assets/images/icons/more.png' alt='Track Option Button' onclick='showMenu(this)'>
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

<div class="gridViewContainer">
    <h2>ALBUMS</h2>
    <?php
	$albumQuery = mysqli_query($con, "SELECT * FROM albums where artist = '$artistId' ORDER BY RAND()");

	while ($row = mysqli_fetch_array($albumQuery)) {
		echo "<div class='gridViewItem'>
					<span role='link' tabindex='0' onclick=openURL('album.php?id=" . $row['id'] . "')>
						<img src='" . $row['artworkPath'] . "'>

						<div class='gridViewInfo'>"
			. $row['title'] .
			"</div>
					</span>

				</div>";
	}
	?>
</div> 

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<?php  echo Playlist::getPlaylistDropdown($con,$user->getUsername()); ?>
	<div class="item">Item 2</div>
	<div class="item">Item 3</div>
	
</nav>