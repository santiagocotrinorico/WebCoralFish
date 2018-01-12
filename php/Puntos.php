<?php
class Puntos{
var $nombreClub;
var $masculino;

var $femenino;
var $total;
 
    function getNombreClub(){
        return $this->nombreClub;
    }
 
    function getMasculino(){
        return $this->masculino;
    }
	
	function getFemenino(){
        return $this->femenino;
    }
	
	function getTotal(){
        return $this->total;
    }
 
    function setNombreClub($nombreClub){
       $this->nombreClub = $nombreClub;
    }
 
    function setMasculino($masculino){
        $this->masculino = $masculino;
    }
	
	function setFemenino($femenino){
        $this->femenino = $femenino;
    }
	
	function setTotal($total){
        $this->total = $total;
    }
}

?>