<div class="container-fluid">
    <button type="button" class="btn btn-primary" id="#crearsubCategoria" data-toggle="modal" data-target="#crearSubCategoria">Crear categoria</button>
</br>
<table class="table table-dark table-hover tablas">
    <thead>
      <tr>
        <th>#</th>
        <th>Sub categoria</th>
        <th>Categoria</th>
        <th>status</th>
        <th>Fecha creación</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            
            $item = null;
            $valor = null;
      
            $respuesta = ControllersSubCaterigas::ctrMostrarSubCategoria($item, $valor);
      
            foreach($respuesta as $key => $subcategoria){
      
                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$subcategoria["subcategoria"].'</td>';
                
                        $item = "id";
                        $valor = $subcategoria["id_categoria"];

                        $categoria = ControllersCategorias::ctrMostrarCategoria($item, $valor);

                        foreach($categoria as $key => $categoriasItem){
                            echo '<td>'.$categoriasItem["categoria"].'</td>';
                        }

                        if($subcategoria["estado"] == 1){
                            echo '<td>Activo</td>';
                        }else{
                            echo '<td>Desactivado</td>';
                        }
                echo '<td>'.$subcategoria["fecha"].'</td>
                        <td>
                            <button type="button" class="btn btn-warning btnEditarSubCategoria" idSubCategoria="'.$subcategoria["id"].'" data-toggle="modal" data-target="#editarCategoria">Editar</button>
                            <button type="button" class="btn btn-danger btnEliminaridSubCategoria" idSubCategoria="'.$subcategoria["id"].'" >Eliminar</button>
                        </td>
                        </tr>';
              }
        ?>
    </tbody>
  </table>
</div>

<!-- The Modal -->
<div class="modal" id="crearSubCategoria">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Crear Sub Categoria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="SubCategoria" name="subcategoria">
                    </div>
                    <br/>
                    <div class="col-md-12">
                       <select name="id_categoria">
                        <?php
                        
                        $item = null;
                        $valor = null;

                        $categoria = ControllersCategorias::ctrMostrarCategoria($item, $valor);

                        foreach($categoria as $key => $categorias){
                            echo '<option value="'.$categoria["id"].'">'.$categorias["categoria"].'</option>';
                        }
                        ?>
                       </select>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Ruta" name="ruta">
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <select name="estado" id="cars">
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Guardar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <?php 
                $crearSubCategoria = new ControllersSubCaterigas();
                $crearSubCategoria->ctrAgregarSubCategoria();
            ?>
        </form>
      </div>
    </div>
  </div>
</div>


<!-- The Modal -->
<div class="modal" id="editarCategoria">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Editar Sub Categoria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <input type="hidden" class="form-control" placeholder="SubCategoria" name="id" id="id">
                        <input type="text" class="form-control" placeholder="SubCategoria" name="editarSubcategoria" id="editarSubcategoria">
                    </div>
                    <br/>
                    <div class="col-md-12">
                       <select name="id_categoria">
                        <option id="subcategoriaid"></option>
                        <?php
                        
                        $item = null;
                        $valor = null;

                        $categoria = ControllersCategorias::ctrMostrarCategoria($item, $valor);

                        foreach($categoria as $key => $categorias){
                            echo '<option value="'.$categoria["id"].'">'.$categorias["categoria"].'</option>';
                        }
                        ?>
                       </select>
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Ruta" name="editarruta" id="editarruta">
                    </div>
                    <br/>
                    <div class="col-md-12">
                        <select name="editarestado">
                            <option id="editarestado"></option>
                            <option value="1">Activo</option>
                            <option value="2">Inactivo</option>
                        </select>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">guardar cambios</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
            <?php 
                $editarCategoria = new ControllersSubCaterigas();
                $editarCategoria->ctrActualizarSubCategoria();
            ?>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $eliminarCategorias = new ControllersSubCaterigas();
    $eliminarCategorias->ctrEliminarSubCategoria();
?>