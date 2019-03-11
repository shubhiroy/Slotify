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
<input type="text" class="searchInput" placeholder="Start Typing ... " value="<?php echo $term; ?>" onfocus="m(this.value)">
</div>

<script>
$(".searchInput").focus();
function m(x){
    console.log(x);
}
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