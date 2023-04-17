<?php 

class Conexion{
    static public function conectar(){
        try{
            $link = new PDO("mysql:host=localhost;dbname=examen","root","");
            $link->exec("set names utf8");
            return $link;

        }catch(PDOException $error){
            echo '<script>
                        console.log("error al establecer conexion")
                  </script>';
            die("error de conexion".$error->getMessage());
        }
    }
}