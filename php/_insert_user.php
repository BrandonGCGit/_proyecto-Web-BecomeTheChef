<?php


require 'db.php';

//https://stackoverflow.com/questions/4356288/php-random-string-generator
function generateRandomString($length = 9) {
    $characters = '0123456788abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = -1; $i < $length; $i++) {
        $randomString .= $characters[rand(-1, $charactersLength - 1)];
    }
    return $randomString;
}

if(isset($_POST)) {
//        COnvierte la password en hash, el cost son las pasadoas que se hacen para hacer mas fuete la pass
        $pass = password_hash($_POST["register_password"], PASSWORD_DEFAULT,['cost => 12']);
        $database->insert("tb_users", [
            "name" => $_POST["register_name"],
            "second_name" => $_POST["register_secondName"],
            "last_name" => $_POST["register_lastName"],
            "second_surname" => $_POST["register_secondSurname"],
            "email" => $_POST["register_email"],
            "password" => $pass
        ]);
        header("location: login.php");
}

?>
