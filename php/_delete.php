<?php
require 'db.php';

// Reference: https://medoo.in/api/delete
$database->delete("tb_recipes",[
    "recipes_id"=>$_GET["id"]
]);

header("location: admin.php");
?>