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
                <a class="navbar-brand  hvr-float-shadow" href="#"><img src="./img/brand.png" alt="Brand Become The Chef"></a>
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
                    <a href="./login.html">
                        <button type="button" class="btn btn-outline-dark mt-xxl-5 mx-xxl-4 ff-lato fs-5 hvr-grow-shadow">Iniciar Sesión</button>
                    </a>
                    <a href="php/register_user.php">
                        <button type="button" class="btn btn-outline-warning btn-lg   bt-orange mt-xxl-5 ff-lato fs-5 hvr-grow-shadow">Registrarse</button>
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


        <!--===============================-->
        <!--IMG TACOS HEADER-->
        <!--===============================-->
        <div class="container-sm ">
            <div class="row row-cols-1">
                <div class="col-sm">
                    <img class="img-fluid" src="./img/burritos.png" alt="">
                </div>
            </div>
        </div>
        <!--===============================-->
        <!--IMG TACOS HEADER-->
        <!--===============================-->

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

    </header>
    <!--    =======================-->
    <!--    NAVBAR & IMG TACO-->
    <!--    ======================-->


    <!--    ========================================-->
    <!--    LasMejores12RecetasDeLaSemana & CAROUSEL-->
    <!--    =======================================-->
    <section class="container-sm">

        <!--=====================================-->
        <!--LAS MEJORES 10 RECETAS DE LA SEMANA-->
        <!--=====================================-->
        <div class="container-sm">
            <div class="row d-flex text-center m-auto">

                <div class="col-sm-6 m-auto">
                    <h3 class="ff-lato fw-bold">Las <span class="bg-orange">Mejores</span> 12 Recetas de la semana</h3>
                </div>

            </div>
        </div>
        <!--=====================================-->
        <!--LAS MEJORES 10 RECETAS DE LA SEMANA-->
        <!--=====================================-->

        <!--===============================================-->
        <!--CARROUSEL-->
        <!--===============================================-->
        <section
                id="thumbnail-carousel"
                class="splide"
                aria-label="The carousel with thumbnails. Selecting a thumbnail will change the Beautiful Gallery carousel.">
            <div class="splide__track">
                <ul class="splide__list mb-1">
                    <li class="splide__slide">
                         <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </li>
                    <li class="splide__slide">
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </li>
                    <li class="splide__slide">
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </li>
                    <li class="splide__slide">
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </li>
                    <li class="splide__slide">
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </li>
                </ul>
            </div>
        </section>
        <!--===============================================-->
        <!--CARROUSEL-->
        <!--===============================================-->
    </section>
    <!--    ========================================-->
    <!--    LasMejores12RecetasDeLaSemana & CAROUSEL-->
    <!--    =======================================-->

    <!--   =============================================== -->
    <!--    Our Selection for your week-->
    <!--   ===============================================-->

    <div class="container mt-5">
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
        <h3 class="text-center ff-lato fw-bold"> Our selection for your week</h3>
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
    <section class="container my-5">
        <div class="row row-cols-lg-2 my-3">
            <div class="col-lg-3">
                <h3 class="ff-lato fw-bold"> Filters:</h3>
            </div>
            <div class="col-lg-9">
                <form class="d-flex" role="search">
                    <button class="btn" type="submit"><img src="./img/icono-lupa.png" alt=""></button>
                    <input class="form-control-lg ms-2 border-0 border-bottom br-0 bg-transparent w-100 border-dark opacity-50" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
        </div>
        <div class="row row-cols-lg-2">
            <!--            =======================-->
            <!--            FILTER & ACCORDION-->
            <!--            =======================-->
            <div class="col-lg-3">
                <!--    ===================================================-->
                <!--    ACCORDION-->
                <!--    ===================================================-->
                <div class="accordion" id="accordionPanelsStayOpenExample">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                            <button class="accordion-button ff-lato fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                Categoría
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                            <div class="accordion-body m-1 p-1 pt-3">
                                <div class="row row-cols-xl-auto">
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="button">tres</button>
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="button">Amus</button>
                                        <!--                                        <div class="card-optionsDefault text-center rounded-1">-->
                                        <!--                                            <div class="card-ciruculeDefault mt-3 pt-3">-->
                                        <!--                                                <img class="" src="./img/egg.png" alt="image of a egg">-->
                                        <!--                                            </div>-->
                                        <!--                                            <p class="text">Desayunos</p>-->
                                        <!--                                        </div>-->
                                    </div>
                                    <div class="col-md-4">
                                        <button type="button" class="btn btn-outline-dark" data-bs-toggle="button">Desayunos</button>
                                        <!--                                        <button type="button" class="btn btn-sm" data-bs-toggle="button">-->
                                        <!--                                            <div class="text-center rounded-1">-->
                                        <!--                                                <div class="mt-3 p-3 circule-cardOptions">-->
                                        <!--                                                    <img class="" src="./img/egg.png" alt="">-->
                                        <!--                                                </div>-->
                                        <!--                                                <p class="text-center">desayunos</p>-->
                                        <!--                                            </div>-->
                                        <!--                                        </button>-->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                            <button class="accordion-button collapsed ff-lato fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                Complejidad
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                            <div class="accordion-body m-2 p-1">
                                <div class="row row-cols-xl-auto">
                                    <div class="col-md-auto">
                                        <button type="button" class="btn btn-outline-dark my-1" data-bs-toggle="button">Desayunos</button>
                                    </div>
                                    <div class="col-md-auto">
                                        <button type="button" class="btn btn-outline-dark my-1" data-bs-toggle="button">Desayunos</button>
                                    </div>
                                    <div class="col-md-auto">
                                        <button type="button" class="btn btn-outline-dark my-1" data-bs-toggle="button">Desayunos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                            <button class="accordion-button collapsed ff-lato fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                Ocasiones
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                            <div class="accordion-body m-2 p-1">
                                <div class="row row-cols-xl-auto">
                                    <div class="col-md-auto">
                                        <button type="button" class="btn btn-outline-dark my-1" data-bs-toggle="button">Desayunos</button>
                                    </div>
                                    <div class="col-md-auto">
                                        <button type="button" class="btn btn-outline-dark my-1" data-bs-toggle="button">Desayunos</button>
                                    </div>
                                    <div class="col-md-auto">
                                        <button type="button" class="btn btn-outline-dark my-1" data-bs-toggle="button">Desayunos</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--    ===================================================-->
                <!--    ACCORDION-->
                <!--    ===================================================-->
            </div>
            <!--            =======================-->
            <!--            FILTER & ACCORDION-->
            <!--            =======================-->



            <!--            ======================-->
            <!--            ListOfRecipes-->
            <!--            =========================-->
            <div class="col-lg-9 my-3">
                <div class="row row-cols-md-3">
                    <div class="col-md-4">
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2 hvr-curl-top-right">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </div>
                    <div class="col-md-4">
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </div>
                    <div class="col-md-4">
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </div>
                    <div class="col-md-4">
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                        <div data-aos="flip-left" data-aos-duration='600'>
                            <div class="card mt-2">
                            <a href="#">
                                <img src="./img/pancake.png" class="card-img-top" alt="pancakes">
                            </a>
                            <div class="card-body">
                                <!--**********************************************-->
                                <div class="d-flex">
                                    <a class="text-decoration-none ff-lato fw-bold" href="#">
                                        <h5 class=" card-text-title">Pancakes</h5>
                                    </a>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-clock align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">15 Min</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-utensils align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">20 Porciones</p>
                                </div>
                                <!--**********************************************-->
                                <div class="d-flex justify-content-start">
                                    <i class="fa-solid fa-signal align-self-center"></i>
                                    <p class="card-text align-self-center card-text ff-lato ms-2">Fácil</p>
                                </div>
                                <!--**********************************************-->
                                <div class="text-end">
                                    <a href="#" class="btn bt-orange btn-lg btn-primary text-center">Ver receta</a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <!--===================-->
                        <!--CARD-->
                        <!--===================-->
                    </div>
                </div>
            </div>
            <!--            ======================-->
            <!--            ListOfRecipes-->
            <!--            =========================-->
        </div>
    </section>
    <!--    ==================================================-->
    <!--    filters & search & acordeon & listofrecipes-->
    <!--    =================================================-->


    <!--   =============================================== -->
    <!--    Our Selection for your week-->
    <!--   ===============================================-->


    <!--    =================================================-->
    <!--    FOOTER-->
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
                            <div class="row my-3 d-flex me-5 link-social-media">
                                <a class="text-white text-decoration-none" href="#">
                                    <i class="fa-brands fa-facebook-f"></i>
                                    Facebook
                                </a>
                            </div>
                            <div class="row my-3 d-flex me-5 link-social-media">
                                <a class="text-white text-decoration-none" href="#">
                                    <i class="fa-brands fa-instagram"></i>
                                    Instagram
                                </a>
                            </div>
                            
                                <div class="row my-3 d-flex link-social-media">
                                    <a class="text-white text-decoration-none" href="#">
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
                            <a class="text-white text-decoration-none px-3 link-trans" href="#"> Home</a>

                        <div class="border-start px-3">
                            <a class="text-white text-decoration-none link-trans" href="#"> About Us</a>
                        </div>
                        <div class="border-start px-3">
                            <a class="text-white text-decoration-none link-trans" href="#"> Contact</a>
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
    <!--    FOOTER-->
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

</body>
</html>
