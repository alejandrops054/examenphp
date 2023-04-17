<?php 

    $url = "";
?>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
<a class="navbar-brand" href="#">EVALUACION</a>
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="categorias">Categorias</a>
    </li>
    <?php 

        $item = null;
        $valor = null;

        $categorias = ControllersCategorias::ctrMostrarCategoria($item, $valor);

        foreach($categorias as $key => $categoriaMenu){

            echo '<li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                        '.$categoriaMenu["categoria"].'
                    </a>';

            $item = "id_categoria";
            $valor = $categoriaMenu["id"];

            $respuestasubcategoria = ControllersSubCaterigas::ctrMostrarSubCategoria($item, $valor);

            foreach($respuestasubcategoria as $key => $subcategoriaItem){

                echo '<div class="dropdown-menu">
                          <a class="dropdown-item" href="'.$subcategoriaItem["ruta"].'">'.$subcategoriaItem["subcategoria"].'</a>
                      </div>';                
            }
            echo '</li>';
        }
    
    ?>

    <li class="nav-item">
      <a class="nav-link" href="#">Link 2</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Link 3</a>
    </li>
  </ul>
</nav>
<br/>