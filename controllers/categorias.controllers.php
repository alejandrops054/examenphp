<?php 

class ControllersCategorias{

    static public function ctrMostrarCategoria($item, $valor){
        $tabla = "categoria";
        $respuesta = ModelsCategoria::mdlMostrarCategoria($tabla, $item, $valor);
        return $respuesta;
    }
}