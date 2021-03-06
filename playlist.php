<?php
include_once("includes/includedFiles.php");

if(isset($_GET['id'])){
    $playlistId = $_GET['id'];
}else{
    header("Location: yourMusic.php");
}
$playlist = new Playlist($con,$playlistId);
?>


<div class="entityInfo">
	<div class="leftSection">
        <div class="playlistImage">
            <img src="assets/images/icons/playlist.png" alt="Album Pic">
        </div>
	</div>
	<div class="rightSection">
		<h2> <?php echo $playlist->getPlaylistName(); ?> </h2>
		<p> <?php echo "By " . $playlist->getPlaylistOwner(); ?> </p>
        <p> <?php echo $playlist->getTotalSongs() . " songs"; ?> </p>
        <button class="button" onclick="deletePlaylist(<?php echo $playlistId; ?>)">DELETE PLAYLIST</button>
	</div>
</div>

<div class="tracklistContainer">
	<ul class="tracklist">
		<?php
			$playlistSongIds = $playlist->getSongIds();
			$count = 1;
			foreach($playlistSongIds as $playlistSongId){
				$playlistSong = new Song($con,$playlistSongId);
				echo "<div class='tracklistRow'>
						<div class='tracklistCount'>
							<img src='assets/images/icons/play-white.png' alt='Play Button' onclick='setTrack(\"". $playlistSong->getId() ."\",tempPlaylist,true)'>
							<span>" . $count . "</span>
						</div>
						<div class='trackInfo'>
							<span class='trackName'>" . $playlistSong->getTitle() . "</span>
							<span class='artistName'>" .  $playlistSong->getArtist() . "</span>
						</div>
						<div class='trackOption'>
							<input type='hidden' class='songId' value='".  $playlistSong->getId() ."'>
							<img src='assets/images/icons/more.png' alt='Track Option Button' onclick='showMenu(this)'>
						</div>
						<div class='trackDuration'>" . $playlistSong->getDuration() . "</div>
					  </div>";
				$count = $count + 1;
			}
		?>

		<script>
			{
			let tempSongIds = '<?php echo json_encode($playlistSongIds); ?>';
			tempPlaylist = JSON.parse(tempSongIds);
			}
		</script>

	</ul>
</div>

<nav class="optionsMenu">
	<input type="hidden" class="songId">
	<!-- <?php  echo Playlist::getPlaylistDropdown($con,$user->getUsername()); ?> -->
	<div class="item removePlaylistSong" onclick='removeFromPlaylist(this,<?php  echo $playlistId; ?>)'>Remove From Playlist</div>
	<div class="item">Item 3</div>
	
</nav>