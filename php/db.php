<?php
namespace Medoo;
require 'Medoo.php';

if(!isset($database)){
    $database = new Medoo([
//         [required]
        'type' => 'mysql',
        'host' => 'db4free.net:3306',
        'database' => 'become_the_chef',
        'username' => 'admin777',
        'password' => '32a_6_qZaTDM9qm'

//
//        'type' => 'mysql',
//        'host' => 'localhost',
//        'database' => 'become_the_chef',
//        'username' => 'root',
//        'password' => 'Sp^9EfrVA!Z'
    ]);
}

?>
