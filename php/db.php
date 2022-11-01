<?php
namespace Medoo;
require 'Medoo.php';

if(!isset($database)){
    $database = new Medoo([
        // [required]
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'becomeTheChef',
        'username' => 'root',
        'password' => 'Sp^9EfrVA!Z'
    ]);
}
$database->queryString

?>
