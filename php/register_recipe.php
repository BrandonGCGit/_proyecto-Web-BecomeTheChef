<?php
require 'db.php';

session_start();
if (isset($_SESSION["isLoggedIn"])){
    $data_Category = $database->select("tb_category", "*");
    $data_Complexity = $database->select("tb_complexity", "*");
    $data_Occasion = $database->select("tb_occasion", "*");
}else{
    //    Si no estan logeados se tiene que redirectionar
    header("location: login.php");
}



//EDITAR
//if(isset($_GET)) {
//    $data = $database->select("tb_recipes", "*", [
//        "recipes_id" => $_GET["recipes_id"]
//    ]);
//}

//if(isset($_GET)){
//    $data = $database->select("tb_recipe", "*", [
//        "id_recipe" => $_GET["id"]
//    ]);
//}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Receta</title>
    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/932c8d254a.js" crossorigin="anonymous"></script>
    <!--    FONTS NATO SERIF & LATO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
            href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif:wght@400;700&display=swap"
            rel="stylesheet">
    <!--    BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <!--    CSS-->
    <link rel="stylesheet" href="../main.css">
</head>

<body>

<section class="container-fluid px-0">
    <div class="card no-border"></div>
        <div class="row g-0">
            <div class="col-sm-4 px-0 d-none d-sm-block prueba-black prueba-prueba">
                <img src="../img/img-registroReceta.png" class="w-100 img-optionsLogin" alt="img-registro-receta">
                <!--<div class="prueba-prueba w-100 img-optionsLogin"></div>-->
            </div>

            <!--*******************************************************-->
            <div class="col-md-8">
                <div class="card-body">

                    <!--TOP BUTTOM-CLOSE-->
                    <div class="flex-row-reverse d-flex p-2 p-3 m-2">
                        <button id="btn-close-registerRecipe" class="btn btn-primary btn-close-constume" type="button">
                            <i class="d-flex justify-content-center align-self-center m-0 px-0 fa-solid fa-x"></i>
                        </button>
                    </div>
                    <!--TOP BUTTOM-CLOSE-->

                    <!--TITLES AND TEXTS-->
                    <div class="container mt-5">
                        <h1 class="xlg-title d-flex justify-content-center">Registro de Recetas</h1>
                        <h3 class="mdl-title d-flex justify-content-center">Ingrese los datos de la receta</h3>
                    </div>
                    <!--TITLES AND TEXTS-->
                    <!--////////////////////////////////////-->
                    <!--FORM-->
                    <!--////////////////////////////////////-->
                    <div class="d-flex justify-content-center mt-5">

                        <div class="col-8">
                            <form action="_insert_recipe.php" method="post" enctype="multipart/form-data">
                                <!--////////////////////////////////////-->
                                <!--RECIPE NAME INPUT-->
                                <!--////////////////////////////////////-->
                                <div class="mb-3">
                                    <label for="recipe_name" class="form-label">Nombre de la
                                        receta</label>
                                    <input type="text" class="bg-gray form-control" id="recipe_name" name="recipe_name"
                                           placeholder="Ingrese el nombre de la receta">
                                </div>
                                <!--////////////////////////////////////-->
                                <!--RECIPE NAME INPUT-->
                                <!--////////////////////////////////////-->
                                <!--IMAGE INPUT AND COMPLEX SELECT-->
                                <!--////////////////////////////////////-->
                                <div class="container px-0 d-flex justify-content-between mt-5 align-items-end">
                                    <div class="col-6 pe-2">
                                        <label for="recipe_img" class="form-label">Imagen</label>
                                        <input class="bg-gray form-control" id="recipe_img" name="recipe_img" type="file">
                                    </div>

                                    <div class="col-6 ps-2">
                                        <label for="recipe_complexity" class="form-label">Complejidad</label>
                                        <select class="bg-gray form-select" aria-label="Default select example" name="recipe_complexity">
                                            <option selected>Seleccione la dificultad</option>
                                            <?php

                                            $len = count($data_Complexity);
                                            for($i=0; $i < $len; $i++){
                                                echo '<option id="recipe_complexity" value="'.$data_Complexity[$i]
                                                    ['complexity_id'].'">'.$data_Complexity[$i]
                                                    ['complexity_name'].'</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!--////////////////////////////////////-->
                                <!--IMAGE INPUT AND COMPLEX SELECT-->
                                <!--////////////////////////////////////-->
                                <!--PREPARATION TIME AND CATEGORY-->
                                <!--////////////////////////////////////-->
                                <div class="container px-0 d-flex justify-content-between mt-5 align-items-end">
                                    <div class="col-6 pe-2">
                                        <label for="recipe_timePreparation" class="form-label">Tiempo de
                                            Preparación</label>
                                        <input type="text" class="bg-gray form-control" id="recipe_timePreparation"
                                               placeholder="Ingrese el tiempo de preparación" name="recipe_timePreparation">
                                    </div>

                                    <div class="col-6 ps-2">
                                        <label for="recipe_category" class="form-label">Categoría</label>
                                        <select class="bg-gray form-select" aria-label="Default select example" name="recipe_category">
                                            <option selected>Seleccione la categoría</option>
                                            <?php

                                            $len = count($data_Category);
                                            for($i=0; $i < $len; $i++){
                                                echo '<option id="recipe_category"  value="'.$data_Category[$i]
                                                    ['category_id'].'">'.$data_Category[$i]
                                                    ['category_name'].'</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>

                                </div>
                                <!--////////////////////////////////////-->
                                <!--PREPARATION TIME AND CATEGORY-->
                                <!--////////////////////////////////////-->
                                <!--COOKING TIME AND OCATION-->
                                <!--////////////////////////////////////-->
                                <div class="container px-0 d-flex justify-content-between mt-5 align-items-end">
                                    <div class="col-6 pe-2">
                                        <label for="recipe_cookingTime" class="form-label">Tiempo de
                                            Cocción</label>
                                        <input type="text" class="bg-gray form-control" id="recipe_cookingTime"
                                               placeholder="Ingrese el tiempo de cocción" name="recipe_cookingTime">
                                    </div>

                                    <div class="col-6 ps-2">
                                        <label for="recipe_occasion" class="form-label">Ocación</label>
                                        <select class="bg-gray form-select" aria-label="Default select example" name="recipe_occasion">
                                            <option selected>Seleccione la Ocación</option>
                                            <?php

                                            $len = count($data_Occasion);
                                            for($i=0; $i < $len; $i++){
                                                echo '<option id="recipe_occasion" value="'.$data_Occasion[$i]
                                                    ['occasion_id'].'">'.$data_Occasion[$i]
                                                    ['occasion_name'].'</option>';
                                            }

                                            ?>
                                        </select>
                                    </div>
                                </div>


                                <!--////////////////////////////////////-->
                                <!--COOKING TIME AND OCATION-->
                                <!--////////////////////////////////////-->
                                <!--COOKING TOTAL TIME AND LIKEABLE-->
                                <!--////////////////////////////////////-->
                                <div class="container px-0 d-flex justify-content-between mt-5 align-items-end">
                                    <div class="col-6 pe-2">
                                        <label for="recipe_totalTime" class="form-label">Tiempo Total</label>
                                        <input type="text" class="bg-gray form-control" id="recipe_totalTime"
                                               placeholder="Ingrese el tiempo Total" name="recipe_totalTime">
                                    </div>

                                    <div class="col-6 ps-2">
                                        <label for="recipe_isFeatured" class="form-label">¿Receta Destacada?</label>
                                        <select class="bg-gray form-select" aria-label="Default select example" name="recipe_isFeatured">
                                            <option id="recipe_isFeatured" selected>Seleccione una opción</option>
                                            <option value="0">Si</option>
                                            <option value="1">No</option>
                                        </select>
                                    </div>

                                </div>
                                <!--////////////////////////////////////-->
                                <!--COOKING TOTAL TIME AND LIKEABLE-->
                                <!--////////////////////////////////////-->
                                <!--PORTIONS AND VOTES-->
                                <!--////////////////////////////////////-->
                                <div class="container px-0 d-flex justify-content-between mt-5 align-items-end">
                                    <div class="col-6 pe-2">
                                        <label for="recipe_portions" class="form-label">Porciones</label>
                                        <input type="text" class="bg-gray form-control" id="recipe_portions"
                                               placeholder="Ingrese la cantidad de porciones" name="recipe_portions">
                                    </div>
                                    <div class="col-6 ps-2">
                                        <label for="recipe_likes" class="form-label">Votos</label>
                                        <input type="text" class="bg-gray form-control" id="recipe_likes"
                                               placeholder="Ingrese los votos de la receta" name="recipe_likes">
                                    </div>
                                </div>
                                <!--////////////////////////////////////-->
                                <!--PORTIONS AND VOTES-->
                                <!--////////////////////////////////////-->
                                <!--DESCRIPTION, INGREDIENTS LIST,PREPARATION INTRUCTIONS-->
                                <!--////////////////////////////////////-->
                                <div class="container px-0 mt-5">
                                    <label for="recipe_description" class="form-label">Descripción</label>
                                    <textarea class="bg-gray form-control" id="recipe_description"
                                              rows="6" name="recipe_description"></textarea>
                                </div>
                                <div class="container px-0 mt-5">
                                    <label for="recipe_listIngredients" class="form-label">Lista de
                                        Ingredientes</label>
                                    <div id="ingredients">
                                    </div>
                                    <button id="add-ingredient">Add Ingredient</button>
                                </div>
                                <div class="container px-0 mt-5">
                                    <label for="recipe_listInstructions" class="form-label">Intrucciones de
                                        preparación</label>
                                    <div id="steps">
                                    </div>
                                    <button id="add-step">Add Step</button>
                                </div>

                                <div class="mt-5 mb-5 pt-3 d-flex justify-content-around">
                                    <input class="btn-bottom-constume btn btn-primary btn-lg bt-orange" type="submit" value="Registrar Receta">
                                    <!-- <input type="submit" value="SUBMIT">-->
                                    <!--<button type="button" class="btn btn-primary btn-lg">Large button</button>-->
                                </div>
                                <!--////////////////////////////////////-->
                                <!--DESCRIPTION, INGREDIENTS LIST,PREPARATION INTRUCTIONS-->
                                <!--////////////////////////////////////-->
                            </form>

                        </div>
                        <!--////////////////////////////////////-->
                        <!--FORM-->
                        <!--////////////////////////////////////-->
                    </div>
                </div>
            </div>
        </div>

    </section>


<!--SCRIPT-->
<script src="../js/_register_recipe_buttoms_href.js">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script src="../js/_setIngredients.js"></script>
<script src="../js/_setPreparationSteps.js"></script>
</body>

</html>