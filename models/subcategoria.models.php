<?php 

require_once "config.php";

class ModelsSubCategorias{

    static public function mdlMostrarSubCaterias($tabla, $item, $valor){
        if($item != null){
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
			$stmt -> bindParam(":".$item, $valor, PDO::PARAM_INT);
			$stmt -> execute();
			return $stmt -> fetchAll();
		}else{
			$stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");
			$stmt -> execute();
			return $stmt -> fetchAll();
		}
		$stmt -> close();
		$stmt = null;
    }

	    //Crear Categoerias
		static public function mdlCrearSubCategoria($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(subcategoria, id_categoria, ruta, estado)VALUES(:subcategoria, :id_categoria, :ruta, :estado)");
			$stmt->bindParam(":subcategoria", $datos["subcategoria"], PDO::PARAM_STR);
			$stmt->bindParam(":id_categoria", $datos["id_categoria"],PDO::PARAM_INT);
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
		static public function mdlActualizarSubCategoria($tabla, $datos){
			$stmt = Conexion::conectar()->prepare("UPDATE $tabla SET subcategoria = :subcategoria, id_categoria = :id_categoria  ruta = :ruta, estado = :estado WHERE id = :id");
			$stmt->bindParam(":subcategoria", $datos["subcategoria"], PDO::PARAM_STR);
			$stmt->bindParam(":id_categoria", $datos["id_categoria"],PDO::PARAM_INT);
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
		static public function mdlEliminarSubCategoria($tabla, $datos){
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