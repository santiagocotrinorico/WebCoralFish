<?php
include 'php/connect.php';
session_start();

if ($_SESSION["permiso"] != "Admin")
    exit();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <title>Administrador Coral Fish</title>
    <meta name="generator" content="Bootply"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
    <link href="plugins/autocomplete/jquery.autocomplete.css" rel="stylesheet">
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet">
    <link href="plugins/datatables/dataTables.bootstrap.css" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet">
    <style>
        .margin-bottonx15 {
            margin-bottom: 15px;
        }

        #mostrarExitoResul {
            border: solid 2px #0AFE04;
            margin-bottom: 15px;
            text-align: center;
        }

        .error {
            border: solid 2px #F70707;
        }

        .bien {
            border: solid 2px #04FC10;
        }

        #cerrarsesion {
            float: right;
            top: 0;
            right: 0;
            position: absolute;
        }
    </style>

</head>
<body>
<a id="cerrarsesion" class="btn btn-default" href="php/adminSession.php" role="button">Cerrar Sesión</a>


<div class="container">

    <div class="text-center">
        <h1>Panel Administrador</h1>
    </div>

    <div class="row conte">

        <div class="panel panel-warning">
            <div class="panel-heading text-center">
                <h3>Crear un CLUB</h3>
            </div>
            <form id="formClub" class="form-horizontal" method="POST">
                <div class="panel-body">
                    <input type="text" id="operacion" name="operacion" value="crearClub" hidden>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="nombre_club" class="col-sm-3 control-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombre_club" name="nombre_club"
                                           placeholder="Nombre del Club">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="liga" class="col-sm-3 control-label">Liga</label>
                                <div class="col-sm-9">
                                    <!--                           <input type="text" class="form-control" id="liga" name="liga" placeholder="Liga"> -->
                                    <select id="liga" name="liga" required class="form-control">
                                        <option value="1">Amazonas</option>
                                        <option value="2">Antioquia</option>
                                        <option value="3">Arauca</option>
                                        <option value="4">Atlántico</option>
                                        <option value="5">Bogotá</option>
                                        <option value="6">Bolívar</option>
                                        <option value="7">Boyacá</option>
                                        <option value="8">Caldas</option>
                                        <option value="9">Caquetá</option>
                                        <option value="10">Casanare</option>
                                        <option value="11">Cauca</option>
                                        <option value="12">Cesar</option>
                                        <option value="13">Chocó</option>
                                        <option value="14">Córdoba</option>
                                        <option value="15">Cundinamarca</option>
                                        <option value="16">Guainía</option>
                                        <option value="17">Guaviare</option>
                                        <option value="18">Huila</option>
                                        <option value="19">La Guajira</option>
                                        <option value="20">Magdalena</option>
                                        <option value="21">Meta</option>
                                        <option value="22">Nariño</option>
                                        <option value="23">Norte de Santander</option>
                                        <option value="24">Putumayo</option>
                                        <option value="25">Quindío</option>
                                        <option value="26">Risaralda</option>
                                        <option value="27">San Andrés y Providencia</option>
                                        <option value="28">Santander</option>
                                        <option value="29">Sucre</option>
                                        <option value="30">Tolima</option>
                                        <option value="31">Valle</option>
                                        <option value="32">Vaupés</option>
                                        <option value="33">Vichada</option>
                                    </select>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="abreviatura" class="col-sm-3 control-label">Abreviatura</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="abreviatura" name="abreviatura"
                                           placeholder="Abreviatura">
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="usuario" class="col-sm-3 control-label">Usuario</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="usuario" name="usuario"
                                           placeholder="Usuario">
                                </div>
                            </div>

                        </div>

                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="password" class="col-sm-3 control-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="password" name="password"
                                           placeholder="Password">
                                </div>
                            </div>


                        </div>
                    </div>
                </div>


                <div class="panel-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Registrar Club</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Registrar un Usuario</h3>
            </div>
            <form id="formUsuario" class="form-horizontal" method="POST">
                <div class="panel-body">
                    <!--  inici panel body -->
                    <input type="text" id="operacion" name="operacion" value="crearUsuario" hidden>

                    <div class="row">

                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="identificacion" class="col-sm-3 control-label">Identificación </label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="identificacion" name="identificacion"
                                           placeholder="Identificación / Ficha Fecna" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="nombres" class="col-sm-3 control-label">Nombres</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombres" name="nombres" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="email" class="col-sm-3 control-label">e-mail</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="email" name="email"
                                           placeholder="ejemplo@dominio.com">
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label for="telefono" class="col-sm-3 control-label">Teléfono</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="telefono" name="telefono"
                                           placeholder="Número telefónico o celular">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="apellidos" class="col-sm-3 control-label">Apellidos</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="fecha_nacimiento" class="col-sm-3 control-label">Fecha de Nacimiento</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="fecha_nacimiento"
                                           name="fecha_nacimineto" required>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-sm-offset-1 col-sm-11">
                            <div class="form-group">
                                <label for="genero">Género</label>
                                <span>Masculino</span>
                                <input type="radio" value="1" id="genero1" name="genero" required>
                                <span>Femenino</span>
                                <input type="radio" value="2" id="genero2" name="genero" required>
                            </div>
                        </div>
                    </div>
                    <h3 class="section">Datos de Contacto</h3>
                    <div id="section2">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="nombre_contacto" class="col-sm-3 control-label">Nombre</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="nombre_contacto" name="nombre_contacto"
                                           placeholder="Nombre completo de un familiar o acudiente">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="telefono_contacto" class="col-sm-3 control-label">Teléfono</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="telefono_contacto"
                                           name="telefono_contacto" placeholder="Número telefónico de contacto">
                                </div>
                            </div>
                        </div>
                    </div>

                    <!--  fin panel body -->
                </div>
                <div class="panel-footer">
                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                            <button type="submit" class="btn btn-default">Registrar un Usuario</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Pago Cuota Usuario <span id="tituloUsuario"></span></h3>
            </div>

            <div class="panel-body">
                <!--  inici panel body -->

                <input type='text' id='operacion' name='operacion' value='pagoUsuario' hidden>
                <div class="form-group">
                    <label for="idUsuario" class="col-sm-3 control-label">Usuario </label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="autoCompetidor" name="idUsuario"
                               placeholder="Identificación o Nombre" required>
                    </div>
                </div>

                <!--            <div class="form-group" >-->
                <!--                <label for="fecha" class="col-sm-3 control-label">Fecha a Pagar</label>-->
                <!--                <div class="col-sm-9">-->
                <!--                    <input type="date" class="form-control" id="fecha" name="fecha" required placeholder='yyyy-mm-dd'>-->
                <!--                </div>-->
                <!--            </div>-->
                <!---->
                <!--            <div class="form-group">-->
                <!--                <label for="valor" class="col-sm-3 control-label">Valos a Pagar </label>-->
                <!--                <div class="col-sm-9">-->
                <!--                    <input type="text" class="form-control" id="valor" name="valor"  placeholder="Numeros sin . ni ," required>-->
                <!--                </div>-->
                <!--            </div>-->
                <!---->
                <!--                <div class="form-group">-->
                <!--                    <div class="col-sm-offset-2 col-sm-10">-->
                <!--                      <button type="submit" class="btn btn-default">Registrar Pago</button>-->
                <!--                    </div>-->
                <!--                  </div>-->


                <!--  fin panel body -->
            </div>
            <div class="panel-footer text-center">

                <a class="btn btn-default" href="php/pdf_pagos.php" role="button">Reporte de pagos</a>

            </div>

        </div>

        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="text-center">Registrar los Resultados de la Competencia</h3>
            </div>

            <div class="panel-body">
                <!--  inici panel body -->
                <div class="row">
                    <div id="selectprueba"></div>
                </div>
                <form id="formResultado" class="form-horizontal" method="POST">

                    <div id="resultadoPrueba">


                    </div>

                </form>
                <!--  fin panel body -->
            </div>
        </div>


        <div class="panel panel-danger">
            <div class="panel-heading">
                <h3 class="text-center">Iniciar un Nuevo Campeonato</h3>
            </div>

            <div class="panel-body">
                <!--  inici panel body -->
                <div class="row">
                    <div class="col-xs-12 text-center" style="padding: 20px;">
                        <a class='btn btn-info href='#' onclick="window.open('configuracion.pdf')"><i class='fa fa-file-pdf-o' aria-hidden='true'></i>  Instrucciones de Configuracion</a>
                        <p style="margin-top: 20px">
                            Al iniciar un nuevo campeonato TODOS los datos almacenados sobre el campeonato actual se borrarán,
                        </p>
                        <button id="contiIniciarCampeonato" class="btn btn-warning" type="submit" style="margin-top: 20px;"> <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                             Desea continuar?</button>
                    </div>
                </div>

                <div class="row">
                    <div id="conteContinuar" class="col-xs-12" style="display: none;">


                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="col-sm-6 text-center">
                                    <button id="iniciarCampeonato" class="btn btn-danger" type="submit">Iniciar Nuevo Campeonato</button>
                                </div>
                                <div class="col-sm-6" id="conSelecCarriles">



                                </div>

                                <div class="col-xs-12 text-center" id="notifiIniciarCamp" style="margin-top: 20px;">

                                </div>
                            </div>
                        </div>


                    </div>

                </div>
                <!--  fin panel body -->
            </div>
        </div>

    </div>


</div><!-- /.container -->

<div id="modalPago" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title text-center">Historial de Pagos de <b id="hNombre"></b></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <table id="histoPagos" class="table table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>Fecha Inicio</th>
                                <th>Fecha Fin</th>
                                <th>Valor</th>
                            </tr>
                            </thead>
                            <tbody id="tbodyPagos">

                            <!--                            <tr><td>2017-05-19</td><td>2017-05-29</td><td>5000</td></tr><tr><td>2017-04-30</td><td>2017-05-10</td><td>2000</td></tr>-->

                            </tbody>
                        </table>
                    </div>

                    <div class="col-xs-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">Registrar un PAGO</div>
                            <div class="panel-body">

                                <form id="formPagoUsuario" class="form-horizontal" method="POST">
                                    <input type='text' id='operacion' name='operacion' value='pagoUsuario' hidden>
                                    <input type='text' id='idUsuario' name='idUsuario' value='' hidden>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Fecha Inicio </label>
                                            <input type="text" class="form-control" id="fecha_inicio"
                                                   name="fecha_inicio" onkeypress="return false;"
                                                   onpaste="return false;" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Fecha Fin </label>
                                            <input type="text" class="form-control" id="fecha" name="fecha"
                                                   onkeypress="return false;" onpaste="return false;" required>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label>Valor </label>
                                            <input type="text" class="form-control mask-money" id="valor" name="valor"
                                                   required>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 text-center">
                                        <button id="btnRegisPago" type="submit" class="btn btn-primary">Registrar Pago
                                        </button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- script references -->
<script src="js/jquery-1.8.2.min.js"></script>
<!--        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>-->
<script src="js/bootstrap.min.js"></script>
<script src="plugins/autocomplete/jquery.autocomplete.min.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/mask/jquery.mask.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="js/inicio.js"></script>
</body>
<script>

    var id_jornada_prueba = "";
    var table;
    var idCompetidor;
    $(function () {

        $('.mask-money').mask('000.000.000.000.000', {reverse: true});

        $('#autoCompetidor').autocomplete({
            serviceUrl: 'php/autoCompliCompeti.php',
            lookupFilter: function (suggestion, originalQuery, queryLowerCase) {
                var re = new RegExp('\\b' + $.Autocomplete.utils.escapeRegExChars(queryLowerCase), 'gi');
                return re.test(suggestion.value);
            },
            onSelect: function (suggestion) {
                $("#hNombre").html(suggestion.value);
                $("#idUsuario").val(suggestion.data);
                idCompetidor = suggestion.data;
                llenarHistorial(suggestion.data);
                $("#btnRegisPago").attr("disabled", false);
                $("#modalPago").modal("show");
                //console.log('You selected: ' + suggestion.value + ', ' + suggestion.data);

//                    $("#buscarProducto").attr("disabled",false);
            },
            onHint: function (hint) {

            },
            onInvalidateSelection: function () {

            }
        });

        $.fn.datepicker.dates['es'] = {
            days: ["Domingo", "Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sabado"],
            daysShort: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"],
            daysMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sa"],
            months: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"],
            monthsShort: ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            today: "Hoy",
            clear: "Clear",
            format: "yyyy-mm-dd",
            titleFormat: "MM yyyy", /* Leverages same syntax as 'format' */
            weekStart: 0
        };
        $('#fecha_nacimiento').datepicker({
            autoclose: true,
            language: 'es',
            endDate: '0d',
            todayHighlight: true
        });
        $('#fecha_inicio').datepicker({
            autoclose: true,
            language: 'es',
            todayHighlight: true
        });
        $('#fecha').datepicker({
            autoclose: true,
            language: 'es',
            todayHighlight: true
        });


        var formClub = $("#formClub");
        formClub.submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "php/adminCRUD.php",
                data: formClub.serialize(),
                success: function (data) {
                    if (data == "exito") {
                        alert("Club Registrado Exitosamente");
                        document.getElementById("formClub").reset();

                    } else if (data == "error interno") {


                    } else {

                    }

                }
            });
        });

        var formusuario = $("#formUsuario");
        formusuario.submit(function (event) {
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "php/adminCRUD.php",
                data: formusuario.serialize(),
                success: function (data) {
                    if (data == "exito") {
                        alert("Usuario Registrado Exitosamente");
                        document.getElementById("formUsuario").reset();


                    } else if (data == "error interno") {


                    } else {

                    }

                }
            });
        });

        var formPagoUsuario = $("#formPagoUsuario");
        formPagoUsuario.submit(function (event) {
            $("#valor").val(quitarMascara($("#valor").val()));
            event.preventDefault();
            $.ajax({
                type: "POST",
                url: "php/adminCRUD.php",
                data: formPagoUsuario.serialize(),
                success: function (data) {
                    document.getElementById("formPagoUsuario").reset();
                    $("#btnRegisPago").attr("disabled", true);
                    llenarHistorial(idCompetidor);
                }
            });
        });

        var formresultado = $("#formResultado");
        formresultado.submit(function (event) {
            var bandera = true;
            event.preventDefault();

            $(".resultado").each(function (indice, value) {
                if ($(value).val() != "") {

                    if (/((\d\d)\.){2}(\d\d){1}/g.test($(value).val())) {

                    } else {
                        bandera = false;
                    }
                }
            });
            if (bandera) {

                $.ajax({
                    type: "POST",
                    url: "php/adminCRUD.php",
                    data: formresultado.serialize() + "&id_jornada_prueba=" + id_jornada_prueba,
                    success: function (data) {

                        $("#mostrarExitoResul").html(data);
                        $("#mostrarExitoResul").removeClass("hidden");
                        $("#mostrarExitoResul").addClass("show");

                    }
                });

            } else {
                alert("Corregir los ERRORES para poder continuar");
            }
        });

        $("#idUsuario").change(function () {
            $.ajax({
                url: "php/CRUD.php?ideCompetidor=" + $("#idUsuario").val() + "&opera=competidor",
                context: document.body
            }).done(function (data) {
                obj = JSON.parse(data);

                if (obj.competidor[0].canti == 1) {
                    $("#tituloUsuario").text(obj.competidor[0].nombres + " " + obj.competidor[0].apellidos);

                } else {
                    //$("#operacion").val("insertCompetidor");
                }
                console.log($("#operacion").val());
            });
        });


        $("#contiIniciarCampeonato").click(function () {
            $("#conteContinuar").show("fast");
            $("#contiIniciarCampeonato").hide( 1000 );
        });


        $("#iniciarCampeonato").click(function () {
            iniciarCampeonato();
        });

        iniciarTablaPagos();
        getSelectPruebasAjax();

    });


    $("#conSelecCarriles").on("change","#numCarriles",function () {
        cambiarNumeroCarriles($(this).val());
    });

    $("#resultadoPrueba").on("change", ".resultado", function () {

        //var expreg="((\d\d)\.){2}(\d\d)";

        if (/((\d\d)\.){2}(\d\d){1}/g.test($(this).val())) {
            //alert("correcto");
            $(this).removeClass("error");
            $(this).addClass("bien");
        } else {

            alert("valor incorrecto solo se permite una expresion así 00.00.00");
            $(this).removeClass("bien");
            $(this).addClass("error");
        }

    });
    $("#selectprueba").on("change", "#prueba", function () {


        var prueba = $("#prueba option:selected").data("prueba");
        var genero = $("#prueba option:selected").data("genero");
        var categoria = $("#prueba option:selected").data("categoria");
        id_jornada_prueba = $("#prueba option:selected").data("id");
        getPruebasAjax(prueba, genero, categoria);
//console.log("la prueba es : "+prueba+" genero : "+genero +" categoria : "+categoria);


    });

    $('#modalPago').on('hidden.bs.modal', function (e) {
        $("#autoCompetidor").val("");
    });

    function getSelectPruebasAjax() {
        $.ajax({
            type: "POST",
            url: "php/adminCRUD.php",
            data: {"operacion": "getSelectPruebas"},
            success: function (data) {
                $("#selectprueba").html(data);
            }
        });
    }
    function getPruebasAjax(prueba, genero, categoria) {
        $.ajax({
            type: "POST",
            url: "php/adminCRUD.php",
            data: {
                "operacion": "getPruebas",
                "prueba": prueba,
                "genero": genero,
                "categoria": categoria,
                "id_jornada_prueba": id_jornada_prueba
            },
            success: function (data) {
                $("#resultadoPrueba").html(data);
            }
        });
    }

    function llenarHistorial(identificacion) {

       // console.log(identificacion);
        $.ajax({
            type: "POST",
            url: "php/adminCRUD.php",
            data: {"operacion": "getHistorial", "identificacion": identificacion},
            success: function (data) {
                table.destroy();
                $("#tbodyPagos").html(data);
                iniciarTablaPagos();


            }
        });
    }

    function iniciarTablaPagos() {
        table = $('#histoPagos').DataTable({
            "language": {
                "lengthMenu": "Mostrar  _MENU_ Pagos por Página",
                "zeroRecords": "Nothing found - sorry",
                "info": "Mostrando page _PAGE_ de _PAGES_",
                "infoEmpty": "No records available",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
//        "paging": true,
//        "lengthChange": false,
//        "searching": false,
//        "ordering": true,
//        "info": true,
            "pageLength": 3,
            "lengthMenu": [3, 5, 7, 10],
            "autoWidth": false
        });

    }

    function cambiarNumeroCarriles(num_carriles) {
        $.ajax({
            type: "POST",
            url: "php/adminCRUD.php",
            data: {"operacion": "cambiarNumCarriles","num_carriles":num_carriles},
            success: function (data) {
                var html2="<div class='alert alert-success alert-dismissable'>" +
                    "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
                    "<strong>Perfecto!</strong> El numero de carriles fue cambiado exitosamente." +
                    "</div>";
                $("#notifiIniciarCamp").html(html2);
            }
        });
    }

    function iniciarCampeonato() {
        $.ajax({
            type: "POST",
            url: "php/adminCRUD.php",
            data: {"operacion": "iniciarCampeonato"},
            success: function (data) {

                if(data=="exito"){
                    var html = "<label for=''>Numero de carriles</label>" +
                        "<select class='form-control' id='numCarriles'>" +
                        "<option value='6' selected>6</option>" +
                        "<option value='8'>8</option>" +
                        "</select>";

                    $("#conSelecCarriles").html(html);

                    var html2="<div class='alert alert-success alert-dismissable'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
                        "<strong>Perfecto!</strong> Se borraron los datos del campeonato actual satisfactoriamente, ya se puede iniciar con la configuracion del nuevo Campeonato." +
                        "</div>";
                    $("#notifiIniciarCamp").html(html2);
                }else{
                    var html2="<div class='alert alert-danger alert-dismissable'>" +
                        "<a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>" +
                        "<strong>Ups!</strong> Algo salio mal no fue posible borrar todos los datos, posiblemete hacer esta tarea manualmente." +
                        "</div>";
                    $("#notifiIniciarCamp").html(html2);
                }


            }
        });
    }


</script>
</html>