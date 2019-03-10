<script src="https://cdnjs.cloudflare.com/ajax/libs/howler/2.1.1/howler.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
    var sound = new Howl({
      src: ['../music/bensound-anewbeginning.mp3'],
      volume: 0.5,
      onend: function () {
        alert('Finished!');
      }
    });
    //var sound = new Audio("../music/bensound-anewbeginning.mp3");
    console.log("hello");
    $(document).ready(function(){
        console.log(sound);
        sound.play()
    });
    
</script>