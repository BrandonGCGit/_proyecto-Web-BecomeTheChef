<?php
    require 'db.php';
    //https://simplehtmldom.sourceforge.io/docs/1.9/
    include('simple_html_dom.php');

    //https://stackoverflow.com/questions/4356289/php-random-string-generator
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    //f($_POST){

        $links =["https://www.bonviveur.es/recetas/ensaladilla-rusa-casera",
        "https://www.bonviveur.es/recetas/tortilla-francesa"
        ];

        
        //https://geonode.com/free-proxy-list/
        $proxyurl = '81.95.232.73:3128';

        $context = stream_context_create();
        stream_context_set_params($context, array(
            'proxy' => $proxyurl,
            'ignore_errors' => true, 
            'max_redirects' => 3)
        );


        for($i=0; $i<count($links); $i++){

            $recipe = []; 
            $ingredients = [];
            $directions = [];
            
            $detailed_recipe = file_get_html($links[$i], 0, $context);

            //NOMBRE TITULO DE LA RECETA
            $data['name'] = $detailed_recipe->find('h1',0)->plaintext;
            
            //IMG DE LA RECETA
            //$finalimg
            $image = $detailed_recipe->find('.single__image img',0);
            if($image == null){
                $data['image'] = "no image";
            }else {
                $data['image'] = $image->src;
                file_put_contents("./images/recipe-".generateRandomString().".png",file_get_contents($image->src));
            }


            /* */






            //DESCRIPCION DE LA RECETA
            $data['description'] = $detailed_recipe->find('.single__subtitle', 0)->plaintext;
        
            //INFO DE LA RECETA
            $data['preptime'] = $detailed_recipe->find('ul', 1)->find('li',0)->plaintext;
            $data['cooktime'] = $detailed_recipe->find('ul', 1)->find('li',1)->plaintext;
            $data['totaltime'] = $detailed_recipe->find('ul', 1)->find('li',2)->plaintext;
            $data['portions'] = $detailed_recipe->find('ul', 1)->find('li',3)->plaintext;
        

        
            $totalingredientes="";
            //INGREDIENTES DE LA RECETA
            foreach($detailed_recipe->find('ul', 2)->find('li') as $ingredient){
                $ingredients[] = $ingredient->plaintext;
            }
            $data['ingredients'] = $ingredients;
            foreach ($data["ingredients"] as $key => $ingredient) {
                if($key == array_key_last($data["ingredients"])){
                    $totalingredientes.= $ingredient;
                }else{
                    $totalingredientes.= $ingredient.",";
                }
            }
           





            //PASOS DE LA RECETA
            $totalsteps="";
            foreach($detailed_recipe->find('.main ol li') as $direction){
                $directions[] = $direction->plaintext;
            }
            $data['directions'] = $directions;
            foreach ($data['directions'] as $key => $direction) {
                if($key == array_key_last($data['directions'])){
                    $totalsteps.= $direction;
                }else{
                    $totalsteps.= $direction.",";
                }
            }
        
            // Reference: https://medoo.in/api/insert
           /* $database->insert("tb_recipes",[
                "recipes_name"=>$data['name'],
                "recipes_description"=>$data['description'],
                "recipes_preparation_time"=>trim($data['preptime']),
                "recipes_cooking_time"=>trim($data['cooktime']),
                "recipes_total_time"=>trim($data['preptime']),
                "recipes_portions"=>trim($data['portions']),
                "recipes_list_ingredients"=>$data['ingredients'],
                "recipes_list_instructions"=>$data['directions'],
                "category_id"=>"1", 
                "occasion_id"=>"1",
                "complexity_id"=>"1",
                "likes_id"=>"0" 
                
            ]);*/

            $database->insert("tb_recipes", [
                //                    "recipes_name" => "Brandon",
                                    "recipes_name" => $data['name'],
                //                    "recipes_preparation_time" => "2min",
                                    "recipes_preparation_time" => trim($data['preptime']),
                //                    "recipes_cooking_time" => "43min",
                                    "recipes_cooking_time" => trim($data['cooktime']),
                //                    "recipes_total_time" => "34min",
                                    "recipes_total_time" => trim($data['totaltime']),
                //                    "recipes_isFeatured" => "0",
                                    "recipes_isFeatured" => "1",
                //                    "recipes_portions" => "9",
                                    "recipes_portions" => trim($data['portions']),
                //                    "recipes_description" => "SUPER DESCRIPTIO",
                                    "recipes_description" => $data['description'],
                //                    "recipes_list_ingredients" => "Super ingredientes",
                                    "recipes_list_ingredients" => $totalingredientes,
                //                    "recipes_list_instructions" => "super instructiosn",
                                    "recipes_list_instructions" => $totalsteps,
                //                    "category_id" =>  1,
                                    "category_id" =>  "1",
                //                    "occasion_id" =>  1,
                                    "occasion_id" =>  "1",
                //                    "complexity_id" => 1,
                                    "complexity_id" =>  "1"
                //                    "likes_id" => 1,
                //                    "likes_id" => (int)$_POST["recipe_likes"],
                //                    "recipes_img" => "IMG"
                                    //"recipes_img" => $img
                                ]);
            $recipe[] = $data;

            var_dump($recipe);
        
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data scrapping</title>
</head>
<body>
    <form action="scrapper.php" method="post">
        <label for="link">URL</label>    
        <input name="link" type="text">
        <input type="submit" value="GET DATA">
    </form>
    <a href="https://www.bonviveur.es/recetas/tag/pocos-ingredientes/" target="blank">Recipes</a>
</body>
</html>