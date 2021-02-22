<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA (Patridos filtrados)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>
<body>
    <div class="container">
        <h1>NBA - Partidos filtrados</h1>
        <a href="./index.php" class="btn">Volver</a>
        
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
            if(comprobar_filtros()){
                $result = filtrar('partidos', $_POST);
                
                if ($result === -1) {
                    //ERROR DE CONEXION
                    echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');    
                } else {
                    // CONEXIÓN CORRECTA -> MOSTRAMOS RESULTADO.
                    if ($result != false) {
                        mostrar_tabla_resultado($result);                      
                    } else {
                        echo ('<p>No se han encontrado resultados con los filtros seleccionados</p>');
                    };
                };                     

            } else {
                echo('<p>No ha seleccionado correctamente los filtros</p>');
            };
        ?>          
        <!-- Finaliza código PHP -->     
        
    </div>
</body>
</html>