<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("07.12 - Desmistificando rotas");

require __DIR__ . "/../vendor/autoload.php";

/*
 * [ routes ]
 */
fullStackPHPClassSession("routes", __LINE__);

use Source\Core\Route;

Route::get("/", "UserController:home");
Route::get("/editar" , "UserController:ed:it");

Route::get("/rotas", function(){
    var_dump(Route::routes());
});
