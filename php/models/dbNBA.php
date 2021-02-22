<?php

    class dbNBA {

        // Atributos
        protected $host = 'localhost';
        protected $user = ''; //CAMBIAR
        protected $pass = '';//CAMBIAR
        protected $bbdd = 'db_nba';//CAMBIAR
        protected $port = 3306;

        // Conexión
        protected $conexion;

        // Errores
        protected $err = false;
        protected $err_msg = '';


        public function __construct() {
            $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->bbdd, $this->port);

            if ($this->conexion->connect_errno) {
                $this->err = true;
                $this->err_msg = 'No se puede conectar a la BBDD, por favor revise los datos de conexi&oacute;n)';
            };
        }
        
        // No incluimos los métodos Get y Set ya que no interesa que estos datos sean accesibles en este caso.

        // Otros métodos

        // Método para saber si hay un error
        public function hayError() {
            return $this->err;
        }

        // Método que devuelve el mensaje de error
        public function msgError() {
            return $this->err_msg;
        }

        // Método para realizar consultas
        public function consulta($sql) {
            if ($this->err == false) {
                $res = $this->conexion->query($sql);
                return $res;
            } else {
                $this->err_msg = 'No se puede completar la consulta: ' . $sql;
                return null;
            };
        }
    };
?>