var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;
var timer;
var userLoggedIn;

$(window).scroll(function(){
    hideMenu();
});

$(document).on("change","select.playlist",function(){
    let playlistId = $(this).val();
    let songId = $(this).prev(".songId").val();
    $.post("includes/handlers/ajax/addToPlaylistJson.php",{playlistId:playlistId,songId:songId})
    .done(function(err){
        alert(err);
    });
    hideMenu();
});


function logout(){
    $.post("includes/handlers/ajax/logoutJson.php")
    .done(function(){
        location.reload();
    });
}

function openURL(url) {

    // if(timer != null){
    //     clearTimeout(timer);
    // }

    if (url.indexOf("?") == -1) {
        url = url + "?";
    }
    var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
    $("#mainContent").load(encodedUrl);
    $('body').scrollTop(0);
    history.pushState(null, null, url);
}

function createPlaylist(){
    let playlist = prompt("Please enter the name of your playlist.");
    if(playlist != null){
        $.post("includes/handlers/ajax/createPlaylistJson.php",{playlistName:playlist, username:userLoggedIn})
        .done(function(err){
            if(err != ""){
                alert(err);
                return;
            }
            openURL("yourMusic.php");
        });
    }
}

function deletePlaylist(playlistId){
    var res = confirm("Are you sure you want to delete the playlist ?");
    if(res){
        $.post("includes/handlers/ajax/deletePlaylistJson.php",{playlistId:playlistId})
        .done(function(err){
            if(err=="false"){
                alert("Sorry, Unable to delete the playlist.");
            }else{
                openURL("yourMusic.php");
            }
        });
    }
}

function showMenu(button){
    let songId = $(button).prevAll(".songId").val();
    let menu = $(".optionsMenu");
    let menuWidth = menu.width();
    let scrollTop = $(window).scrollTop();
    let elementOffset = $(button).offset().top;
    let top = elementOffset - scrollTop;
    let left = $(button).position().left - menu.width() - 4;
    
    menu.find(".songId").val(songId);
    menu.css({"top":top + "px", "left":left + "px", "display":"inline"});
}

function hideMenu(){
    let menu = $(".optionsMenu");
    if(menu.css("display") != "none"){
        menu.css({"display":"none"});
    }
}

function removeFromPlaylist(element,playlistId){
    let songId = $(".removePlaylistSong").prev(".songId").val();
    $.post("includes/handlers/ajax/removePlaylistSongJson.php",{playlistId:playlistId,songId:songId})
    .done(function(err){
        openURL("playlist.php?id="+playlistId);
        $(document).ready(function(){
            alert(err);
        });
    });
    hideMenu();
}

class Audio {
    constructor() {
        this.currentlyPlaying;
        this.audio = document.createElement('audio');
        this.audio.addEventListener("canplay", function () {
            let duration = Audio.formatTime(this.duration);
            $(".playbackBar .progressTime.remaining").text(duration);
        });
        this.audio.addEventListener("timeupdate", function () {
            if (this.duration) {
                Audio.updateProgressTime(this);
            }
        });
        this.audio.addEventListener("volumechange", function () {
            Audio.updateVolumeProgress(this);
        });
        this.audio.addEventListener("ended", function () {
            nextSong();
        });
    }

    static formatTime(seconds) {
        let time = Math.round(seconds);
        let minutes = Math.floor(time / 60);
        let sec = time - (minutes * 60);
        let extraZero = (sec < 10) ? "0" : "";
        return minutes + ":" + extraZero + sec;
    }

    setTrack(track) {
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    play() {
        this.audio.autoplay = true
        this.audio.play();
    }

    pause() {
        this.audio.pause();
    }
    setTime(seconds) {
        this.audio.currentTime = seconds;
    }

    static updateProgressTime(audio) {
        $(".playbackBar .progressTime.current").text(Audio.formatTime(audio.currentTime));
        $(".playbackBar .progressTime.remaining").text(Audio.formatTime(audio.duration - audio.currentTime));
        let progressWidth = ((audio.currentTime / audio.duration) * 100) + "%";
        $(document).ready(function () {
            $(".playbackBar .progress").css("width", progressWidth);
        });

    }

    static updateVolumeProgress(audio) {
        let volume = (audio.volume * 100) + "%";
        $(document).ready(function () {
            $(".volumeBar .progress").css("width", volume);
        });
    }
}

