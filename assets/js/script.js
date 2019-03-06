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

function Audio(){
    this.audio = document.createElement('audio');
    this.setTrack = function(src){
        this.audio.src = src;
    }
}

