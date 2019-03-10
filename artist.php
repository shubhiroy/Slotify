<?php 
include_once("includes/includedFiles.php");

if (isset($_GET['artistId'])) {
    $artistId = $_GET['artistId'];
} else {
    header("Location: index.php");
}
$artist = new Artist($con, $artistId);

?>

<div class="entityInfo">
    <div class="centerSection">
        <div class="artistInfo">
            <h1 class="artistName"><?php echo $artist->getName();  ?></h1>
            <div class="headerButtons">
                <button class="button">PLAY</button>
            </div>
        </div>
    </div>

</div> 