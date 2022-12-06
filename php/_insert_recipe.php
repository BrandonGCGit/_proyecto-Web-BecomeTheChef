<?php

$pageName = basename($_SERVER['HTTP_REFERER']);

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
    if (!strcmp($pageName, "register_user") ){
        echo $pageName;

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
    }

    $ingredients = "";
    foreach ($_POST["ingredients"] as $key => $ingredient){
        if ($key == array_key_last($_POST["ingredients"])){
            $ingredients.= $ingredient;
        }else{
            $ingredients.= $ingredient.",";
        }
    }


    $steps = "";
    foreach ($_POST["steps"] as $key => $step){
        if ($key == array_key_last($_POST["steps"])){
            $steps.= $step;
        }else{
            $steps.= $step.",";
        }
    }

    if (strcmp($pageName, "register_recipe") ){



        if(isset($_FILES["recipe_img"])){

            $errors = array();
            $file_name = $_FILES["recipe_img"]["name"];
            $file_size = $_FILES["recipe_img"]["size"];
            $file_tmp = $_FILES["recipe_img"]["tmp_name"];
            $file_type = $_FILES["recipe_img"]["type"];
            $file_ext_arr = explode(".", $_FILES["recipe_img"]["name"]);

            $file_ext = end($file_ext_arr);
            $img_ext = array("jpeg", "png", "jpg", "gif");

            if(!in_array($file_ext, $img_ext)){
                $errors[] = "File type is not supported";
            }



            echo empty($errors);
            if(empty($errors)){
                $img = "recipe-upload-".generateRandomString().".".$file_ext;
                move_uploaded_file($file_tmp, "../img/".$img);
                echo "A punto de insert";
                $database->insert("tb_recipes", [
//                    "recipes_name" => "Brandon",
                    "recipes_name" => $_POST["recipe_name"],
//                    "recipes_preparation_time" => "2min",
                    "recipes_preparation_time" => $_POST["recipe_timePreparation"],
//                    "recipes_cooking_time" => "43min",
                    "recipes_cooking_time" => $_POST["recipe_cookingTime"],
//                    "recipes_total_time" => "34min",
                    "recipes_total_time" => $_POST["recipe_totalTime"],
//                    "recipes_isFeatured" => "0",
                    "recipes_isFeatured" => (int)$_POST["recipe_isFeatured"],
//                    "recipes_portions" => "9",
                    "recipes_portions" => $_POST["recipe_portions"],
//                    "recipes_description" => "SUPER DESCRIPTIO",
                    "recipes_description" => $_POST["recipe_description"],
//                    "recipes_list_ingredients" => "Super ingredientes",
                    "recipes_list_ingredients" => $ingredients,
//                    "recipes_list_instructions" => "super instructiosn",
                    "recipes_list_instructions" => $steps,
//                    "category_id" =>  1,
                    "category_id" =>  (int)$_POST["recipe_category"],
//                    "occasion_id" =>  1,
                    "occasion_id" =>  (int)$_POST["recipe_occasion"],
//                    "complexity_id" => 1,
                    "complexity_id" =>  (int)$_POST["recipe_complexity"],
//                    "likes_id" => 1,
//                    "likes_id" => (int)$_POST["recipe_likes"],
//                    "recipes_img" => "IMG"
                    "recipes_img" => $img
                ]);

                echo "A punto de insert";
                    header("location: register_recipe.php");
            }


        }



    }
}

?>