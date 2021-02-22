<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBA (3 FILTROS)</title>
    <link rel="stylesheet" href="../../css/styles.css" type="text/css">
</head>

<body>
    <div class="container">

        <div class="container-body">
            <img src="../../img/basket.jpeg" class="logo" alt="Baloncesto">
            <h1>NBA (Partidos)</h1>            

            <div class="formulario">
                <!-- Formulario filtro Partidos -->
                <form action="./filtrado.php" method="POST">
                    <label for="equipo_local">Equipo Local</label>
                    <input type="text" name="equipo_local" id="equipo_local" required>
                    
                    <label for="visitante">Equipo Visitante</label>
                    <input type="text" name="equipo_visitante" id="equipo_visitante" required>
                    
                    <label for="temporada">Temporada</label>
                    <input type="text" name="temporada" id="temporada" required>
                    
                    <input type="submit" class="btn" value="FILTRAR">
                </form>
            </div>
            
            <div class="links">
                <a href="./index.php" class="btn">Ver Original</a>
                <a href="./index3.php" class="btn">Ampliacion 2</a>
            </div>

            <div class="links">
                <a href="./listaequipos.php" class="btn grey">LISTA EQUIPOS</a>     
            </div>
            
        </div>
        
    </div>
</body>

</html>