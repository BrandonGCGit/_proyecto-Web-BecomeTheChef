<?php

require './php/db.php';
//var_dump($_GET);

//EDITAR
if(isset($_GET)){
    $data_recipes = $database->select("tb_recipes", "*", [
        "recipes_id" => $_GET["id"]
    ]);
}

//var_dump($data_recipes);

$data_Category = $database->select("tb_category", "*");
$data_Complexity = $database->select("tb_complexity", "*");
$data_Occasion = $database->select("tb_occasion", "*");
$category_relacionada = $data_Category[0]["category_id"];


$recetas_relacionadas = $database->query("SELECT <recipes_id>,
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
                                    WHERE <tb_category.category_id> = $category_relacionada 
                                    ORDER BY <recipes_likes> 
                                        DESC LIMIT 4")->fetchAll();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
        <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta</title>
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
    <link rel="stylesheet" href="main.css">
</head>

<body>

<header>
    <!--==========================================-->
    <!--NAVBAR-->
    <!--==========================================-->
    <nav class="navbar navbar-expand-xxl ff-NotoSerif fw-bold">
        <div class="container">
            <a class="navbar-brand  hvr-float-shadow" href="index.php"><img src="./img/brand.png" alt="Brand Become The Chef"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-xxl-around" id="navbarSupportedContent">
                <form class="d-flex mt-xxl-5" role="search">
                    <button class="btn border-0" type="submit"><img src="./img/icons8-búsqueda-30%201.png" alt=""></button>
                    <input class="form-control-lg ms-2 border-0 border-bottom br-0 bg-transparent border-dark opacity-50" type="search" placeholder="Search" aria-label="Search">
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
</header>

<!--==========================================-->
<!--RECIPE TOP DESCRIPTION-->
<!--==========================================-->

<section class="container mt-5">

    <!--==========================================-->
    <!--RECIPE CARD TOP DESCRIPTION-->
    <!--==========================================-->

    <div class="card mb-3 no-border">
        <div class="row g-0">
            <!--////////RECIPE TOP IMG///////-->
            <div class="col-md-8">
                <img class="img-fluid rounded-start" <?php echo "<img src='./img/".$data_recipes[0]["recipes_img"].".png"."' alt='".$data_recipes[0]["recipes_name"]."'"; ?>>
                <div class="d-flex justify-content-between mt-3">
                    <div class="d-flex">
                        <div class="p-2 d-flex data-txt-rg">
                            <a type="button" href="./php/likes.php?id=<?php echo $data_recipes[0]["recipes_id"];?>" class="like-btn icon-line-height fa-solid fa-thumbs-up"></a>
                            <p class="px-2"><?php echo $data_recipes[0]["recipes_likes"]?></p>
                        </div>
                        
                    </div>

                    <div class="d-flex">
                        <div class="p-2 data-icon-rg">
                            <i class="fa-regular fa-bookmark"></i>
                        </div>

                        <div class="p-2 data-icon-rg">
                            <i class="fa-solid fa-share"></i>
                        </div>
                    </div>
                </div>
            </div>
            <!--////////RECIPE TOP IMG///////-->

            <!--==========================================-->
            <!--RECIPE DESCRIPTION SECTION-->
            <!--==========================================-->
            <div class="col-md-4">
                <div class="align-card-body card-body">
                    <h5 class="card-title text-md-yellow mb-0">Recetas Destacadas</h5>
                </div>

                <!--==========================================-->
                <!--RECIPE DESCRIPTION CARD BODY-->
                <!--==========================================-->
                <div class="align-card-body card-body">
                    <div class="d-flex">
                        <h5 class="recipe-title card-title"><?php echo $data_recipes[0]["recipes_name"]; ?></h5>
                    </div>
                    <!--**********************************************-->

                    <p class="body-recipe-text">
                        <?php echo $data_recipes[0]["recipes_description"]?>
                    </p>
                    <!--**********************************************-->
                    <div class="d-flex justify-content-start">
                        <i class="fa-solid fa-clock align-self-center"></i>
                        <p class="data-text-rg card-text"><?php echo $data_recipes[0]["recipes_total_time"]?></p>
                    </div>
                    <!--**********************************************-->
                    <div class="d-flex justify-content-start">
                        <i class="fa-solid fa-utensils align-self-center"></i>
                        <p class="data-text-rg card-text"><?php echo $data_recipes[0]["recipes_portions"]?></p>
                    </div>
                    <!--**********************************************-->
                    <div class="d-flex justify-content-start">
                        <i class="fa-solid fa-signal align-self-center"></i>
                        <p class="data-text-rg card-text"><?php echo $data_Complexity[0]["complexity_name"]?></p>
                    </div>







                </div>


                <!--==========================================-->
                <!--RECIPE DESCRIPTION CARD BODY-->
                <!--==========================================-->

            </div>
            <!--==========================================-->
            <!--RECIPE DESCRIPTION SECTION-->
            <!--==========================================-->
        </div>

    </div>


    <!--==========================================-->
    <!--RECIPE CARD TOP DESCRIPTION-->
    <!--==========================================-->
</section>
<!--==========================================-->
<!--END RECIPE TOP DESCRIPTION-->
<!--==========================================-->

<!--==========================================-->
<!--SHOW RECIPE FILTERS-->
<!--==========================================-->

<div class="container">

    <!--Section filters title-->
    <div class="container-sm text-success">
        <p class="text-md-gray mb-0">Filtros</p>
    </div>
    <!--Section filters title-->
    <!--bottom line-->
    <div class="row row-cols-1">
        <div class="col-sm">
            <hr class="border border-dark border-1">
        </div>
    </div>
    <!--bottom line-->

    <!-- filters section-->
    <div class="container-sm">
        <div class="row-cols-1">
            <div class="line-img col d-flex">
                <i class="txt-filters me-4 filters-bg p-3"><?php echo $data_Category[0]["category_name"]?></i>
                <i class="txt-filters me-4 filters-bg p-3"><?php echo $data_Occasion[0]["occasion_name"]?></i>
                <i class="txt-filters me-4 filters-bg p-3"><?php echo $data_Complexity[0]["complexity_name"]?></i>
            </div>
        </div>
    </div>
    <!-- filters section-->
</div>
<!--==============================-->
<!--END FILTER'S SECTION-->
<!--==============================-->
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

<!--==============================-->
<!--ACORDION SECTION-->
<!--==============================-->

<div class="container">

    <div class="accordion mb-5" id="accordionPanelsStayOpenExample">

        <!--/////////////////////////////////////////////////////////////////////////-->
        <!--/////////////////////////////////////////////////////////////////////////-->
        <!--//////////////////////////////DESCRIPCION///////////////////////////////////////////-->
        <div class="accordion-item only-a-border">
            <h3 class="btn-acc accordion-header" id="panelsStayOpen-headingOne">
                <button class="text-rg-gray accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true"
                        aria-controls="panelsStayOpen-collapseOne">
                    Descripcion
                </button>
            </h3>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse"
                 aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body">
                    <p class="body-recipe-text"><?php echo $data_recipes[0]["recipes_description"]?></p>
                </div>
            </div>
        </div>
        <!--//////////////////////////////FIN DESCRIPCION///////////////////////////////////////////-->
        <!--/////////////////////////////////////////////////////////////////////////-->
        <!--////////////////////////////////LISTA DE INGREDIENTES/////////////////////////////////////////-->
        <div class="accordion-item only-a-border">
            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                <button class="text-rg-gray accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                    Lista de Ingredientes
                </button>
            </h2>
            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                 aria-labelledby="panelsStayOpen-headingTwo">
                <div class="accordion-body">
                    <lu>

                    <?php 
                         $ingredients = [];
                         $ingredients = explode(",", $data_recipes[0]["recipes_list_ingredients"]);
                                                
                            foreach ($ingredients as $key => $ingredient){
                                if($key != array_key_last($ingredients)){
                                    echo "<div class = 'form-check d-flex'>";
                                    echo "<input class='form-check-input' type='checkbox'";
                                    echo "<label class='form-check-label d-flex'></label>";
                                    echo "<i class='icon-line-height fa-solid fa-utensils mx-1'></i>";
                                    echo "<p class= 'text-ing'>".$ingredient."</p>";
                                    echo "</div>";
                                }
                            }

                    ?>

                        </lu>
                </div>
            </div>
        </div>
        <!--/////////////////////////////////FIN DE LA LISTA DE INGREDIENTES////////////////////////////////////////-->
        <!--/////////////////////////////////////////////////////////////////////////-->
        <!--//////////////////////////////////INSTRUCCIONES///////////////////////////////////////-->
        <div class="accordion-item only-a-border">
            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                <button class="text-rg-gray accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                    Instrucciones para la preparación
                </button>
            </h2>
            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                 aria-labelledby="panelsStayOpen-headingThree">
                <div class="accordion-body">
                        <ul>
                            <?php 
                                $directions = [];
                                $directions = explode(",", $data_recipes[0]["recipes_list_instructions"]);
                                            
                                    foreach ($directions as $key => $direction){
                                        if($key != array_key_last($directions)){
                                            echo "<li class= 'm-1'>".$direction."</li>";
                                        }
                                    }

                            ?>
                        </ul>
                </div>
            </div>
        </div>

        <!--/////////////////////////////////////////////////////////////////////////-->
        <!--/////////////////////////////////////////////////////////////////////////-->
        <!--/////////////////////////////////////////////////////////////////////////-->
    </div>

    <div class="container text-center mb-5">
        <p class="text-md-yellow">Recetas Relacionadas</p>

        <div class="row align-items-start">
            <!--//////////////////////-->

            <?php
            $len = count($recetas_relacionadas);
            //$recipes = $database->select("tb_recipes","*");
            for ($i=0; $i<$len; $i++){
                $img = $recetas_relacionadas[$i]["recipes_img"];
                $name =$recetas_relacionadas[$i]["recipes_name"];
                $timeRecipe =$recetas_relacionadas[$i]["recipes_total_time"];
                $recipePortions =$recetas_relacionadas[$i]["recipes_portions"];
                $complexityName =$recetas_relacionadas[$i]["complexity_name"];
                $recipeid= $recetas_relacionadas[$i]["recipes_id"];

                echo "<div class = 'col'>";
                echo "<div data-aos='flip-left' data-aos-duration='600'>";
                echo "<div class='card mt-2'>";
                echo "<a href='./front-receta.php?id=".$recipeid."'>";
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
                echo "<p class='card-text align-self-center card-text ff-lato ms-2'>".$timeRecipe."</p>";
                echo "</div>";
                echo "<div class='d-flex justify-content-start'>";
                echo "<i class='fa-solid fa-utensils align-self-center'></i>";
//                        Porciones
                echo "<p class='card-text align-self-center card-text ff-lato ms-2'>".$recipePortions."</p>";
                echo "</div>";
                echo "<div class='d-flex justify-content-start'>";
                echo "<i class='fa-solid fa-signal align-self-center'></i>";
//                        Dificultad
                echo "<p class='card-text align-self-center card-text ff-lato ms-2'>".$complexityName."</p>";
                echo "</div>";
                echo "<div class='text-end'>";
                echo "<a href='front-receta.php?id=".$recipeid."' class='btn bt-orange btn-lg btn-warning text-center'>Ver receta</a>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
                echo "</div>";
//

            }

            ?>
        </div>


    </div>
    <!--FIN DEL CONTAINER-->
</div>
    <!--==============================-->
    <!--ACORDION SECTION-->
    <!--==============================-->

    <!--    =================================================-->
    <!--    FOOTER START-->
    <!--    =================================================-->
    <footer>

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


</div>



<!--/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////-->
<!--    BOOTSTRAP-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
<script src="js/_index_buttoms_href.js"></script>
</body>

</html>