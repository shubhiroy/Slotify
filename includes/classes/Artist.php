<?php
    class Artist{
        private $con;
        private $id;
        private $artistName;

        public function __construct($con,$id){
            $this->con = $con;
            $this->id = $id;

            $query = "Select name from artists where id = '$this->id'";
            $result = mysqli_query($this->con,$query);
            $artist = mysqli_fetch_assoc($result);

            $this->artistName = $artist['name'];
        }
        
        public function getName(){
            return $this->artistName;
        }

        public function getSongIds(){
            $query = "Select id from songs where artist = '$this->id' order by plays desc";
            $result = mysqli_query($this->con,$query);
            $array = array();
            while($row = mysqli_fetch_array($result)){
                array_push($array,$row['id']);
            }
            return $array;
        }

    }
?>