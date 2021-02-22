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
    <title>NBA (SELECT)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">
            <img src="../../img/basket.jpeg" class="logo" alt="Baloncesto">
            <h1>NBA (Partidos - Filtro Select)</h1>            

            <div class="formulario">
                <!-- Formulario filtro Partidos -->
                <form action="./filtrado.php" method="POST">
                    
                    <label for="equipo_local">Equipo Local</label>
                    <br>                    
                    
                    <!-- Comienza código PHP -->
                    <?php                          
                        $result = llenarSelect('equipos', 'Nombre'); 
                        if ($result === -1) {
                            //ERROR DE CONEXION
                            echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');
                        } else {
                            if ($result != false) {
                                mostrarSelect($result, 'equipo_local', 'Por_defecto');
                            } else {
                                echo ('<p>No se han encontrado resultados para cargar las opciones</p>');
                            };
                        };                         
                    ?>          
                    <!-- Finaliza código PHP -->
                                        
                    <br>
                    <label for="equipo_visitante">Equipo Visitante</label>
                    <br>
                
                    <!-- Comienza código PHP -->
                    <?php
                        $result = llenarSelect('equipos', 'Nombre'); 
                        if ($result === -1) {
                            //ERROR DE CONEXION
                            echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');
                        } else {
                            if ($result != false) {
                                mostrarSelect($result, 'equipo_visitante', 'Por_defecto');
                            } else {
                                echo ('<p>No se han encontrado resultados para cargar las opciones</p>');
                            };
                        };                                                       
                    ?>          
                    <!-- Finaliza código PHP -->           
                    
                    <br>
                    <label for="temporada">Temporada</label>
                    <br>
                   
                    <!-- Comienza código PHP -->
                    <?php
                        $result = llenarSelect('partidos', 'temporada'); 
                        if ($result === -1) {
                            //ERROR DE CONEXION
                            echo ('<p class="warning">ERROR -> No se ha podido conectar con MySQL</p>');
                        } else {
                            if ($result != false) {
                                mostrarSelect($result, 'temporada', 'Por_defecto');
                            } else {
                                echo ('<p>No se han encontrado resultados para cargar las opciones</p>');
                            };
                        };
                    ?>          
                    <!-- Finaliza código PHP -->

                    <br>
                    <input type="submit" class="btn" value="FILTRAR">
                </form>
            </div>
            
            <div class="links">
                <a href="./index.php" class="btn">Ver Original</a>
                <a href="./index2.php" class="btn">Ampliacion 1</a>
            </div>

            <div class="links">
                <a href="./listaequipos.php" class="btn grey">LISTA EQUIPOS</a>   
            </div>
            
        </div>

    </div>
</body>

</html>