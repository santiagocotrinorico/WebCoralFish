<?php
class Resultados{
	var $nombreClub;

	var $masculino;
	var $femenino;
	var $puntos;

	var $oro;
	var $plata;
	var $bronce;
	var $medallas;


    function getNombreClub(){
        return $this->nombreClub;
    }
 
    function getMasculino(){
        return $this->masculino;
    }
	
	function getFemenino(){
        return $this->femenino;
    }
	
	function getPuntos(){
        return $this->puntos;
    }
	
	function getOro(){
        return $this->oro;
    }
	
	function getPlata(){
        return $this->plata;
    }
	
	function getBronce(){
        return $this->bronce;
    }
	
	function getMedallas(){
        return $this->medallas;
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
	
	function setPuntos($puntos){
        $this->puntos = $puntos;
    }
	
	function setOro($oro){
        $this->oro = $oro;
    }
	
	function setPlata($plata){
        $this->plata = $plata;
    }
	
	function setBronce($bronce){
        $this->bronce = $bronce;
    }
	
	function setMedallas($medallas){
        $this->medallas = $medallas;
    }
}

?>