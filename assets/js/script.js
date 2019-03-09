// // class Audio{
// //     constructor(){
// //         this.audio = document.createElement("audio");
// //     }
// //     setTrack(src) {
// //         this.audio.src = src;
// //     }
// //     playTrack(){
// //         this.audio.play();
// //     }
// // }

var currentPlaylist = [];
var audioElement;

class Audio {
    constructor() {
        this.currentlyPlaying;
        this.audio = document.createElement('audio');
        // this.audio.addEventListener("canplay",function(){
        //     //let duration = formatTime(this.duration);
        //     $(".progressTime.remaining").text(this.duration);
        // });
    }
    setTrack(track){
        this.currentlyPlaying = track;
        this.audio.src = track.path;
    }

    play(){
        this.audio.play();
    }

    pause(){
        this.audio.pause();
    }
}

