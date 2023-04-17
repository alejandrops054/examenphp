<div class="container-fluid">
<table class="table table-dark table-hover">
    <thead>
      <tr>
        <th>#</th>
        <th>Categoria</th>
        <th>status</th>
        <th>Sub catagoria</th>
        <th>Fecha creación Subcategoria</th>
        <th>Fecha creación categoria</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            
            $item = null;
            $valor = null;
      
            $categorias = ControllersCategorias::ctrMostrarCategoria($item, $valor);
      
            foreach($categorias as $key => $categoria){
      
                echo '<tr>">
                        <td>'.($key+1).'</td>
                        <td>'.$categoria["categoria"].'</td>';

                        if($categoria["estado"] != 1){
                            echo '<td>Activo</td>';
                        }else{
                            echo '<td>Desactivado</td>';
                        }
                echo '<td>'.$categoria["fecha"].'</td>';
      
                  $item = "id_categoria";
                  $valor = $categoriaMenu["id"];
      
                  $respuestasubcategoria = ControllersSubCaterigas::ctrMostrarSubCategoria($item, $valor);
      
                  foreach($respuestasubcategoria as $key => $subcategoria){
      
                      echo '<td>'.$subcategoria["subcategoria"].'</td>
                            <td>'.$subcategoria["fecha"].'</td>';                
                  }
                  
                  echo '<td>'.$categoria["fecha"].'</td>
                        <td>
                            <button type="button" class="btn btn-warning">Editar</button>
                            <button type="button" class="btn btn-danger">Eliminar</button>
                        </td>
                        </tr>';
              }
        ?>
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
    </tbody>
  </table>
</div>