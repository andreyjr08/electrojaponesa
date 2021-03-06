<?php
session_start();

if (!isset($_SESSION["documento"]) || empty($_SESSION["documento"])) {
    header("location: index.php");
    exit;
}

$documento = $_SESSION["documento"];

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="images/logo.png">
    <title>Formulario registro</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/app.css" rel="stylesheet">
    <link href="css/select2/select2.css" rel="stylesheet">
    <link href="css/jquery.SplashScreen.css" rel="stylesheet">

    <script src="js/jquery.min.js"></script>
    <script src="js/select2/select2.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/app.js"></script>
    <script src="js/jqueryFormValidation/jquery.validate.min.js"></script>
    <script src="js/jquery.SplashScreen.js"></script>
</head>
<header>
    <div class="header mx-auto">
        <img src="images/electrojaponesa.png">
    </div>
</header>
<body>
<form method="post" id="formCliente">
    <div class="container card">
        <div class="titutoSeccion">Datos personales</div>
        <div class="separador"></div>
        <div class="row">
            <div class="col-6 mx-auto mt-4">
                <div class="selectipodocumento">
                    <select class="js-example-disabled-results" id="slTipoDocumento" name="slTipoDocumento">
                    </select>
                </div>
            </div>
            <div class="col-6 mx-auto mt-4">
                <div class="disenoInput">
                    <label class="disenoLabel" for="txtDocumento">Documento*</label>
                    <input type="text" id="txtDocumento" name="txtDocumento" data-source="documento" readonly
                           value="<?php echo $documento ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto mt-3">
                <div class="disenoInput">
                    <label class="disenoLabel" for="txtNombre">Nombres*</label>
                    <input type="text" id="txtNombre" name="txtNombre" data-source="nombres"/>
                </div>
            </div>
            <div class="col-6 mx-auto mt-3">
                <div class="disenoInput">
                    <label class="disenoLabel" for="txtApellido">Primer apellido*</label>
                    <input type="text" id="txtApellido" name="txtApellido" data-source="Primer apellido"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto mt-3">
                <div class="disenoInput">
                    <label class="disenoLabel" for="txtApellido2">Segundo apellido</label>
                    <input type="text" id="txtApellido2" name="txtApellido2" data-source="apellido2"/>
                </div>
            </div>
            <div class="col-6 mx-auto mt-3">
                <div class="disenoInput">
                    <label class="disenoLabel" for="txtTelefono">Celular*</label>
                    <input type="text" id="txtTelefono" name="txtTelefono" data-source="celular"/>
                </div>
            </div>
            <div class="col-6 mt-3">
                <div class="disenoInput">
                    <label class="disenoLabel" for="txtCorreo">Correo*</label>
                    <input type="text" id="txtCorreo" name="txtCorreo"/>
                </div>

            </div>

        </div>
    </div>
    <div class="container card">
        <div class="titutoSeccion">Datos de residencia</div>
        <div class="separador"></div>
        <div class="row">
            <div class="col-6 mx-auto mt-3">
                <div class="disenoInput">
                    <label class="disenoLabel" for="txtDireccion1">Direcci&oacute;n*</label>
                    <input type="text" id="txtDireccion1" name="txtDireccion1" data-source="direccion1"/>
                </div>
            </div>
            <div class="col-6 mx-auto mt-3">
                <div class="disenoInput">
                    <label class="disenoLabel" for="txtDireccion2">Direcci&oacute;n adicional</label>
                    <input type="text" id="txtDireccion2" name="txtDireccion2" data-source="direccion2"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mx-auto mt-3">
                <div class="selecdepartamento">
                    <select class="js-example-disabled-results" id="slDepartamento" name="slDepartamento"
                            maxlength="2">
                    </select>
                </div>
            </div>
            <div class="col-6 mx-auto mt-3">
                <div class="selecciudad">
                    <select class="js-example-disabled-results" id="slCiudad" name="slCiudad" maxlength="2">
                    </select>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-6 mt-3">
                <div class="disenoInput">
                    <select class="js-example-disabled-results" id="slBarrio" name="slBarrio" maxlength="2">
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div id="seccionPolitica" class="col-lg-12 text-center justify-content-center mt-2">
            <input type="checkbox" id="txtPolitica" name="txtPolitica"> Acepto* <a id="linkModal" class="linkModal">
                Pol&iacute;tica de
                tratamiento de datos.</a>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 text-center justify-content-center mt-3">
            <button type="button" id="btnSubmit1" class="btnPrincipal">Guardar</button>
        </div>
    </div>
</form>
<div class="mt-auto">
    <footer>
        <div class="fotter ">
            <span id="fecha"></span>
        </div>
    </footer>
</div>
<script>
    let today = new Date();
    let year = today.getFullYear();
    let sbFecha = document.getElementById('fecha');
    sbFecha.innerHTML = "?? Electrojaponesa S.A - " + year;
    var $disabledResults = $(".js-example-disabled-results");
    $disabledResults.select2();
</script>
<div id="splashscreen">
    <img src="images/electrojaponesa.png" alt="" width="240" height="auto" class="img-fluid">
</div>
<div class="modal fade" id="modalCargando" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-body">
            <div class="row">
                <div class="spinner-border text-danger mx-auto " style="width: 3rem; height: 3rem;" role="status"></div>
            </div>
            <div class="row">
                <div class="text-danger fw-bold text-center"><h3>Cargando...</h3></div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalTratamientoDatos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titutoSeccion" id="exampleModalLabel">Politica de tratamiento de datos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="subtituloSeccion modal-body">
                Al registrarse en este formulario, autoriza a Electrojaponesa S.A.
                para enviarle informaci??n solicitada y registrar sus datos,
                que ha suministrado de manera libre y voluntaria en su base de datos,
                para fines comerciales, env??o de estados de cuenta, cobranza,
                transacciones financieras y mercadeo de productos,
                los cuales ser??n tratados de acuerdo a lo dispuesto en la Ley 1581 de 2012
                contentiva de la pol??tica de protecci??n de datos.
                De igual manera, hace constar que puede ejercer los derechos de
                protecci??n de dicha informaci??n ante las entidades de control estatal.
            </div>
            <div class="modal-footer">
                <button type="button" class="btnPrincipal mx-auto" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalExito" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titutoSeccion" id="exampleModalLabel">Registro exitoso</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="subtituloSeccion modal-body">
                La informaci&oacute;n se registr&oacute; exitosamente.
            </div>
            <div class="modal-footer">
                <button type="button" class="btnPrincipal mx-auto" data-bs-dismiss="modal"
                        onclick="window.open('index.php','_self')">Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalError" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title titutoSeccion" id="exampleModalLabel">Error de registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="subtituloSeccion modal-body">
                Ocurri&oacute; un error en el proceso de registro. Valide la informaci&oacute;n e intente de nuevo.
            </div>
            <div class="modal-footer">
                <button type="button" class="btnPrincipal mx-auto" data-bs-dismiss="modal">Aceptar
                </button>
            </div>
        </div>
    </div>
</div>
</body>
</html>