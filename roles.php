<?php
require_once 'functions.php';
require_once "partials/header.php";

if($_GET["id"]){
    $id = $_GET["id"];
}

$membreroles = getMembreByRoleId($id);


    foreach($membreroles as $roles)
    {echo $roles["nom_membre"]." ";
        echo $roles["prenom_membre"]."<br>";
     }

require_once "partials/footer.php" ?>