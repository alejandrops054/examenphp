<?php

require_once "../controllers/subCategoria.controllers.php";
require_once  "../models/subcategoria.models.php";

class AjaxSubCategorias{

	/*=============================================
	EDITAR SUBCATEGORÍA
	=============================================*/	

	public $idSubCategoria;

	public function ajaxEditarSubCategoria(){

		$item = "id";
		$valor = $this->idSubCategoria;

		$respuesta = ControllersSubCaterigas::ctrMostrarSubCategoria($item, $valor);

		echo json_encode($respuesta);

	}
}

/*=============================================
EDITAR SUBCATEGORÍA
=============================================*/	
if(isset($_POST["idSubCategoria"])){

	$Subcategoria = new AjaxSubCategorias();
	$Subcategoria -> idSubCategoria = $_POST["idSubCategoria"];
	$Subcategoria -> ajaxEditarSubCategoria();
}