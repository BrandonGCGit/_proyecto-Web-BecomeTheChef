<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Become The Chef | Register</title>
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
  
  <!--  ===============================================================================================================================-->
  <!--  Nombre & SegundoNombre & PrimerApellido & SegundoApellido & Email & Usuario & Contraseña & ConfirmarContrasena & BtnRegistrarse-->
  <!--  ===============================================================================================================================-->
  <div class="vh-100">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-6 text-black">
          
          <div class="d-flex justify-content-center">
            <a href="../index.php">
              <img class="mt-2" src="../img/brand.png" alt="">
            </a>
          </div>
          
          <!--                  ==============================================================================================================-->
          <!--                  FORUMULARIO-->
          <!--                  ==============================================================================================================-->
          <div class="d-flex align-items-center h-custom-2 px-5 ms-xl-4 mt-3 pt-4 pt-xl-0 mt-xl-n5 justify-content-center">
            
            <form action="./_insert_user.php" method="post">
              
              <!--                                                    ========================-->
              <!--                                                    Nombre & SegundoNombre-->
              <!--                                                    ========================-->
              <div class="row row-cols-md-2">
                <div class="col-md-6">
                  <div class="mb-2">
                    <label for="register_name" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="register_name" placeholder="Nombre" name="register_name">
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-2">
                    <label for="register_secondName" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="register_secondName" placeholder="Segundo Nombre" name="register_secondName">
                  </div>
                </div>
              </div>
              <!--                                                    ========================-->
              <!--                                                    Nombre & SegundoNombre-->
              <!--                                                    ========================-->
              
              <!--                                                    =======================================-->
              <!--                                                    PrimerApellido & SegundoApellido-->
              <!--                                                    =======================================-->
              <div class="mb-2">
                <label for="register_lastName" class="form-label">Primer Apellido</label>
                <input type="text" class="form-control" id="register_lastName" placeholder="Primer apellido" name="register_lastName">
              </div>
              <div class="mb-2">
                <label for="register_secondSurname" class="form-label">Segundo Apellido</label>
                <input type="text" class="form-control" id="register_secondSurname" placeholder="Segundo apellido" name="register_secondSurname">
              </div>
              
              <!--                                                    =======================================-->
              <!--                                                    PrimerApellido & SegundoApellido-->
              <!--                                                    =======================================-->
              
              <!--                                                    ========================================-->
              <!--                                                    Email & Contraseña & ConfirmarContrasena & BtnRegistrarse-->
              <!--                                                    ========================================-->
              <div class="mb-2">
                <label for="register_email" class="form-label">Correo Electronico</label>
                <input type="email" class="form-control" id="register_email" placeholder="name@example.com" name="register_email">
              </div>
              <div class="mb-2">
                <label for="register_password" class="form-label">Contraseña</label>
                <input type="password" class="form-control" id="register_password" placeholder="Contraseña" name="register_password">
              </div>
              <div class="mb-2">
                <label for="register_passwordConfirmation" class="form-label">Confirmar Cotraseña</label>
                <input type="password" class="form-control" id="register_passwordConfirmation" placeholder="Contraseña" name="register_passwordConfirmation">
              </div>
              
              <div class="pt-1 mb-3">
                <button class="btn btn-dark btn-lg btn-block bt-orange" type="submit" value="SUBMIT">Registrarse</button>
              </div>
              <!--                                                    ========================================-->
              <!--                                                    Email & Contraseña & ConfirmarContrasena & BtnRegistrarse-->
              <!--                                                    ========================================-->
              
              
              <p class="mb-4">Ya tiene una cuenta? <a href="login.php" class="link-info">Iniciar Sesion</a></p>
  
              <p class="text-center fs-6 link-dark">Al unirte, aceptas los <a href="#!" class="link-dark">Términos y Política de privacidad</a></p>
            
            </form>
          
          </div>



          <!--                  ==============================================================================================================-->
          <!--                  FORUMULARIO-->
          <!--                  ==============================================================================================================-->
        
        </div>
        <!--        ==================================================-->
        <!--        BackGround IMG-->
        <!--        ==================================================-->
        <div class="col-sm-6 px-0 d-none d-sm-block">
          <img src="../img/background-register.png"
               alt="Login image" class="w-100 vh-100 img-optionsLogin">
        </div>
        <!--        ==================================================-->
        <!--        BackGround IMG-->
        <!--        ==================================================-->
      
      </div>
    </div>
  </div>
  <!--  ===============================================================================================================================-->
  <!--  Nombre & SegundoNombre & PrimerApellido & SegundoApellido & Email & Usuario & Contraseña & ConfirmarContrasena & BtnRegistrarse-->
  <!--  ===============================================================================================================================-->
</main>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>