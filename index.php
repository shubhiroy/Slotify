<?php
    include("includes/config.php");
    if(isset($_SESSION['userLoggedIn'])){
        $username = $_SESSION['userLoggedIn'];
    }else{
        header("Location: register.php");
    }
    // unset($_SESSION['userLoggedIn']); // LOG OUT
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to Slotify</title>
    <link rel="stylesheet" href="includes/assets/css/style.css">
</head>
<body>
    <div id="nowPlayBarContainer">
        <div id="nowPlayingBar">
            <div id="nowPlayingLeft">              
            </div>
            <div id="nowPlayingCentre"> 
                <div class="content playerControls">
                    <div class="buttons">
                        <button class="controlButton shuffle" title="Shuffle">
                            <img src="includes/assets/images/icons/shuffle-btn.png" alt="Shuffle">
                        </button>
                        <button class="controlButton previous" title="Previous">
                            <img src="includes/assets/images/icons/previous-btn.png" alt="Previous">
                        </button>
                        <button class="controlButton play" title="Play">
                            <img src="includes/assets/images/icons/play-btn.png" alt="Play">
                        </button>
                        <button class="controlButton pause" title="Pause" style="display:none;">
                            <img src="includes/assets/images/icons/pause-btn.png" alt="Pause">
                        </button>
                        <button class="controlButton next" title="Next">
                            <img src="includes/assets/images/icons/next-btn.png" alt="Next">
                        </button>
                        <button class="controlButton repeat" title="Repeat">
                            <img src="includes/assets/images/icons/repeat-btn.png" alt="Repeat">
                        </button>
                    </div>

                    <div class="playBackBar">
                        <span class="progressTime current">0.00</span>
                        <div class="progressBar">
                            <div class="progressBarBg">
                                <div class="progress"></div>
                            </div>
                        </div>
                        <span class="progressTime remaining">0.00</span>
                    </div>
                </div>             
            </div>
            <div id="nowPlayingRight">              
            </div>
        </div>
    </div>
</body>
</html>
