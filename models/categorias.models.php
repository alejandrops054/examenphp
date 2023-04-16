<?php

include "config.php";

class ModelsCategoria{

    //Mostrar Categorias
    static public function mdlMostrarCategoria($tabla, $item, $valor){
        if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
			$stmt -> execute();
			return $stmt -> fetch();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
    }

    //Crear Categoerias
    static public function mdlCrearCategoria($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(categoria, ruta, estado)VALUES(:categoria, :ruta, :estado)");
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"],PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"],PDO::PARAM_STR);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    //Actulizar Categorias
    static public function mdlActualizarCategoria($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET categoria = :categoria,  ruta = :ruta, estado = :estado, WHERE id = :id");
        $stmt->bindParam(":categoria", $datos["categoria"], PDO::PARAM_STR);
        $stmt->bindParam(":ruta", $datos["ruta"],PDO::PARAM_STR);
        $stmt->bindParam(":estado", $datos["estado"],PDO::PARAM_STR);
        $stmt->bindParam(":id", $datos["id"],PDO::PARAM_INT);

        if($stmt->execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt->close();
        $stmt = null;
    }

    //Eliminar Categoria
    static public function mdlEliminarCategoria($tabla, $datos){
        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");
        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }
        $stmt -> close();
        $stmt = null;
    }
}