<?php

class Playlist{

    private $con;
    private $id;
    private $name;
    private $owner;

    function __constructor($con,$data){
        $this->con = $con;
        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->owner = $data['owner'];
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
}

?>