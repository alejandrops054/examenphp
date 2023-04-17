<?php 

class ControllersCategorias{

    static public function ctrMostrarCategoria($item, $valor){
        $tabla = "categorias";
        $respuesta = ModelsCategoria::mdlMostrarCategoria($tabla, $item, $valor);
        return $respuesta;
    }
}