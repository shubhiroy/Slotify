<?php


class Playlist{

    private $con;
    private $id;
    private $name;
    private $owner;
    private $totalSongs;

    public function __construct($con,$data){
        $this->con = $con;

        if(is_array($data)){
            $this->id = $data['id'];
            $this->name = $data['name'];
            $this->owner = $data['owner'];
        }else{
            $query = "Select * from playlists where id = '$data'";
            $result = mysqli_query($this->con,$query);
            $playlistInfo = mysqli_fetch_array($result);

            $this->id = $playlistInfo['id'];
            $this->name = $playlistInfo['name'];
            $this->owner = $playlistInfo['owner'];
        }

        $query = "Select songId from playlistsongs where playlistId = '$this->id'";
        $result = mysqli_query($this->con,$query);
        $this->totalSongs = mysqli_num_rows($result);
    }

    public function getId(){
        return $this->id;
    }

    public function getPlaylistName(){
        return $this->name;
    }

    public function getPlaylistOwner(){
        return $this->owner;
    }

    public function getTotalSongs(){
        return $this->totalSongs;
    }

    public function getSongIds(){
        $query = "Select songId from playlistsongs where playlistId = '$this->id' order by playlistOrder asc";
        $result = mysqli_query($this->con,$query);
        $array = array();
        while($row = mysqli_fetch_array($result)){
            array_push($array,$row['songId']);
        }
        return $array;
    }

    public static function getPlaylistDropdown($con,$username){
        $query = "Select * from playlists where owner = '$username'";
        $result = mysqli_query($con,$query);
        $dropdown = "<select class='item playlist'>
                         <option value=''>Add to playlist</option>";
        while($row = mysqli_fetch_array($result)){
            $dropdown = $dropdown . "<option value='".  $row['id'] ."'>". $row['name'] ."</option>";
        }
        
        return $dropdown . "</select>";
    }
}



?>