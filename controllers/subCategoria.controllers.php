<?php 

class ControllersSubCaterigas{

    static public function ctrMostrarSubCategoria($item, $valor){
        $tabla = "subcategorias";
        $respuesta = ModelsSubCategorias::mdlMostrarSubCaterias($tabla, $item, $valor);
        return $respuesta;
    }
}