<?php

    // Creamos una función filtrar para reutilizar el mismo código en la práctica y ampliaciones.
    function filtrar($tabla, $filtros) {
        // Creamos el objeto para manejar la tabla.
        $conn = new dbTablesNBA();

        // Comprobamos si hay error de conexión.
        if($conn->hayError()) {                                
            return -1; // ERROR CONEXIÓN.
        } else {                         
            // Almacenamos el resultado en una variable.
            $tabla_filtrada = $conn->obtenerDatosFiltrado($tabla, $filtros); 
            
            // Comprobamos si hemos obtenido resultados o no.
            if ($tabla_filtrada != null) {
                return $tabla_filtrada;             
            } else {
                return false;
            };
        };
    };


    // Función para comprobar que los filtros son correctos.
    function comprobar_filtros() {

        $faltan_filtros = false;

        // Comprobamos si se ha llamado desde las ampliaciones.
        if(count($_POST) > 1) {
        
            // Ahora comprobamos si alguno de los filtros no se ha fijado.
            if (($_POST['equipo_local'] == 'Por_defecto') || ($_POST['equipo_visitante'] == 'Por_defecto') || ($_POST['temporada'] == 'Por_defecto')) {
                $faltan_filtros = true;
            } else {
                // Si no falta ningun filtro.
                $faltan_filtros = false;
            };
            
        } else {
            // Si no estamos en las ampliaciones solo comprobaremos el filtro del equipo local.        
            if (isset($_POST['equipo_local'])) {
                $faltan_filtros = false;
            } else {
                $faltan_filtros = true;
            };
        };
        
        if ($faltan_filtros) {
            return false;
        } else {
            return true;
        };

    };


    // Función para obtener listado de datos de select desplegable.
    function llenarSelect($tabla, $columna) { 
        // Creamos el objeto para manejar la tabla.
        $conn = new dbTablesNBA();

        // Comprobamos si hay error de conexión.
        if($conn->hayError()) {                                
            return -1; // ERROR CONEXIÓN.
        } else {                         
            // Obtenemos el array con las opciones de los equipos/temporadas.
            $items = $conn->obtenerColumna($tabla, $columna); 
            // Comprobamos si hemos obtenido resultados o no.
            if ($items != null) {
                return $items;             
            } else {
                return false;
            };                
        };
    }; 

    // Creamos una función para comprobar si existe un registro.
    function yaExiste($key) {
        // Creamos el objeto para manejar la tabla.
        $conn = new dbTablesNBA();

        // Comprobamos si hay error de conexión.
        if($conn->hayError()) {                                
            return -1; // ERROR CONEXIÓN.
        } else {                         
            // Almacenamos el resultado en una variable.
            $reg_buscado = $conn->obtenerEquipo($key); 
            
            // Comprobamos si hemos obtenido resultados o no.
            if ($reg_buscado != null) {
                return $reg_buscado;             
            } else {
                return false;
            };
        };
    };


    // Creamos una función para insertar registros.
    function insertar($datos) {
        // Creamos el objeto para manejar la tabla.
        $conn = new dbTablesNBA();

        // Comprobamos si hay error de conexión.
        if($conn->hayError()) {                                
            return -1; // ERROR CONEXIÓN.
        } else {                         
            // Almacenamos el resultado en una variable.
            $reg_insertado = $conn->insertarDatos('equipos', $datos); 
            
            // Comprobamos si hemos obtenido resultados o no.
            if ($reg_insertado != null) {                
                return $reg_insertado;             
            } else {
                return false;
            };
        };
    };

    // Creamos una función para actualizar registros.
    function actualizar($datos) {
        // Creamos el objeto para manejar la tabla.
        $conn = new dbTablesNBA();

        // Comprobamos si hay error de conexión.
        if($conn->hayError()) {                                
            return -1; // ERROR CONEXIÓN.
        } else {                         
            // Almacenamos el resultado en una variable.
            $reg_actualizado = $conn->actualizarDatos('equipos', $datos); 
            
            // Comprobamos si hemos obtenido resultados o no.
            if ($reg_actualizado != null) {
                return $reg_actualizado;             
            } else {
                return false;
            };
        };
    };

    
    // Creamos una función para borrar registros.
    function borrar($datos) {
        // Creamos el objeto para manejar la tabla.
        $conn = new dbTablesNBA();

        // Comprobamos si hay error de conexión.
        if($conn->hayError()) {                                
            return -1; // ERROR CONEXIÓN.
        } else {                         
            // Almacenamos el resultado en una variable.
            $reg_borrado = $conn->borrarDatos('equipos', $datos); 
            
            // Comprobamos si hemos obtenido resultados o no.
            if ($reg_borrado != null) {
                return $reg_borrado;             
            } else {
                return false;
            };
        };
    };

?>