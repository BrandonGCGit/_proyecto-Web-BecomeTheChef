<?php
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

    if($_POST){
        //https://geonode.com/free-proxy-list/
        $proxyurl = '81.95.232.73:3128';

        $context = stream_context_create();
        stream_context_set_params($context, array(
            'proxy' => $proxyurl,
            'ignore_errors' => true, 
            'max_redirects' => 3)
        );

        $recipe = [];
        $ingredients = [];
        $directions = [];
        
        $detailed_recipe = file_get_html($_POST["link"], 0, $context);

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
            $ingredients[] = "<li>".$ingredient->plaintext.","."</li>";
        }
        $data['ingredients'] = $ingredients;








        //PASOS DE LA RECETA
       // $directions ="";
        foreach($detailed_recipe->find('.main ol li') as $direction){

           
                $directions[] = "<li>".$direction->plaintext."</li>";   
        }
        $data['directions'] = $directions;
        
        
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