<?php
require 'db.php';
//=================================================================
//DataBase recipe ID Start
//=================================================================
if(isset($_GET)){
    $data = $database->select("tb_recipes", "*", [
        "recipes_id" => $_GET["id"]
    ]);
}
//=================================================================
//DataBase recipe ID END
//=================================================================

//=================================================================
//Ingredients START
//=================================================================
$ingredients = "";
foreach ($_POST["ingredients"] as $key => $ingredient){
    if ($key == array_key_last($_POST["ingredients"])){
        $ingredients.= $ingredient;
    }else{
        $ingredients.= $ingredient.",";
    }
}
//=================================================================
//Ingredients END
//=================================================================


//=================================================================
//Steps START
//=================================================================
$steps = "";
foreach ($_POST["steps"] as $key => $step){
    if ($key == array_key_last($_POST["steps"])){
        $steps.= $step;
    }else{
        $steps.= $step.",";
    }
}
//=================================================================
//Steps END
//=================================================================

//=================================================================
//Random String START
//=================================================================
function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
//=================================================================
//Random String END
//=================================================================
if($_FILES["recipes_img"]["name"] == ""){
    //echo "no files";
    $img = $data[0]["recipes_img"];
}else{
    //echo "files";
    if(isset($_FILES["recipes_img"])){
        $errors = array();
        $file_name = $_FILES["recipes_img"]["name"];
        $file_size = $_FILES["recipes_img"]["size"];
        $file_tmp = $_FILES["recipes_img"]["tmp_name"];
        $file_type = $_FILES["recipes_img"]["type"];
        $file_ext_arr = explode(".", $_FILES["recipes_img"]["name"]);

        $file_ext = end($file_ext_arr);
        $img_ext = array("jpeg", "png", "jpg", "gif");

        if(!in_array($file_ext, $img_ext)){
            $errors[] = "File type is not supported";
        }

        if(empty($errors)){
            $img = "recipe-upload-".generateRandomString().".".$file_ext;
            move_uploaded_file($file_tmp, "images/".$img);
        }
    }
}
$database->update("tb_recipes", [
    "recipes_name" => $_POST["recipe_name"],
    "recipes_preparation_time" => $_POST["recipe_timePreparation"],
    "recipes_cooking_time" => $_POST["recipe_cookingTime"],
    "recipes_total_time" => $_POST["recipe_totalTime"],
    "recipes_portions" => $_POST["recipe_portions"],
    "recipes_description" => $_POST["recipe_description"],
    "recipes_list_ingredients" => $ingredients,
    "recipes_list_instructions" => $steps,
    "recipes_isFeatured" => $_POST["recipe_isFeatured"],
    "category_id" => $_POST["recipe_category"],
    "occasion_id" => $_POST["recipe_occasion"],
    "complexity_id" => $_POST["recipe_complexity"],
//            "recipes_img"=>$img,
    "recipes_likes" => $_POST["recipe_likes"],
], [
    "recipes_id" => $_POST["id"]
]);
//    }
header("location: ./admin.php");







//if(isset($_FILES["recipe_img"])) {
////    var_dump($_FILES);
////
////    $errors = array();
////    $file_name = $_FILES["recipe_img"]["name"];
////    $file_size = $_FILES["recipe_img"]["size"];
////    $file_tmp = $_FILES["recipe_img"]["tmp_name"];
////    $file_type = $_FILES["recipe_img"]["type"];
////    $file_ext_arr = explode(".", $_FILES["recipe_img"]["name"]);
////
////    $file_ext = end($file_ext_arr);
////    $img_ext = array("jpeg", "png", "jpg", "gif");
////
////    if (!in_array($file_ext, $img_ext)) {
////
////        $errors[] = "File type is not supported";
////    }
////
////
////    echo empty($errors);
////
////    if (empty($errors)) {
////        $img = "recipe-upload-" . generateRandomString() . "." . $file_ext;
////        move_uploaded_file($file_tmp, "../img/" . $img);
////        echo "Apunto de insertar";
////
////        echo "Insert";
////        var_dump($_POST);
////        echo $steps;
////        $database->update("tb_recipes", [
////            "recipes_name" => $_POST["recipe_name"],
////            "recipes_preparation_time" => $_POST["recipe_timePreparation"],
////            "recipes_cooking_time" => $_POST["recipe_cookingTime"],
////            "recipes_total_time" => $_POST["recipe_totalTime"],
////            "recipes_portions" => $_POST["recipe_portions"],
////            "recipes_description" => $_POST["recipe_description"],
////            "recipes_list_ingredients" => $ingredients,
////            "recipes_list_instructions" => $steps,
////            "recipes_isFeatured" => $_POST["recipe_isFeatured"],
////            "category_id" => $_POST["recipe_category"],
////            "occasion_id" => $_POST["recipe_occasion"],
////            "complexity_id" => $_POST["recipe_complexity"],
//////            "recipes_img"=>$img,
////            "recipes_likes" => $_POST["recipe_likes"],
////        ], [
////            "recipes_id" => $_POST["id"]
//        ]);
////    }
//        header("location: ./admin.php");
//
//
//    }
//
//
//}
?>