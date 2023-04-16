<nav class="navbar navbar-expand-sm bg-light">
  <ul class="navbar-nav">
    <?php 

        $item = null;
        $valor = null;

        $categorias = ControllersCategorias::ctrMostrarCategoria($item, $valor);

        foreach($categorias as $key => $categoriaMenu){
            echo '<li class="nav-item">
                    <a class="nav-link" href="#">'.$categoriaMenu["categoria"].'</a>
                  </li>';
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