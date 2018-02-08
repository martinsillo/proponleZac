<?php
class conexion {
    private $conn;
    private $host = '10.221.12.5';
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
                $user = 'proponleZacCon';
                $key = '!<x8KS@CKKbx=gWF';
            break;
        }
        $this->conn = new mysqli($this->host,$user,$key,$this->dataB);
        return $this->conn;
    }
}
