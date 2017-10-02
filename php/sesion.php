<?php 
include 'connect.php';
//header('Content-Type: text/html; charset=ISO-8859-1');
if($_POST){


		if ($resultado = mysqli_query($enlace, "SELECT id, club  FROM clubs WHERE `usuario`=\"".$_POST["usuario"]. "\" and `password`= \"".md5($_POST["contrasena"])."\"")) {
		    $numJornadas = mysqli_num_rows($resultado);

		if($numJornadas!=0){
		session_start();
		$row = mysqli_fetch_assoc($resultado);
				$_SESSION["id"] = $row["id"];
				$_SESSION["usuario"] = $row["club"];
				echo "loginExito";
				 //header("Location: ../inscribir_competidor.php");
		}else {

			echo "usuario o contraseña incorrectas";
		}



		    mysqli_free_result($resultado);
		}
		//echo "usuario = ".$_POST["usuario"]. " y la contraseña es ".$_POST["contrasena"] ;




}else{

  session_start();
  unset($_SESSION["usuario"]); 
  session_destroy();
  header("Location: ../index.html");
  exit;

}



 ?>