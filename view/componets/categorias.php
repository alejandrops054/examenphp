<div class="container-fluid">
    <button type="button" class="btn btn-primary" id="#crearCategoria" data-toggle="modal" data-target="#crearCategoria">Crear categoria</button>
</br>
<table class="table table-dark table-hover tablas">
    <thead>
      <tr>
        <th>#</th>
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
      
            $categorias = ControllersCategorias::ctrMostrarCategoria($item, $valor);
      
            foreach($categorias as $key => $categoria){
      
                echo '<tr>
                        <td>'.($key+1).'</td>
                        <td>'.$categoria["categoria"].'</td>';

                        if($categoria["estado"] == 1){
                            echo '<td>Activo</td>';
                        }else{
                            echo '<td>Desactivado</td>';
                        }
                echo '<td>'.$categoria["fecha"].'</td>
                        <td>
                            <button type="button" class="btn btn-warning btnEditarCategoria" idCategoria="'.$categoria["id"].'" data-toggle="modal" data-target="#editarCategoria">Editar</button>
                            <button type="button" class="btn btn-danger btnEliminaridCategoria" idCategoria="'.$categoria["id"].'" >Eliminar</button>
                        </td>
                        </tr>';
              }
        ?>
    </tbody>
  </table>
</div>

<!-- The Modal -->
<div class="modal" id="crearCategoria">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Crear Categoria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <input type="text" class="form-control" placeholder="Categoria" name="categoria">
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
                $crearCategoria = new ControllersCategorias();
                $crearCategoria->ctrAgregarCategoria();
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
        <h4 class="modal-title">Editar Categoria</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form role="form" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    <input type="hidden" class="form-control" placeholder="Categoria" name="id" id="id">
                        <input type="text" class="form-control" placeholder="Categoria" name="editarcategoria" id="editarcategoria">
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
                $editarCategoria = new ControllersCategorias();
                $editarCategoria->ctrActualizarCategoria();
            ?>
        </form>
      </div>
    </div>
  </div>
</div>

<?php 
    $eliminarCategorias = new ControllersCategorias();
    $eliminarCategorias->ctrEliminarCategoria();
?>