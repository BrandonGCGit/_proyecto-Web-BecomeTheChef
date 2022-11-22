<?php
namespace Medoo;
require 'Medoo.php';

if(!isset($database)){
    $database = new Medoo([
        // [required]
        'type' => 'mysql',
        'host' => 'localhost',
        'database' => 'become_the_chef',
        'username' => 'root',
        'password' => 'Sp^9EfrVA!Z'
    ]);
}

?>
