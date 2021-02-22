<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA (VISUALIZAR)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">           
            <h1>Datos registro</h1>            

            <div class="tabla">
                <!-- Datos último registro actualizado -->
                
                <?php

                    // Incluimos las clases necesarias para manejar la BBDD y sus tablas.
                    include '../models/dbNBA.php';
                    include '../models/dbTablesNBA.php'; 
                    
                    // Incluimos un fichero auxiliar que contiene controladores que ayudan a ahorrar código.
                    include '../controllers/auxiliares.php';

                    // Incluimos un fichero auxiliar que contiene funciones que ayudan a mostrar las vistas.
                    include './vistas.php';

                    // Clave para despues montar los enlaces de actualizar y borrar.
                    $clave = "";
              
                    // Controlamos si se han enviado los datos correctamente antes de mostrar.
                 
                    if (isset($_GET) && count($_GET) === 1) {
                        
                        if($_GET['nombre'] != '')  {
                            
                            // Comprobamos si ya existe el registro.
                            $encontrado = yaExiste($_GET['nombre']);
                                   
                            if ($encontrado === -1) {
                                //ERROR DE CONEXION
                                echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');    
                            } else {                                
                                // CONEXIÓN CORRECTA -> MOSTRAMOS RESULTADO.
                                if ($encontrado != false) {                                                                             
                                    mostrarReg($encontrado[0]);
                                    $clave = $encontrado[0]['Nombre'];                               
                                } else {
                                    echo ('<p class="warning">ERROR -> Error al mostrar (No encontrado)</p>');
                                };
                            };                                                       
                            
                        } else {
                            echo ('<p>No hay datos para mostrar</p>');
                        };
                    
                    } else {
                        echo ('<p>No ha enviado ninguna clave de registro para mostrar</p>');
                    };                    
                ?>
                
            </div>

            <div class="links">
                <?php
                    // Si hemos encontrado el registro mostramos los botones de actualizar y borrar.
                    if ($clave != "") {
                        echo('<a href="./actualizar.php?nombre=' . $clave . '" class="btn">Actualizar Registro</a>');
                        echo('<a href="./borrar.php?nombre=' . $clave . '" class="btn red">Borrar Registro</a>');
                    };

                    echo('<a href="./listaequipos.php" class="btn grey">Listado Equipos</a>');
                ?>
            </div>            
        </div>
        
    </div>
</body>

</html>