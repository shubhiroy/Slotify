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
console.log(timer);
$(function(){
    $(".searchInput").keyup(function(){
        clearTimeout(timer);
        timer = setTimeout(function(){
            let val = $(".searchInput").val();
            openURL("search.php?term="+val);
        }, 2000);
    });
})

</script>

<?php  if($term == "") exit(); ?>

<div class="tracklistContainer borderBottom">
    <h2>SONGS</h2>
	<ul class="tracklist">
		<?php
            $query = "Select * from songs where title like '$term%'";
            $result = mysqli_query($con,$query);
            $count = 1;
            $songIds = array();
            if(mysqli_num_rows($result) == 0){
                echo "</span class='noResults'>No songs found matching ". $term ."</span>";
            }
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


<div class="artistContainer borderBottom">
    <h2>ARTISTS</h2>
    <?php 
    $query = "Select * from artists where name like '$term%'";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) == 0){
        echo "</span class='noResults'>No artists found matching ". $term ."</span>";
    }
    while($row = mysqli_fetch_array($result)){
        echo "<div class='searchResultRow'>
                    <div class='artistName'>
                        <span role='link' tabindex='0' onclick='openURL(\"artist.php?artistId=".  $row['id'] ."\")'>
                        ".  $row['name'] ."
                        </span>
                    </div>
                </div>";
    }
    ?>
</div>

 <div class="gridViewContainer">
    <h2>ALBUMS</h2>
    <?php
	$albumQuery = mysqli_query($con, "SELECT * FROM albums where title like '$term%'");
    if(mysqli_num_rows($albumQuery) == 0){
        echo "</span class='noResults'>No albums found matching ". $term ."</span>";
    }
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
