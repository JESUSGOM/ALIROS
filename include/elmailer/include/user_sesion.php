<?php
    class UserSession{

        private $usuario;
        private $laclave;
        private $nombre;
        private $apellidoUno;
        private $apellidoDos;
        private $tipo;
        private $centro;
        private $usuariocompleto;
        private $nombreCentro;

        public function __construct($usuar, $clave, $nom, $apellUno, $apellDos, $tip, $cen){
            session_start();
            $this->usuario = $usuar;
            $this->laclave = $clave;
            $this->nombre = $nom;
            $this->apellidoUno = $apellUno;
            $this->apellidoDos = $apellDos;
            $this->tipo = $tip;
            $this->centro = $cen;
            $_SESSION['user'] = $this->usuario;
            $_SESSION['clave'] = $this->laclave;
            $_SESSION['nombre'] = $this->nombre;
            $_SESSION['apellUno'] = $this->apellidoUno;
            $_SESSION['apellDos'] = $this->apellidoDos;
            $_SESSION['tipo'] = $this->tipo;
            $_SESSION['centro'] = $this->centro;
        }
        public function setCurrentSession($usuario, $laclave, $nombre, $apellidoUno, $apellidoDos, $tipo, $centro){
            $_SESSION['user'] = $usuario;
            $_SESSION['clave'] = $laclave;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellUno'] = $apellidoUno;
            $_SESSION['apellDos'] = $apellidoDos;
            $_SESSION['tipo'] = $tipo;
            $_SESSION['centro'] = $centro;
        }
        public function getCurrentSession(){
            return $_SESSION['user'];
        }

        public function datos(){
            $usuariocompleto = $_SESSION['apellUno'] + ' '  + $_SESSION['apellDos'] + ", " + $_SESSION['nombre'];
            return $_SESSION['complusu'] = $usuariocompleto;   
        }

        public function centro(){
            return $_SESSION['elcentro'];
        }

        public function ponNombreAlCentro($ncentro, $cen){
            $this->nombreCentro = $ncentro;
            $this->centro = $cen;
        }
        public function cerrarSession(){
            session_unset();
            session_destroy();
        }
    }
?>