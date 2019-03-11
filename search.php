<?php

include_once("includes/includedFiles.php");

if(isset($_GET['term'])){
    $term = urldecode($_GET['term']);
}else{
    $term = "";
}
?>
<div class="searchContainer">
<h4>Search for songs, artists or albums</h4>
<input type="text" class="searchInput" placeholder="Start Typing ... " value="<?php echo $term; ?>" onfocus="this.value = this.value">
</div>

<script>
$(".searchInput").focus();

$(() => {
    let timer;
    $(".searchInput").keyup(() => {
        clearTimeout(timer);
        timer = setTimeout(() => {
            let val = $(".searchInput").val();
            openURL("search.php?term="+val);
        }, 2000);
    });
})

</script>

<div class="tracklistContainer borderBottom">
    <h2>SONGS</h2>
	<ul class="tracklist">
		<?php
            $query = "Select * from songs where title like '$term%'";
            $result = mysqli_query($con,$query);
            $count = 1;
            $songIds = array();
			while($row = mysqli_fetch_array($result)){
                $song = new Song($con,$row['id']);
                array_push($songIds,$song->getId());
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
            {
                let tempSongIds = '<?php echo json_encode($songIds); ?>';
                tempPlaylist = JSON.parse(tempSongIds);
            }
		</script>
 	</ul>
 </div>


