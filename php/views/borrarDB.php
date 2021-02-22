<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA (BORRADO CONFIRMADO)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">            
            <h1>Borrado OK</h1>            

            <div class="tabla">
                               
                <?php
                    // Incluimos las clases necesarias para manejar la BBDD y sus tablas.
                    include '../models/dbNBA.php';
                    include '../models/dbTablesNBA.php'; 
                    
                    // Incluimos un fichero auxiliar que contiene controladores que ayudan a ahorrar código.
                    include '../controllers/auxiliares.php';

                    // Incluimos un fichero auxiliar que contiene funciones que ayudan a mostrar las vistas.
                    include './vistas.php';
                    
                    // Clave para despues llamar a borrar.
                    $clave = ""; 

                    // Controlamos si se han enviado los datos correctamente.
                    if (isset($_GET) && count($_GET) === 1) {
                        
                        if($_GET['nombre'] != '')  {
                            
                            // Comprobamos si existe el registro.
                            $encontrado = yaExiste($_GET['nombre']);
                            
                            if ($encontrado) {
                                                                
                                $clave = $encontrado[0]['Nombre'];
                                $result = borrar($clave);
                                
                                if ($result === -1) {
                                    //ERROR DE CONEXION
                                    echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');    
                                } else {
                                    
                                    // CONEXIÓN CORRECTA -> MOSTRAMOS RESULTADO.
                                    if ($result != false) {
                                        echo ('<p class="correct">El registro se ha borrado correctamente</p>');
                                    } else {
                                        echo ('<p class="warning">ERROR -> Error al borrar</p>');
                                    };
                                };
                            } else {
                                echo('No se ha encontrado el registro que desea borrar');
                            };                           
                            
                        } else {
                            echo ('<p>No ha enviado la clave del elemento a borrar</p>');
                        };
                      
                    } else {
                        echo ('<p>No ha enviado los datos para eliminar</p>');
                    };                    
                ?>
                
            </div>

            <div class="links">
              
                <a href="./listaequipos.php" class="btn grey">Listado Equipos</a>
                
            </div>

        </div>
        
    </div>
</body>

</html>


