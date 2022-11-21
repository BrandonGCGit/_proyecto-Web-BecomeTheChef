

<?php
    include('simple_html_dom.php');

    $html = file_get_html('https://www.bonviveur.es/recetas/tag/pocos-ingredientes/');

    echo $html;
?>

