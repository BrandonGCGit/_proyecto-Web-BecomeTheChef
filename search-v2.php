<?php

require './php/db.php';

//===============================================
//All recipes
//===============================================
$data= $database->select("tb_recipes",[
    "[>]tb_category"=>["category_id" => "category_id"],
    "[>]tb_occasion"=>["occasion_id" => "occasion_id"],
    "[>]tb_complexity"=>["complexity_id" => "complexity_id"],
],[
    "tb_recipes.recipes_id",
    "tb_recipes.recipes_name",
    "tb_recipes.recipes_img",
    "tb_recipes.recipes_total_time",
    "tb_recipes.recipes_portions",
    "tb_category.category_name",
    "tb_occasion.occasion_name",
    "tb_complexity.complexity_name"
]);
//var_dump($data);
//===============================================
//All recipes
//===============================================

//===============================================
//POPULAR RECIPES
//===============================================
$popular_recipes = $database->query("SELECT <recipes_id>,
    <recipes_name>,
    <recipes_img>,
    <recipes_total_time>,
    <recipes_portions>,
    <category_name>,
    <occasion_name>,
    <complexity_name>
        FROM <tb_recipes> 
            INNER JOIN <tb_category> ON tb_recipes.category_id = tb_category.category_id
            INNER JOIN <tb_occasion> ON tb_recipes.occasion_id = tb_occasion.occasion_id
            INNER JOIN <tb_complexity> ON tb_recipes.complexity_id = tb_complexity.complexity_id
                                    ORDER BY <recipes_likes> 
                                        DESC LIMIT 7")->fetchAll();
//===============================================
//POPULAR RECIPES
//===============================================


if($_GET){
//    var_dump($_GET);
//    $selected_levels = [1,2,3];
//    $selected_categories = [1,2,3,4,5,6];
//    $selected_ocassions = [1,2,3,4,5,6];
    $has_filter = false;
    $results_message = "";

//    if(isset($_GET["levels"]) && count($_GET["levels"]) > 0){
//        $selected_levels = $_GET["levels"];
//        $has_filter = true;
//    }
//
//    if(isset($_GET["categories"]) && count($_GET["categories"]) > 0){
//        $selected_categories = $_GET["categories"];
//        $has_filter = true;
//    }
//
//    if(isset($_GET["ocassions"]) && count($_GET["ocassions"]) > 0){
//        $selected_ocassions = $_GET["ocassions"];
//        $has_filter = true;
//    }

    if($has_filter){
        echo "Has filter";
        $results = $database->select("tb_recipes",[
            "[><]tb_recipe_category"=>["id_recipe_category" => "id_recipe_category"]
        ],[
                "tb_recipes.id_recipe",
                "tb_recipes.recipe_name",
                "tb_recipes.recipe_time",
                "tb_recipes.recipe_image",
                "tb_recipes.recipe_description",
                "tb_recipes.recipe_likes",
                "tb_recipe_category.recipe_category"
            ]
//            ,[
//            "tb_recipes.id_recipe_level" => $selected_levels,
//            "tb_recipes.id_recipe_category" => $selected_categories,
//            "tb_recipes.id_recipe_ocassion" => $selected_ocassions
//        ]
        );
        $results_message = "selected recipes";
    }else{
//        echo "Has not filter";
        $results= $database->select("tb_recipes",[
            "[>]tb_category"=>["category_id" => "category_id"],
            "[>]tb_occasion"=>["occasion_id" => "occasion_id"],
            "[>]tb_complexity"=>["complexity_id" => "complexity_id"],
        ],[
                "tb_recipes.recipes_id",
                "tb_recipes.recipes_name",
                "tb_recipes.recipes_img",
                "tb_recipes.recipes_total_time",
                "tb_recipes.recipes_portions",
                "tb_category.category_name",
                "tb_occasion.occasion_name",
                "tb_complexity.complexity_name"
            ]

            ,[
                "tb_recipes.recipes_name[~]" =>$_GET["keyword"]
            ]
        );


        $results_message = $_GET["keyword"];
    }
//    echo "-> ".count($results);

}

$levels = $database->select("tb_recipe_levels","*");
$categories = $database->select("tb_recipe_category","*");
$ocassions = $database->select("tb_recipe_ocassions","*");

//featured recipes
$featured_recipes = $database->select("tb_recipes","*",[
    "recipe_is_featured" => 1
]);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Become The Chef</title>
    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/932c8d254a.js" crossorigin="anonymous"></script>
    <!--    FONTS NATO SERIF & LATO -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Noto+Serif:wght@400;700&display=swap" rel="stylesheet">
    <!--    BOOTSTRAP-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">

    <!--    SPLIDE-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/css/splide.min.css">
    <!--    AOS ANIMATION-->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!--    CSS-->
    <link rel="stylesheet" href="./main.css">
</head>
<body>

<main>
    <!--    =======================-->
    <!--    NAVBAR & IMG TACO-->
    <!--    ======================-->
    <header>
        <!--==========================================-->
        <!--NAVBAR-->
        <!--==========================================-->
        <nav class="navbar navbar-expand-xxl ff-NotoSerif fw-bold">
            <div class="container">
                <a class="navbar-brand  hvr-float-shadow" href="./index.php"><img src="./img/brand.png" alt="Brand Become The Chef"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-xxl-around" id="navbarSupportedContent">
                    <form class="d-flex mt-xxl-5" role="search" action="./search-v2.php" method="get">
                        <button class="btn border-0" type="submit"><img src="./img/icono-lupa.png" alt=""></button>
                        <input class="form-control-lg border-0 border-bottom br-0 bg-transparent border-dark opacity-50" type="search" name="keyword" placeholder="Search" aria-label="Search">
                    </form>
                    <ul class="navbar-nav mt-xxl-5">
                        <li class="nav-item mx-xl-3">
                            <a class="nav-link ff-lato fs-5 hvr-float-shadow" aria-current="page" href="index.php">Inicio</a>
                        </li>
                        <li class="nav-item mx-xl-3">
                            <a class="nav-link ff-lato fs-5 hvr-float-shadow" aria-current="page" href="#">Sobre Nosotros</a>
                        </li>
                        <li class="nav-item mx-xl-3">
                            <a class="nav-link ff-lato fs-5 hvr-float-shadow" aria-current="page" href="#">Contáctanos</a>
                        </li>
                    </ul>
                    <button id="btn-login" type="button" class="btn btn-outline-dark mt-xxl-5 mx-xxl-4 ff-lato fs-5 hvr-grow-shadow">Iniciar Sesión</button>
                    <button id="btn-register" type="button" class="btn btn-outline-warning btn-lg   bt-orange mt-xxl-5 ff-lato fs-5 hvr-grow-shadow">Registrarse</button>
                </div>
            </div>
        </nav>
        <!--=========================-->
        <!--LINE BETWEEN SECTIONS-->
        <!--=========================-->
        <div class="container-sm text-success">
            <div class="row row-cols-1">
                <div class="col-sm">
                    <hr class="border border-dark border-1">
                </div>
            </div>
        </div>
        <!--==============================-->
        <!--LINE BETWEEN SECTIONS-->
        <!--==============================-->

        <!--==========================================-->
        <!--NAVBAR-->
        <!--==========================================-->

    <!--   =============================================== -->
    <!--    Our Selection for your week-->
    <!--   ===============================================-->

    <div class="container mt-0">
        <h3 class="text-center ff-lato fw-bold">Become The <span class="bg-orange">Chef</span></h3>
        <!--=========================-->
        <!--LINE BETWEEN SECTIONS-->
        <!--=========================-->
        <div class="container-sm text-success">
            <div class="row row-cols-1">
                <div class="col-sm">
                    <hr class="border border-dark border-1">
                </div>
            </div>
        </div>
        <!--=========================-->
        <!--LINE BETWEEN SECTIONS-->
        <!--=========================-->
    </div>

    <!--    ==================================================-->
    <!--    filters & search & acordeon & listofrecipes-->
    <!--    =================================================-->
        <!--            ======================-->
        <!--            ListOfRecipes-->
        <!--            =========================-->
       <div class="container">
           <?php
           if(count($results) > 0){
               echo "<h4 class='text-center mt-3'>".count($results)." results for <span class='fw-bolder'>".$results_message."</span></h4>";
           }else{
               echo "<h4 class='text-center mt-3'>No results for <span class='fw-bolder'>".$results_message."</span></h4>";
           }
           ?>
           <div class="col-lg-9 my-3">
            <div class="row row-cols-md-3">

                <?php


                $len = count($results);
                for ($i=0; $i<$len; $i++){
                    $img = $results[$i]["recipes_img"];
                    $name =$results[$i]["recipes_name"];
                    $timeRecipe =$results[$i]["recipes_total_time"];
                    $recipePortions =$results[$i]["recipes_portions"];
                    $complexityName =$results[$i]["complexity_name"];

                    echo "<div class = 'col-md-4'>";
                    echo "<div data-aos='flip-left' data-aos-duration='600'>";
                    echo "<div class='card mt-2'>";
                    echo "<a href=''#'>";
                    //                        Img de la receta
                    echo "<img src='./img/".$img.".png' class='card-img-top w-100' alt='".$name."'>";
                    echo "</a>";
                    echo "<div class='card-body'>";
                    echo "<div class='d-flex'>";
                    echo "<a class='text-decoration-none ff-lato fw-bold' href='#'>";
                    //                        Nombre de la receta
                    echo "<h5 class='card-text-title'>".$name."</h5>";
                    echo "</a>";
                    echo "</div>";
                    echo "<div class='d-flex justify-content-start'>";
                    echo "<i class='fa-solid fa-clock align-self-center'></i>";
                    //                        Tiempo de la receta
                    echo "<p class='card-text align-self-center card-text ff-lato ms-2'>".$timeRecipe."min</p>";
                    echo "</div>";
                    echo "<div class='d-flex justify-content-start'>";
                    echo "<i class='fa-solid fa-utensils align-self-center'></i>";
                    //                        Porciones
                    echo "<p class='card-text align-self-center card-text ff-lato ms-2'>".$recipePortions." Porciones</p>";
                    echo "</div>";
                    echo "<div class='d-flex justify-content-start'>";
                    echo "<i class='fa-solid fa-signal align-self-center'></i>";
                    //                        Dificultad
                    echo "<p class='card-text align-self-center card-text ff-lato ms-2'>".$complexityName."</p>";
                    echo "</div>";
                    echo "<div class='text-end'>";
                    echo "<a href='#' class='btn bt-orange btn-lg btn-warning text-center'>Ver receta</a>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";
                    echo "</div>";

                }

                ?>
            </div>
            <!--            ======================-->
            <!--            ListOfRecipes-->
            <!--            =========================-->
        </div>
       </div>
    <!--    =================================================-->
    <!--    FOOTER START-->
    <!--    =================================================-->
    <footer class="">

        <div class="container-fluid clr-black">

            <!--==============================-->
            <div class="col pt-3 pb-3 text-center border-bottom bg-transparent">
                <a href="#"><img src="./img/brand-white.png" alt="img-brand-white"></a>
            </div>

            <!--FIN DE LA PRIMERA COLUM-->
            <!--INICIO DE LA SEGUNDA COLUM-->
            <div class="row align-items-center">

                <!--INICIO ROW 02-->
                <div class="col pt-3 text-center">
                    <!--
                    <div class="row align-items-start">
                        <a class="text-white text-decoration-none" href="#">Síguenos</a>
                    </div>
                    -->
                    <div class="d-flex justify-content-center">
                        <div class="row my-3 d-flex me-5 hvr-bounce-in">
                            <a class="text-decoration-none clr-white icon-Facebook" href="#">
                                <i class="fa-brands fa-facebook-f"></i>
                                Facebook
                            </a>
                        </div>
                        <div class="row my-3 d-flex me-5 hvr-bounce-in">
                            <a class="text-white text-decoration-none icon-Instagram" href="#">
                                <i class="fa-brands fa-instagram"></i>
                                Instagram
                            </a>
                        </div>

                        <div class="row my-3 d-flex hvr-bounce-in">
                            <a class="text-decoration-none no-decorations-link clr-white icon-Twitter" href="#">
                                <i class="fa-brands fa-twitter"></i>
                                Twitter
                            </a>

                        </div>

                    </div>


                </div>

            </div>
            <!--FIN DE LA SEGUNDA COLUM-->
            <!--INICIO DE LA TERCER COLUM-->
            <div class="row pb-2 pt-3">

                <div class="col d-flex justify-content-center">
                    <a class="text-white text-decoration-none px-3 hvr-grow-shadow" href="#"> Home</a>

                    <div class="border-start px-3">
                        <a class="text-white text-decoration-none hvr-grow-shadow" href="#"> About Us</a>
                    </div>
                    <div class="border-start px-3">
                        <a class="text-white text-decoration-none hvr-grow-shadow" href="#"> Contact</a>
                    </div>
                </div>
            </div>
            <!--FIN DE LA TERCER COLUM-->

            <div class="row pb-4 pt-4 text-center">
                <div class="d-flex flex-column justify-content-center">
                    <p class="txt-terms mb-0">Copyright 2022</p>
                    <p class="txt-terms mt-0">proyecto ITM desarrollo de aplicaciones interactivas_TM4100</p>
                </div>

            </div>

        </div><!--FIN DEL CONTAINER-->


    </footer>



    <!--    =================================================-->
    <!--    FOOTER END-->
    <!--    =================================================-->
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.3/dist/js/splide.min.js"></script>
<!--Splide-->
<script src="js/_splide.js"></script>
<!--Splide autoScroll-->
<script src="https://cdn.jsdelivr.net/npm/@splidejs/splide-extension-auto-scroll@0.5.3/dist/js/splide-extension-auto-scroll.min.js"></script>
<script src="./js/_splide_autoScroll.js"></script>

<!--AOS ANIMATION-->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

<!--_index.js-->
<script src="js/_index_buttoms_href.js"></script>

</body>
</html>

