<?php

require 'db.php';

if(isset($_POST)){
    //var_dump($_POST);
    $database->insert("tb_users", [
        "name" => $_POST["register_name"],
        "second_name" => $_POST["register_secondName"],
        "last_name" => $_POST["register_lastName"],
        "second_surname" => $_POST["register_secondSurname"],
        "email" => $_POST["register_email"],
        "password" => $_POST["register_password"]
    ]);
}

?>
