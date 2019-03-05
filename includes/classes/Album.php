<?php
    class Album{
        private $con;
        private $id;
        private $title;
        private $artistId;
        private $genre;
        private $artPath;

        public function __construct($con,$id){
            $this->con = $con;
            $this->id = $id;

            $query = "Select * from albums where id = '$this->id'";
            $result = mysqli_query($this->con,$query);
            $album = mysqli_fetch_assoc($result);

            $this->title = $album['title'];
            $this->artistId = $album['artist'];
            $this->genre = $album['genre'];
            $this->artPath = $album['artworkPath']; 
        }
        
        public function getTitle(){
            return $this->title;
        }

        public function getArtist(){
            return ((new Artist($this->con,$this->artistId))->getName());
        }

        public function getGenre(){
            return $this->genre;
        }

        public function getArtworkPath(){
            return $this->artPath;
        }

        public function getNumberOfSongs(){
            $query = "Select * from songs where album = '$this->id'";
            $result = mysqli_query($this->con,$query);
            if (!$result){
                return '~';
            }
            return mysqli_num_rows($result);
        }

    }
?>