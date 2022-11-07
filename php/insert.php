<?php

$pageName = basename($_SERVER['HTTP_REFERER']);

require 'db.php';

if(isset($_POST)){
    if (strcmp($pageName, "register_user") ){
        $database->insert("tb_users", [
            "name" => $_POST["register_name"],
            "second_name" => $_POST["register_secondName"],
            "last_name" => $_POST["register_lastName"],
            "second_surname" => $_POST["register_secondSurname"],
            "email" => $_POST["register_email"],
            "password" => $_POST["register_password"]
        ]);
    }

    if (strcmp($pageName, "register_recipe") ){
        $database->insert("tb_recipes", [
            "recipes_name" => $_POST["recipe_name"],
            "recipes_preparation_time" => $_POST["recipe_timePreparation"],
            "recipes_cooking_time" => $_POST["recipe_cookingTime"],
            "recipes_total_time" => $_POST["recipe_totalTime"],
            "recipes_isFeatured" => $_POST["recipe_isFeatured"],
            "recipes_portions" => $_POST["recipe_portions"],
            "likes_id" => $_POST["recipe_likes"],
            "recipes_description" => $_POST["recipe_description"],
            "recipes_list_ingredients" => $_POST["recipe_listIngredients"],
            "recipes_list_instructions" => $_POST["recipe_listInstructions"],
            "category_id" => $_POST["recipe_category"],
            "ocassion_id" => $_POST["recipe_occasion"],
            "recipes_preparation_time" => $_POST["recipe_img"],
            "complexity_id" => $_POST["recipe_complexity"]
        ]);
    }
}
?>