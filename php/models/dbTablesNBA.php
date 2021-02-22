<?php

    class dbTablesNBA extends dbNBA {

        // Atributos
              

        // Constructor
        public function __construct() {
            parent::__construct();
        }
        
        // No incluimos los métodos Get y Set ya que no interesa que estos datos sean accesibles en este caso.

        // Otros métodos

        // Método para obtener los datos de una tabla filtrados.
        public function obtenerDatosFiltrado($tabla, $filtros) {
            
            $sql = 'SELECT * FROM ' . $tabla;
            $primero = true;
            
            foreach ($filtros as $key => $filtro) {                
               
                if ($primero == true) {
                    // Si es el primer filtro añadimos la sentencia WHERE y el primer filtro.
                    $sql = $sql . ' WHERE ' . $key . ' = "' . $filtro . '"';
                    $primero = false;
                    
                } else {
                    //  Si son los filtros sucesivos solo añadiremos AND y el filtro.
                    $sql = $sql . ' AND ' . $key . ' = "' . $filtro . '"';
                };                
            };
            
            // Si $filtros es un array vacio obtendremos todos los registros.
            
            // Realizamos la consulta.
            $res = $this->consulta($sql);
            
            // Si se completa la consulta montamos la tabla de respuesta.
            if ($res != null) {
                $tabla = []; 
                while($row = $res->fetch_assoc()) {
                    $tabla[] = $row;
                };
                return $tabla;
            } else {
                return null;
            };
        }

        // Método para obtener solo 1 columna (En el caso del ejemplo seria equipos/temporada/conferencia/division).
        public function obtenerColumna($tabla, $columna) {
          
            $sql = 'SELECT DISTINCT ' . $columna . ' AS data FROM ' . $tabla;                     
            
            // Realizamos la consulta.
            $res = $this->consulta($sql);
           
            // Si se completa la consulta montamos la tabla de respuesta.
            if ($res != null) {
                $tabla = []; 
                while($row = $res->fetch_assoc()) {
                    $tabla[] = $row;
                };
                           
                return $tabla;
            } else {
                return null;
            };
        }

        // Método para obtener un solo equipo. (Sirve tanto para devolver el último como otro cualquiera)
        public function obtenerEquipo($key) {
        
            $sql = 'SELECT * FROM equipos WHERE Nombre = "' . $key . '"';
            
            // Realizamos la consulta.
            $res = $this->consulta($sql);
            
            // Si se completa la consulta devolvemos el registo.
            if ($res != null) {
                $tabla = []; 
                while($row = $res->fetch_assoc()) {
                    $tabla[] = $row;
                };
                           
                return $tabla;
            } else {
                return null;
            };
        }

        // Método para insertar un nuevo equipo.
        public function insertarDatos($tabla, $datos) {
        
            $sql = 'INSERT INTO ' . $tabla . ' VALUES("' . $datos['nombre'] . '", "' . $datos['ciudad'] . '", "' . $datos['conferencia'] . '", "' . $datos['division'] . '")';                     
           
            // Realizamos la consulta.
            $res = $this->consulta($sql);
            
            // Si se completa la consulta devolvemos el registo insertado.
            if ($res != null && $res == true) {             
                $reg_insertado = $this->obtenerEquipo($datos['nombre']);
                return ($reg_insertado);
            } else {
                return null;
            };
        }

        // Método para actualizar un equipo.
        public function actualizarDatos($tabla, $datos_modif) {

            // Preparamos la sentencia SQL
            $sql = 'UPDATE ' . $tabla . ' SET ';

            foreach ($datos_modif as $key => $dato) {
                // Controlamos que no se pueda actualizar el nombre aunque nos lo pasen como parámetro.
                if ($key != 'nombre') {
                    $sql = $sql . ucwords($key) . '= "' . $dato . '", ';
                };               
            };
            
            // Eliminamos la coma y espacio final sobrante antes de añadir la clausula WHERE 
            $sql = substr($sql, 0, -2) . ' WHERE Nombre = "' . $datos_modif['nombre'] . '"';                     

            // Realizamos la consulta.
            $res = $this->consulta($sql);          
            
            // Si se completa la consulta montamos la tabla de respuesta.
            if ($res != null) {                
                $reg_actualizado = $this->obtenerEquipo($datos_modif['nombre']);
                return $reg_actualizado;
            } else {
                return null;
            };
        }
        
        // Método para borrar un equipo.
        public function borrarDatos($tabla, $key) {
        
            $sql = 'DELETE FROM ' . $tabla . ' WHERE Nombre = "' . $key . '"'; 
           
            // Realizamos la consulta.
            $res = $this->consulta($sql);
           
            // Si se completa la consulta montamos la tabla de respuesta.
            if ($res != null) {
                return $res;                
            } else {
                return null;
            };
        }

    };
?>