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
        "https://www.bonviveur.es/recetas/tortilla-francesa",
        "https://www.bonviveur.es/recetas/sandwich-mixto",
        "https://www.bonviveur.es/recetas/huevos-fritos",
        "https://www.bonviveur.es/recetas/patatas-importancia",
        "https://www.bonviveur.es/recetas/caballa-con-tomate",
        "https://www.bonviveur.es/recetas/tarta-pina",
        "https://www.bonviveur.es/recetas/souffle-de-chocolate",
        "https://www.bonviveur.es/recetas/tortitas-de-platano",
        "https://www.bonviveur.es/recetas/caldo-dashi",
        "https://www.bonviveur.es/recetas/fingers-de-queso",
        "https://www.bonviveur.es/recetas/gambas-a-la-gabardina",
        "https://www.bonviveur.es/recetas/helado-de-leche-condensada",
        "https://www.bonviveur.es/recetas/batido-de-sandia",
        "https://www.bonviveur.es/recetas/pure-de-zanahoria",
        "https://www.bonviveur.es/recetas/provolone-al-horno",
        "https://www.bonviveur.es/recetas/batido-de-melon",
        "https://www.bonviveur.es/recetas/flan-de-platano",
        "https://www.bonviveur.es/recetas/batido-de-fresa-y-platano",
        "https://www.bonviveur.es/recetas/dorada-a-la-plancha",
        "https://www.bonviveur.es/recetas/salmon-a-la-plancha",
        "https://www.bonviveur.es/recetas/fritos-de-rape-o-de-pixin",
        "https://www.bonviveur.es/recetas/muslos-de-pollo-al-horno",
        "https://www.bonviveur.es/recetas/uvas-rellenas-de-queso",
        "https://www.bonviveur.es/recetas/tarta-de-yogur-griego",
        "https://www.bonviveur.es/recetas/solomillo-de-ternera-a-la-plancha",
        "https://www.bonviveur.es/recetas/crema-de-espinacas",
        "https://www.bonviveur.es/recetas/gelatina-de-limon",
        "https://www.bonviveur.es/recetas/guisantes-con-jamon",
        "https://www.bonviveur.es/recetas/peras-al-vino-tinto",
        "https://www.bonviveur.es/recetas/ensalada-de-macarrones-fria",
        "https://www.bonviveur.es/recetas/sunomono",
        "https://www.bonviveur.es/recetas/patatas-chips-fritas",
        "https://www.bonviveur.es/recetas/tarta-de-queso-y-limon-fria-sin-horno",
        "https://www.bonviveur.es/recetas/tarta-de-moka-y-galletas",
        "https://www.bonviveur.es/recetas/bocadillo-almussafes",
        "https://www.bonviveur.es/recetas/limonada",
        "https://www.bonviveur.es/recetas/patacones-tostones",
        "https://www.bonviveur.es/recetas/esparragos-trigueros-a-la-plancha",
        "https://www.bonviveur.es/recetas/ensalada-de-pepino",
        "https://www.bonviveur.es/recetas/ensalada-de-tomate",
        "https://www.bonviveur.es/recetas/crema-de-aguacate",
        "https://www.bonviveur.es/recetas/huevos-fritos-con-farinato"];

        
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
            $image = $detailed_recipe->find('.single__image img',0);
            if($image == null){
                $data['image'] = "no image";
            }else {
                $data['image'] = $image->src;
                file_put_contents("./images/recipe-".generateRandomString().".png",file_get_contents($image->src));
            }

            //DESCRIPCION DE LA RECETA
            $data['description'] = $detailed_recipe->find('.single__subtitle', 0)->plaintext;
        
            //INFO DE LA RECETA
            $data['preptime'] = $detailed_recipe->find('ul', 1)->find('li',0)->plaintext;
            $data['cooktime'] = $detailed_recipe->find('ul', 1)->find('li',1)->plaintext;
            $data['totaltime'] = $detailed_recipe->find('ul', 1)->find('li',2)->plaintext;
            $data['portions'] = $detailed_recipe->find('ul', 1)->find('li',3)->plaintext;
        

        

            //INGREDIENTES DE LA RECETA
            foreach($detailed_recipe->find('ul', 2)->find('li') as $ingredient){
                $ingredients[] = "<li>".$ingredient->plaintext."</li>";
            }
            $data['ingredients'] = $ingredients;






            //PASOS DE LA RECETA
            foreach($detailed_recipe->find('.main ol li') as $direction){
                $directions[] = "<li>".$direction->plaintext."</li>";
            }
            $data['directions'] = $directions;
            
        
            // Reference: https://medoo.in/api/insert
            $database->insert("tb_recipes",[
                "recipes_name"=>$data['name'],
                "recipes_preparation_time"=>trim($data['preptime']),
                "recipes_cooking_time"=>trim($data['cooktime']),
                "recipes_total_time"=>trim($data['preptime']),
                "recipes_portions"=>trim($data['portions']),
                "recipes_list_ingredients"=>$data['ingredients'],
                "recipes_list_instructions"=>$data['directions']     
                
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