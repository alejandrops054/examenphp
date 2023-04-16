<?php 

class Conexion{
    static public function conectar(){
        $conexion = new PDO("mysql:host=localhost;dbname=examen","root","", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"));
        return $conexion;
    }
}