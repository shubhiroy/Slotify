<?php include("includes/header.php"); 

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



<?php include("includes/footer.php"); ?>