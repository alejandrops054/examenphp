<?php 

class ControllersCategorias{

    static public function ctrMostrarCategoria($item, $valor){
        $tabla = "categorias";
        $respuesta = ModelsCategoria::mdlMostrarCategoria($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrAgregarCategoria(){
        if(isset($_POST["categoria"])){

            $tabla = "categorias";
            $datos = array("categoria"=>$_POST["categoria"],
                            "ruta" => $_POST["ruta"],
                            "estado" => $_POST["estado"]);

            $respuesta = ModelsCategoria::mdlCrearCategoria($tabla, $datos);

            if($respuesta == "ok"){
                echo '<script>
                        Swal.fire({
                            title: "¡Éxito!",
                            text: "Tu categoria se ha creado correctamente.",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "categorias";
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrActualizarCategoria(){

        if(isset($_POST["editarcategoria"])){
    
            $tabla = "categorias";
            $datos = array("categoria"=>$_POST["editarcategoria"], 
                           "ruta"=>$_POST["editarruta"], 
                           "estado"=>$_POST["editarestado"],
                            "id"=>$_POST["id"]);


            $respuesta = ModelsCategoria::mdlActualizarCategoria($tabla, $datos);
            
            if($respuesta == "ok"){
                echo '<script>
                        Swal.fire({
                            title: "¡Éxito!",
                            text: "Tu categoria se ha editado correctamente.",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "categorias";
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrEliminarCategoria(){
        if(isset($_GET["idCategoria"])){
            $tabla = "categorias";
            $datos = $_GET["idCategoria"];

            $respuesta = ModelsCategoria::mdlEliminarCategoria($tabla, $datos);

            if($respuesta == "ok"){
                echo '<script>
                    Swal.fire({
                        title: "¡Éxito!",
                        text: "Tu categoria se ha eliminado correctamente.",
                        icon: "success",
                        confirmButtonText: "cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "categorias";
                        }
                    });
            </script>';
            }
        }
    }
}