<?php 
include 'php/connect.php';
session_start();

if ($resultado = mysqli_query($enlace, "SELECT jornada FROM jornadas_pruebas group by jornada")) {
    $numJornadas = mysqli_num_rows($resultado);
    mysqli_free_result($resultado);
}


mysqli_close($enlace);
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=UTF-8">
		<meta charset="utf-8">
		<title>Inscribir competidor</title>
		<meta name="generator" content="Bootply" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/styles.css" rel="stylesheet">
<style>
  .error {
  border: solid 2px #F70707;
}
.bien{
  border: solid 2px #04FC10;
}
</style>


	</head>
	<body>

<div class="container">

  <div class="text-center">
    <h1>Competidores Inscritos</h1>
    <p class="lead">por el Club <?php echo utf8_encode($_SESSION["usuario"]); ?></p>
  </div>

  <div class="row conte"> 
  	

<div id="tablaCompetidores">
    

</div>


</div>



  <div class="row conte">
  	<div class="col-xs-5 col-sm-2 col-md-2">
        <div class="circle-border zoom-in">

            <a href="php/listadoCompetidores.php"><img class="img-circle img-responsive" src="images/pdf.png" alt="service 1"></a>
        </div>  		
  	</div>
    <i class="fa fa-file-pdf-o"></i>

  	<p> Agregar más competidores </p>
  </div>


  <div class="text-center">
    <h1>Inscripción Competidor</h1>
    <p class="lead">Ingrese información básica del nadador.</p>
  </div>

  		<div class="conte">
    	<div class="row">
		
		<form id="formComperitor"  method="POST">


<input type="text" id="operacion" name="operacion" hidden>
<input type="text" id="limite" name="limite" hidden >
<input type="text" id="club" name="club" hidden >

            <div class="form-group">
                <label for="identificacion">Identificación </label>
                <input type="text" class="form-control" id="identificacion" name="identificacion" placeholder="Identificación / Ficha Fecna" required>
            </div>
            <div class="form-group">
                <label for="nombres">Nombres</label>
                <input type="text" class="form-control" id="nombres" name="nombres"  required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos</label>
                <input type="text" class="form-control" id="apellidos" name="apellidos" required>
            </div>
            <div class="form-group">
                <label for="fechaNacimiento">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoria</label>
                <select class="form-control" id="categoria" name="categoria" disabled>
                	<option value="6">6 años</option>
                	<option value="7">7 años</option>
                	<option value="8">8 años</option>
                	<option value="9">9 años</option>
                	<option value="10">10 años</option>
                	<option value="11">11 años</option>
                	<option value="12">12 años</option>
                	<option value="13">13 años</option>
                	<option value="14">14 años</option>
                	<option value="15">15 años</option>
                	<option value="16">16 años</option>
                	<option value="17">17 &amp; 18 años</option>
                	<option value="19">19 &amp; OVER</option>
                </select>
            </div>
            <div class="form-group">
                <label for="genero">Género</label>
                <span>Masculino</span>
                <input type="radio" value="1" id="genero1" name="genero" required>
                <span>Femenino</span>
                <input type="radio" value="2" id="genero2" name="genero" required>
            </div>

			<h2 class="section">Pruebas</h2>

			<div id="pruebas">
				


			</div>

  <button type="submit" class="btn btn-default">Registrar</button>
  <div id="respuestains">
      

  </div>
</form>



		</div>
		</div>
  
 
</div><!-- /.container -->
	<!-- script references -->
		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	</body>
	<script>
$(document).ready(function(){
				//alert("numero de jornadas a hacer "+<?php echo $numJornadas."";  ?>);

            var club = <?php echo $_SESSION["id"];?>;
            $("#club").val(club);
ajaxtabla();
			var limite=<?php echo $numJornadas;  ?>;
            $("#limite").val(limite);
			var stringpruebas="";
			for (var i = 1; i <= limite; i++) {
				stringpruebas=stringpruebas+"<div class=\"row\"><div class=\"form-group col-xs-6\" id=\"j"+i+"\">               <h4 class=\"section\">Jornada "+i+"</h4><div id=\"select1J"+i+"\"></div><br><div id=\"select2J"+i+"\"> <select class=\"form-control ocultar\" id=\"prueba2"+i+"\" name=\"prueba2"+i+"\"  onchange=\"select2("+i+")\" ><option value=\"0\">Seleccione una Prueba</option></select></div></div>     <div class=\"form-group col-xs-6 ocultar\" id=\"tiempos"+i+"\"> <h4 class=\"section\">Tiempos "+i+"</h4>  <input type=\"text\" class=\"form-control tiempo\" id=\"tiempo1"+i+"\" name=\"tiempo1"+i+"\" placeholder=\"00.00.00\" maxlength=\"8\">  <br>  <input type=\"text\" class=\"form-control tiempo ocultar\" id=\"tiempo2"+i+"\" name=\"tiempo2"+i+"\" placeholder=\"00.00.00\" maxlength=\"8\">         </div></div>";
			};


			for (var a = 1; a <= limite; a++) {
				ajaxss(a);
			}


			$("#pruebas").html(stringpruebas);


			$("#fechaNacimiento").change(function(){
			    		categorioByEdad($("#fechaNacimiento").val());

  
				});

            $("#identificacion").change(function(){

                    $.ajax({
                      url: "php/CRUD.php?ideCompetidor="+$("#identificacion").val()+"&opera=competidor",
                      context: document.body
                    }).done(function(data) {
                      obj = JSON.parse(data);

                      if(obj.competidor[0].canti==1){
                        $("#operacion").val("updateCompetidor");
                          $("#nombres").val(obj.competidor[0].nombres);
                          $("#apellidos").val(obj.competidor[0].apellidos);
                          $("#fechaNacimiento").val(obj.competidor[0].fecha_nacimineto);
                          categorioByEdad($("#fechaNacimiento").val());
                          if(obj.competidor[0].genero=="m"){
                            $("#genero1").attr('checked', 'checked');
                          }else{
                            $("#genero2").attr('checked', 'checked');
                          }
                      }else{
                            $("#operacion").val("insertCompetidor");
                      }
console.log( $("#operacion").val());
                    });

            });

                var form1 = $('#formComperitor');
                form1.submit(function (event) {

                  var bandera = true;

                      event.preventDefault();
                     $(".tiempo").each(function(indice,value ){
                          if($(value).val()!=""){
                            
                            if(/((\d\d)\.){2}(\d\d){1}/g.test($(value).val())){

                            }else{
                                bandera=false;
                            }
                          }
                      });
                  if(bandera){
                        $.ajax({
                            type: "POST",
                            url: "php/CRUD.php",
                            data: form1.serialize()+"& categoria="+$("#categoria").val(),
                            success: function (data) {
                                if(data=="exito"){
                                    $('#respuestains').text(" El registro fue Exitoso. si desea registrar otro competidor llene nuevamente el formulario"); 
                                    $( "body" ).scrollTop( 150 );
                                    $("#identificacion").val("");
                                    $("#nombres").val("");
                                    $("#apellidos").val("");
                                    $("#fechaNacimiento").val("");
                                    ajaxtabla();

                                    for (var i = 1; i <= limite; i++) {

                                        $("#tiempo1"+i).val("");
                                        $("#tiempo2"+i).val("");
                                        $("#prueba"+i).val(0);
                                        select1(i);
                                    }
                                      ajaxtabla();
                                      
                                }else if(data=="error interno"){
                                    $('#respuestains').text(" Error interno intentelo nuevamente ");
                                    
                                }else {
                                    $('#respuestains').text(data);
                                }

                            }
                        });
                  }else{
                      alert("Corregir los ERRORES para poder continuar");
                  }

                        //return false;
                });


});


$(".row").on("change",".tiempo", function(){

 //var expreg="((\d\d)\.){2}(\d\d)";

	if(/((\d\d)\.){2}(\d\d){1}/g.test($(this).val())){
		//alert("correcto");
    $(this).removeClass("error");
    $(this).addClass("bien");
	}else{

		alert("valor incorrecto solo se permite una expresion así 00.00.00");
    $(this).removeClass("bien");
		$(this).addClass("error");
	}
	
});



function categorioByEdad(FechaNacimiento){
        var birthday = new Date(FechaNacimiento);
        var today = new Date();
        var years = today.getFullYear() - birthday.getFullYear();

        birthday.setFullYear(today.getFullYear());

        if (today < birthday)
        {
            years--;
        }

        if(years <6){
            alert("No se permiten menores de 6 años");
        }else if(years >= 6 && years < 17){
            $("#categoria").val(years);
        }else if(years==17||years==18){
            $("#categoria").val("17");
        }else{
            $("#categoria").val("19");
        }  

}

function ajaxss(a){
			$.ajax({
			  url: "php/pruebas.php?valor="+a,
			  context: document.body
			}).done(function(data) {
			  $( "#select1J"+a ).html( data );
			});

}


function ajaxtabla(){
            $.ajax({
              url: "php/CRUD.php?club="+$("#club").val()+"&opera=tablaCompetidor",
              context: document.body
            }).done(function(data) {
              $( "#tablaCompetidores").html( data );
            });

}

function select1(num){
//alert("el valor del selec es"+$("#Categoria"+num).val());

	if($("#prueba"+num).val()!=0){
		$( "#prueba2"+num ).removeClass( "ocultar" ).addClass( "mostrar" );
		$( "#tiempos"+num ).removeClass( "ocultar" ).addClass( "mostrar" );
		$("#prueba2"+num).empty();
		$("#prueba"+num).find('option').clone().appendTo("#prueba2"+num );
		$("#prueba2"+num+" option[value="+$("#prueba"+num).val()+"]").remove();
	}else{
		$("#prueba2"+num ).removeClass( "mostrar" ).addClass( "ocultar" );
		$("#tiempos"+num ).removeClass( "mostrar" ).addClass( "ocultar" );
		$("#prueba2"+num).empty();
	}
}

function select2(num){
//alert("el valor del selec es"+$("#Categoria"+num).val());

	if($("#prueba2"+num).val()!=0){
		$( "#tiempo2"+num ).removeClass( "ocultar" ).addClass( "mostrar" );
	}else{
		$("#tiempo2"+num ).removeClass( "mostrar" ).addClass( "ocultar" );

	}
}



</script>

</html>