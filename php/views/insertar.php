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
    <title>NBA (INSERTAR)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">         
            <h1>NBA (INSERTAR)</h1>            

            <div class="formulario">
                <!-- Formulario filtro Partidos -->
                <form action="./insertarDB.php" method="POST">
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required>
                    
                    <label for="ciudad">Ciudad</label>
                    <input type="text" name="ciudad" id="ciudad" required>
                    
                    <label for="conferencia">Conferencia</label>
                    
                    <!-- Comienza código PHP -->
                    <?php
                        $result = llenarSelect('equipos', 'Conferencia'); 
                        if ($result === -1) {
                            //ERROR DE CONEXION
                            echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');
                        } else {
                            if ($result != false) {
                                mostrarSelect($result, 'conferencia', 'Por_defecto');
                            } else {
                                echo ('<p>No se han encontrado resultados para cargar las opciones</p>');
                            };
                        };
                    ?>          
                    <!-- Finaliza código PHP -->                    

                    <label for="division">Divisi&oacute;n</label>
                    <!-- Comienza código PHP -->
                    <?php
                        $result = llenarSelect('equipos', 'Division'); 
                        if ($result === -1) {
                            //ERROR DE CONEXION
                            echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');
                        } else {
                            if ($result != false) {
                                mostrarSelect($result, 'division', 'Por_defecto');
                            } else {
                                echo ('<p>No se han encontrado resultados para cargar las opciones</p>');
                            };
                        };
                    ?>          
                    <!-- Finaliza código PHP -->                   
                    
                    <input type="submit" class="btn" value="A&Ntilde;ADIR">
                </form>

                <div class="links">
                    <a href="./listaequipos.php" class="btn grey">Listado Equipos</a>                  
                </div>
            </div>
        </div>
        
    </div>
</body>

</html>