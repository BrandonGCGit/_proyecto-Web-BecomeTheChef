<?php
require 'db.php';

//Iniio de ssion
session_start();
if (isset($_SESSION["isLoggedIn"])){
    //    Aqui va todo lo que se tiene que ejecutar
    $data= $database->select("tb_recipes",[
        "[>]tb_category"=>["category_id" => "category_id"],
        "[>]tb_occasion"=>["occasion_id" => "occasion_id"],
        "[>]tb_complexity"=>["complexity_id" => "complexity_id"],
    ],[
        "tb_recipes.recipes_id",
        "tb_recipes.recipes_name",
        "tb_category.category_name",
        "tb_occasion.occasion_name",
        "tb_complexity.complexity_name"
    ]);

}else{
    //    Si no estan logeados se tiene que redirectionar
    header("location: login.php");
}



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

    <!--    CSS-->
    <link rel="stylesheet" href="../main.css">
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
                <a class="navbar-brand  hvr-float-shadow" href="../index.php"><img src="../img/brand.png" alt="Brand Become The Chef"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <a href="../miCuenta.html">
                        <button id="btn-login" type="button" class="btn btn-outline-dark mt-xxl-5 mx-xxl-4 ff-lato fs-5 hvr-grow-shadow"><?php echo $_SESSION["email"] ?></button>
                    </a>
                    <a href="./logout.php">
                        <button id="btn-register" type="button" class="btn btn-outline-warning btn-lg   bt-orange mt-xxl-5 ff-lato fs-5 hvr-grow-shadow">logout</button>
                    </a>
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


    <div class="container">
        <div class="row row-cols-1 mb-3">
            <!--            ===========================-->
            <!--            Accordion-->
            <!--            ===========================-->
            <div class="col-md">
                <div class="row row-cols">
                    <div class="col-md d-flex justify-content-end">
                        <a href="./register_recipe.php">
                            <img src="../img/plus-icon.png" alt="plus-icon">
                        </a>
                    </div>
                </div>
            </div>
            <!--            ===========================-->
            <!--            Accordion-->
            <!--            ===========================-->
        </div>
        <div class="row row-cols-1">

            <div class="col-md">
                <table class="table table-light table-striped table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Ocasion</th>
                        <th scope="col">Complejidad</th>
                        <th scope="col">Opciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    <!--===============================-->
                    <!--RECIPE START-->
                    <!--================================-->
                    <tr>
                        <th scope="row"><i class='fa-solid fa-utensils me-2'></i>Arroz con pollo</th>
                        <td>Breakfast</td>
                        <td>Navidad</td>
                        <td>Medio</td>
                        <td>
                            <a href="#"><i class='fa-solid fa-trash pe-3'></i></a>
                            <a href="#"><i class='fa-solid fa-pen-to-square ps-3'></i></a>
                        </td>
                    </tr>
                    <!--===============================-->
                    <!--RECIPE END-->
                    <!--================================-->
                    </tbody>
                    <?php
                    $len = count($data);

                    for($i=0; $i<$len; $i++){
                        echo "<th scope='row'><i class='fa-solid fa-utensils me-2'></i>".$data[$i]["recipes_name"]."</th>";
                        echo "<td>".$data[$i]["category_name"]."</td>";
                        echo "<td>".$data[$i]["occasion_name"]."</td>";
                        echo "<td>".$data[$i]["complexity_name"]."</td>";
                        echo "<td><a href='./_delete.php?id=".$data[$i]["recipes_id"]."'><i class='fa-solid fa-trash pe-3'></i></a>
                                                        <a href='_recipes_edit.php?id=".$data[$i]["recipes_id"]."'><i class='fa-solid fa-pen-to-square ps-3'></i></a></td>";

                        echo "</tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<!--FLICKITY-->
<script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

<!--Atomiks-->
<!-- Development -->
<script src="https://unpkg.com/@popperjs/core@2/dist/umd/popper.min.js"></script>
<script src="https://unpkg.com/tippy.js@6/dist/tippy-bundle.umd.js"></script>
<script src="./js/_tippy.js"></script>
</body>
</html>
