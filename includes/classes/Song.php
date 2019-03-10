<?php

    class Song{
        private $con;
        private $id;
        private $title;
        private $artistId;
        private $albumId;
        private $genre;
        private $duration;
        private $path;
        private $mysqlData;

        public function __construct($con, $id){
            $this->con = $con;
            $this->id = $id;

            $query = "Select * from songs where id = '$id'";
            $result = mysqli_query($this->con,$query);
            $this->mysqlData = mysqli_fetch_array($result);

            $this->title = $this->mysqlData['title'];
            $this->artistId = $this->mysqlData['artist'];
            $this->albumId = $this->mysqlData['album'];
            $this->genre = $this->mysqlData['genre'];
            $this->duration = $this->mysqlData['duration'];
            $this->path = $this->mysqlData['path'];
        }

        public function getTitle(){
            return $this->title;
        }

        public function getId(){
            return $this->id;
        }

        public function getAlbum(){
            return (new Album($this->con,$this->albumId));
        }

        public function getArtist(){
            return (new Artist($this->con,$this->artistId))->getName();
        }
        
        public function getGenre(){
            return $this->genre;
        }

        public function getDuration(){
            return $this->duration;
        }

        public function getPath(){
            return $this->path;
        }

        public function getMysqlData(){
            return $this->mysqlData;
        }

    }
    
?>