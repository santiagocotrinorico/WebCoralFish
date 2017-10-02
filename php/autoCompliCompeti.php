<?php
include 'connect.php';

//CREATE QUERY TO DB AND PUT RECEIVED DATA INTO ASSOCIATIVE ARRAY
if (isset($_REQUEST['query'])) {
    $query = $_REQUEST['query'];
    $sql = mysqli_query($enlace,"SELECT identificacion, nombres ,apellidos FROM `competidor` WHERE identificacion LIKE '%{$query}%' OR nombres LIKE '%{$query}%' OR apellidos LIKE '%{$query}%'");

    $array = array();
    while ($row = mysqli_fetch_assoc($sql)) {

        if(count($row)==0){
            $array = [];
        }else{
            $array[]=["value"=>$row['nombres']." ".$row['apellidos'],"data"=>$row['identificacion']];
        }

    }
    //RETURN JSON ARRAY
    $data["query"]="Unit";
    $data["suggestions"]=$array;
    echo json_encode ($data);
}

?>