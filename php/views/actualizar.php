<?php
    // Incluimos los archivos externos que contienen los objetos que manejan las tablas de la BBDD.
    include '../models/dbNBA.php';
    include '../models/dbTablesNBA.php';

    // Incluimos un fichero auxiliar que contine controladores que ayudan a ahorrar código.
    include '../controllers/auxiliares.php';

    // Incluimos un fichero auxiliar que contiene funciones que ayudan a mostrar las vistas.
    include './vistas.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA (ACTUALIZAR)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">          
            <h1>NBA (ACTUALIZAR)</h1>            
            <?php               

                // Registro buscado.
                $reg_actualizar = null;
            
                // Controlamos si se han enviado los datos correctamente antes de mostrar.
                
                if (isset($_GET) && count($_GET) === 1) {
                    
                    if($_GET['nombre'] != '')  {
                        
                        // Comprobamos si ya existe el registro.
                        $encontrado = yaExiste($_GET['nombre']);                        
                        
                        if ($encontrado === -1) {
                            //ERROR DE CONEXION
                            echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');
                        } else {
                            if ($encontrado) {
                                // ENCONTRADO REALMENTE                                
                                $reg_actualizar = $encontrado[0];
                            } else {
                                echo ('<p>No hemos encontrado el registro solicitado.</p>');
                            };
                        };                 
                        
                    } else {
                        echo ('<p>No ha enviado la clave del elemento a actualizar</p>');
                    };
                
                } else {
                    echo ('<p>No ha enviado los datos para actualizar</p>');
                };
            ?>
            
            <div class="formulario">
                <!-- Formulario filtro Partidos -->
                <form action="./actualizarDB.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <?php
                        if ($reg_actualizar != null) {
                            echo('<input type="text" name="nombre" id="nombre" value="' . $reg_actualizar['Nombre'] . '" class="desactivado" readonly>');
                        } else {
                            echo('<p class="warning">No se han obtenido resultados para actualizar</p>');
                        };                        
                    ?>

                    <label for="ciudad">Ciudad</label>
                    <?php
                        if ($reg_actualizar != null) {
                            echo('<input type="text" name="ciudad" id="ciudad" value="' . $reg_actualizar['Ciudad'] . '">');
                        } else {
                            echo('<p class="warning">No se han obtenido resultados para actualizar</p>');
                        };  
                    ?>

                    <label for="conferencia">Conferencia</label>
                    <?php
                        if ($reg_actualizar != null) {

                            $result = llenarSelect('equipos', 'Conferencia'); 
                            if ($result === -1) {
                                //ERROR DE CONEXION
                                echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');
                            } else {
                                if ($result != false) {
                                    mostrarSelect($result, 'conferencia', $reg_actualizar['Conferencia']);
                                } else {
                                    echo ('<p>No se han encontrado resultados para cargar las opciones</p>');
                                };
                            };

                            //echo('<input type="text" name="conferencia" id="conferencia" value="' . $reg_actualizar['Conferencia'] . '">');
                        } else {
                            echo('<p class="warning">No se han obtenido resultados para actualizar</p>');
                        };  
                    ?>

                    <label for="division">Divisi&oacute;n</label>
                    <!-- Comienza código PHP -->
                    <?php
                        if ($reg_actualizar != null) {
                            
                            $result = llenarSelect('equipos', 'Division'); 
                            if ($result === -1) {
                                //ERROR DE CONEXION
                                echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');
                            } else {
                                if ($result != false) {
                                    mostrarSelect($result, 'division', $reg_actualizar['Division']);
                                } else {
                                    echo ('<p>No se han encontrado resultados para cargar las opciones</p>');
                                };
                            };

                            //echo('<input type="text" name="division" id="division" value="' .  $reg_actualizar['Division'] . '">'); 
                        } else {
                            echo('<p class="warning">No se han obtenido resultados para actualizar</p>');
                        };
                    ?>
                    <!-- Finaliza código PHP -->                   

                    <input type="submit" class="btn" value="ACTUALIZAR">
                </form>

                <div class="links">
                    <a href="./listaequipos.php" class="btn grey">Listado Equipos</a>                
                </div>
            </div>
            
        </div>
        
    </div>
</body>

</html>