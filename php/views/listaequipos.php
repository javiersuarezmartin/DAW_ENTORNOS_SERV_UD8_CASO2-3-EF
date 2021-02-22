<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA (Lista Equipos)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>
<body>
    <div class="container">
        <h1>NBA - Lista Equipos</h1>
        <div class="links">        
            <a href="./index.php" class="btn grey">Volver</a>
            <a href="./insertar.php" class="btn">Insertar</a>        
        </div>        
        
        <!-- Comienza código PHP -->
        <?php
            // Incluimos las clases necesarias para manejar la BBDD y sus tablas.
            include '../models/dbNBA.php';
            include '../models/dbTablesNBA.php'; 
            
            // Incluimos un fichero auxiliar que contiene controladores que ayudan a ahorrar código.
            include '../controllers/auxiliares.php';

            // Incluimos un fichero auxiliar que contiene funciones que ayudan a mostrar las vistas.
            include './vistas.php';
            
            // Comprobamos si se han establecido los filtros correctamente y filtramos el resultado.
            $a = [];
            $result = filtrar('equipos', $a);
            
            if ($result === -1) {
                //ERROR DE CONEXION
                echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');    
            } else {
                // CONEXIÓN CORRECTA -> MOSTRAMOS RESULTADO.
                if ($result != false) {
                    mostrar_todos_equipos($result);                   
                } else {
                    echo ('<p>No se han encontrado resultados con los filtros seleccionados</p>');
                };
            }; 
           
        ?>          
        <!-- Finaliza código PHP -->     
        
    </div>
</body>
</html>