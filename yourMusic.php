<?php  include_once("includes/includedFiles.php"); ?>

<div class="playlistContainer">
    <div class="gridViewContainer">
        <h2>PLAYLISTS</h2>
        <div class="buttonItems">
            <button class="button green" onclick="createPlaylist()">NEW PLAYLIST</button>
        </div>

		<?php
		$userLoggedIn = $user->getUsername();
		$albumQuery = mysqli_query($con, "SELECT * FROM playlists where owner = '$userLoggedIn'");
		
		while($row = mysqli_fetch_array($albumQuery)) {
			$playlist = new Playlist($con,$row);
			echo "<div class='gridViewItem yourMusic'>
					<span role='link' tabindex='0' onclick=openURL('playlist.php?id=" . $playlist->getId() . "')>
						<div class='playlistImage'>
							<img src='assets/images/icons/playlist.png'>
						</div>
						<div class='gridViewInfo'>"
							. $playlist->getPlaylistName() .
						"</div>
					</span>
				</div>  
				<script>console.log('".$playlist->getPlaylistName()."');</script>";
		}
	    ?>


    </div>
</div>