<?php
include 'connect.php';
require 'Faker-master/src/autoload.php';
/**
 * Created by PhpStorm.
 * User: luispineda
 * Date: 27/05/17
 * Time: 03:00 AM
 */

$faker = Faker\Factory::create();

$sql="";

for ($K=0; $K < 10; $K++){
    $identificacion = $faker->numberBetween($min = 100000000, $max = 1000000000);
    $genero = $faker->randomElement($array = array ('m','f'));
    if($genero=='m')
        $nombres = $faker->firstName($gender = 'male');
    else
        $nombres = $faker->firstName($gender = 'female');
    $apellidos = $faker->lastName;
    $email = $faker->email;
    $telefono = $faker->tollFreePhoneNumber;
    $fecha_nacimineto = $faker->date($format = 'Y-m-d', $max = 'now');

    $nombre_contacto = "";
    $telefono_contacto = "";

    $sql .= "INSERT INTO competidor(identificacion, nombres, apellidos, email, telefono, fecha_nacimineto, genero, nombre_contacto, telefono_contacto) VALUES ";
    $sql .="('$identificacion','$nombres','$apellidos','$email','$telefono','$fecha_nacimineto','$genero','$nombre_contacto','$telefono_contacto');";
//    echo $sql;

//echo "<br>";

    $categoria = $faker->numberBetween($min = 6, $max = 19);

    $sqlCategori_com = "INSERT INTO categoria_com(id, categoria, identificacion) VALUES (null,$categoria,'$identificacion');";
    $sql .= $sqlCategori_com;

//    echo "<br>";echo "<br>";

    for ($i=1; $i < 15; $i++){
        $club = $faker->numberBetween($min = 1, $max = 52);

        $tiempo = "0".$faker->numberBetween($min = 0, $max = 9).".".$faker->numberBetween($min = 10, $max = 99).".".$faker->numberBetween($min = 10, $max = 99);

        $sqlCompetencia = "INSERT INTO competencia(club, competidor, prueba, tiempo) VALUES ($club,'$identificacion',$i,'$tiempo');";
        $sql .= $sqlCompetencia;
//        echo "<br>";
    }

    $sql .= "<br><br>";echo "<br>";



}

echo $sql;

//if (mysqli_query($enlace, $sql) === TRUE) {
//    echo "exito";
//}else{
//    printf("Error: %s\n", mysqli_error($enlace));
//}





?>