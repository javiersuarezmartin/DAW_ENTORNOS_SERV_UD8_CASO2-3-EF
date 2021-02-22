<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA (INSERTADO)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">            
            <h1>&Uacute;ltimo registro insertado</h1>            

            <div class="tabla">
                <!-- Datos último registro insertado -->
                
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

                    // Controlamos si se han enviado los datos correctamente antes de insertar.
                    if (isset($_POST) && count($_POST) === 4) {
                        
                        if($_POST['nombre'] != '' && $_POST['ciudad'] != '' && $_POST['conferencia'] != 'Por_defecto' && $_POST['division'] != 'Por_defecto')  {
                            
                            // Comprobamos si ya existe el registro.
                            $encontrado = yaExiste($_POST['nombre']);
                            
                            if ($encontrado) {
                                echo ('<p class="warning">ERROR -> El registro ya existe</p>');
                                mostrarReg($encontrado[0]);
                                $clave = $encontrado[0]['Nombre'];
                            } else {
                                $result = insertar($_POST);
      
                                if ($result === -1) {
                                    //ERROR DE CONEXION
                                    echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');    
                                } else {
                                   
                                    // CONEXIÓN CORRECTA -> MOSTRAMOS RESULTADO.
                                    if ($result != false) {
                                        echo ('<p class="correct">El registro se ha insertado correctamente</p>');                                       
                                        mostrarReg($result[0]);
                                        $clave = $result[0]['Nombre'];                               
                                    } else {
                                        echo ('<p class="warning">ERROR -> Error al insertar</p>');
                                    };
                                };
                            };                           
                            
                        } else {
                            echo ('<p>No ha enviado los datos correctamente (Faltan datos)</p>');
                        };
                      
                    } else {
                        echo ('<p>No ha enviado los datos para insertar</p>');
                    };                    
                ?>
                
            </div>

            <div class="links">
                <?php
                    // Si hemos encontrado el registro porque ya existia o lo hemos insertado mostramos los botones de actualizar y borrar.
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