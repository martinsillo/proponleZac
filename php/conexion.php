<?php
class conexion {
    private $conn;
    private $host = 'localhost';
    private $dataB = 'proponleZac';
    function conectar($u){
        //$u = nivel de usuario
        switch($u){
            case 1:
                $user = 'proponleZacAdm';
                $key = '>GD2R3,(<xj8m:<a';
            break;
            case 2:
                $user = 'proponleZacUsr';
                $key = 'uxU2j*6gXVTT;_#7';
            break;
            case 3:
                $user = 'proponleZacConsulta';
                $key = '!<x8KS@CKKbx=gWF';
            break;
        }
        $this->conn = new mysqli($this->host,$user,$key,$this->dataB);
        return $this->conn;
    }
    function cerrar($u){
        $u->close();
    }
}

$conexion = new conexion();
