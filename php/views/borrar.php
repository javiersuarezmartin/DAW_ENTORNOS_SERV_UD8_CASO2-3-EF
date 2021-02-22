<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA (BORRADO)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">            
            <h1>Consulta de borrado</h1>            

            <div class="tabla">
                               
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

                    // Controlamos si se han enviado los datos correctamente.
                    if (isset($_GET) && count($_GET) === 1) {
                        
                        if($_GET['nombre'] != '')  {
                            
                            // Comprobamos si existe el registro.
                            $encontrado = yaExiste($_GET['nombre']);
                            
                            if ($encontrado) {
                                echo ('<p class="question">¡CUIDADO! -> ¿Est&aacute; seguro de borrar este registro?</p>');
                                mostrarReg($encontrado[0]);
                                $clave = $encontrado[0]['Nombre'];
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
                <?php
                    // Si hemos encontrado el registro mostramos el boton de borrar.
                    if ($clave != "") {                        
                        echo('<a href="./borrarDB.php?nombre=' . $clave . '" class="btn red">SI, borrar</a>');
                    };

                    echo('<a href="./listaequipos.php" class="btn grey">NO, volver</a>');
                ?>
            </div>

        </div>
        
    </div>
</body>

</html>