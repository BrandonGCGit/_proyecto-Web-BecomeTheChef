<?php
    require 'db.php';

    if(isset($_GET)){
        
        if(isset($_GET)){
            $data_recipes = $database->select("tb_recipes", "*", [
                "recipes_id" => $_GET["id"]
            ]);
        }

        
        $likes = $data_recipes[0]["recipes_likes"];
        $likes++;

            

        $database->update("tb_recipes",[
            "recipes_likes" => $likes
        ],[
            "recipes_id"=>$_GET["id"]
        ]);

        /*header("location: front-receta.php");*/
		header('Location: ' . $_SERVER['HTTP_REFERER']);
		exit;

    }
?>