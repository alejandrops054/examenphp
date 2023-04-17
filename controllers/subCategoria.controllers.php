<?php 

class ControllersSubCaterigas{

    static public function ctrMostrarSubCategoria($item, $valor){
        $tabla = "subcategorias";
        $respuesta = ModelsSubCategorias::mdlMostrarSubCaterias($tabla, $item, $valor);
        return $respuesta;
    }

    static public function ctrAgregarSubCategoria(){
        if(isset($_POST["subcategoria"])){

            $tabla = "subcategorias";
            $datos = array("subcategoria"=>$_POST["subcategoria"],
                            "id_categoria"=>$_POST["id_categoria"],
                            "ruta" => $_POST["ruta"],
                            "estado" => $_POST["estado"]);

            $respuesta = ModelsSubCategorias::mdlCrearSubCategoria($tabla, $datos);
            
            if($respuesta == "ok"){
                echo '<script>
                        Swal.fire({
                            title: "¡Éxito!",
                            text: "Tu Subcategoria se ha creado correctamente.",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "subcategorias";
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrActualizarSubCategoria(){

        if(isset($_POST["editarcategoria"])){
    
            $tabla = "subcategorias";
            $datos = array("subcategoria"=>$_POST["subcategoria"],
                           "id_categoria"=>$_POST["id_categoria"],
                           "ruta"=>$_POST["editarruta"], 
                           "estado"=>$_POST["editarestado"],
                            "id"=>$_POST["id"]);


            $respuesta = ModelsSubCategorias::mdlActualizarSubCategoria($tabla, $datos);
            
            if($respuesta == "ok"){
                echo '<script>
                        Swal.fire({
                            title: "¡Éxito!",
                            text: "Tu Subcategoria se ha editado correctamente.",
                            icon: "success",
                            confirmButtonText: "Aceptar"
                        }).then(function(result){
                            if(result.value){
                                window.location = "subcategorias";
                            }
                        });
                    </script>';
            }
        }
    }

    static public function ctrEliminarSubCategoria(){
        if(isset($_GET["idCategoria"])){
            $tabla = "subcategorias";
            $datos = $_GET["idCategoria"];

            $respuesta = ModelsSubCategorias::mdlEliminarSubCategoria($tabla, $datos);

            if($respuesta == "ok"){
                echo '<script>
                    Swal.fire({
                        title: "¡Éxito!",
                        text: "Tu Subcategoria se ha eliminado correctamente.",
                        icon: "success",
                        confirmButtonText: "cerrar"
                    }).then(function(result){
                        if(result.value){
                            window.location = "subcategorias";
                        }
                    });
            </script>';
            }
        }
    }
}