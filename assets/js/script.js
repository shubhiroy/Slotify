var currentPlaylist = [];
var shufflePlaylist = [];
var tempPlaylist = [];
var audioElement;
var mouseDown = false;
var currentIndex = 0;
var repeat = false;
var shuffle = false;


function openURL(url){
    if(url.indexOf("?") == -1){
        url = url + "?";
    }
    var encodedUrl = encodeURI(url + "&userLoggedIn=" + userLoggedIn);
    console.log(encodedUrl);
    $("#mainContent").load(encodedUrl);
}

class Audio {
    constructor() {
        this.currentlyPlaying;
        this.audio = document.createElement('audio');
        this.audio.addEventListener("canplay",function(){
            let duration = Audio.formatTime(this.duration);
            $(".playbackBar .progressTime.remaining").text(duration);
        });
        this.audio.addEventListener("timeupdate",function(){
            if(this.duration){
                Audio.updateProgressTime(this);
            }
        });
        this.audio.addEventListener("volumechange",function(){
            Audio.updateVolumeProgress(this);
        });
        this.audio.addEventListener("ended",function(){
            nextSong();
        });
    }

    static formatTime(seconds){
        let time = Math.round(seconds);
        let minutes = Math.floor(time / 60);
        let sec = time - (minutes * 60);
        let extraZero = (sec < 10) ? "0" : "";
        return minutes + ":" + extraZero + sec;  
    }

    setTrack(track){
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    play(){
        this.audio.autoplay = true
        this.audio.play();
    }

    pause(){
        this.audio.pause();
    }
    setTime(seconds){
        this.audio.currentTime = seconds;
    }
   
    static updateProgressTime(audio){
        $(".playbackBar .progressTime.current").text(Audio.formatTime(audio.currentTime));
        $(".playbackBar .progressTime.remaining").text(Audio.formatTime(audio.duration - audio.currentTime));
        let progressWidth = ((audio.currentTime/audio.duration) * 100) + "%";
        $(document).ready(function(){
            $(".playbackBar .progress").css("width",progressWidth);
        });
        
    }

    static updateVolumeProgress(audio){
        let volume = (audio.volume * 100) + "%"; 
        $(document).ready(function(){
            $(".volumeBar .progress").css("width",volume);
        });
    }
}

