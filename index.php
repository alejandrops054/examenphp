<?php

//CONTROLLERS
require_once "controllers/plantilla.controllers.php";
require_once "controllers/categorias.controllers.php";

//MODELS
require_once "models/categorias.models.php";

$plantilla = new ControllersPlantilla();
$plantilla->ctrPlantilla();