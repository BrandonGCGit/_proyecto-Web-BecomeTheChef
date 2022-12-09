<?php
require 'db.php';
   $resultado = "";
if($_POST){
//    var_dump($_POST);


    $email = $database -> select ("tb_users", "*",[
        "email" => $_POST["email"]
    ]);

    if(count($email) > 0){

        if (password_verify($_POST["password"], $email[0]["password"])){
//            echo "valid email and pass";

            session_start();
            $_SESSION["isLoggedIn"] = true;
            $_SESSION["email"] = $email[0]["email"];
            var_dump($_SESSION);
            header("location: ./admin.php");
//            echo "Para admin";
        }else{
            $resultado = "wrong email or password";
        }

    }else{
        $resultado = "Wrong email or password";
    }

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

    <section class="vh-100">
        <div class="container-fluid">
            <div class="row">
                <!--                ==========================================================-->
                <!--                IMG LOGIN-->
                <!--                ==========================================================-->
                <div class="col-sm-6 px-0 d-none d-sm-block">
                    <img src="../img/background-login.png"
                         alt="Login image" class="w-100 vh-100 img-optionsLogin">
                </div>
                <!--                ==========================================================-->
                <!--                IMG LOGIN-->
                <!--                ==========================================================-->

                <div class="col-sm-6 text-black">

                    <!--                    ===============================================-->
                    <!--                    IMG LOGOTIPO-->
                    <!--                    ===============================================-->
                    <div class="px-5 ms-xl-4">
                        <a href="../index.php">
                            <img class="mt-5" src="../img/brand.png" alt="">
                        </a>
                    </div>
                    <!--                    ===============================================-->
                    <!--                    IMG LOGOTIPO-->
                    <!--                    ===============================================-->
                    <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-5 pt-5 pt-xl-0 mt-xl-n5">

                        <!--                        =====================================================================================-->
                        <!--                        Forumulario-->
                        <!--                        =====================================================================================-->
                        <form action="./login.php" method="post">

                            <h3 class="fw-normal mb-3 pb-3">Iniciar Sesión</h3>

                            <div class="form-outline mb-4">
                                <input type="email" id="form2Example18" class="form-control form-control-lg" name="email"/>
                                <label class="form-label" for="form2Example18">Correo Electronico</label>
                            </div>

                            <div class="form-outline mb-4">
                                <input type="password" id="form2Example28" class="form-control form-control-lg" name="password"/>
                                <label class="form-label" for="form2Example28">Contraseña</label>
                            </div>
                            <div>
                                <?php
                                if ($resultado != ""){
                                    echo "<h4 class='ff-lato title-mdl text-danger alert-danger'>$resultado<h4>";
                                }
                                ?>
                            </div>
                            <div class="pt-1 mb-4">
                                <button id="btn-login-admin" type="submit" class="btn btn-outline-dark mt-xxl-5  ff-lato fs-5 hvr-grow-shadow">Iniciar Sesión</button>
                            </div>

                            <p class="small mb-5 pb-lg-2"><a class="text-muted" href="#!">Se le olvido la contraseña?</a></p>
                            <p>No tiene una cuenta? <a href="#!" class="link-info">Registrese aqui</a></p>

                        </form>
                        <!--                        =====================================================================================-->
                        <!--                        Forumulario-->
                        <!--                        =====================================================================================-->
                    </div>

                </div>
            </div>
        </div>
    </section>

</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<script src="../js/_login_buttoms_href.js"></script>
</body>
</html>