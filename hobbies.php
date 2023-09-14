<?php
require_once 'functions.php';
require_once "partials/header.php";

if($_GET["id"]){
    $id = $_GET["id"];
}

$membreshobbies = getMembreByHobbyId($id);
var_dump($membreshobbies);

foreach($membreshobbies as $hobby)
{echo $hobby["nom_membre"]." ";
    echo $hobby["prenom_membre"]."<br>";
 }


require_once "partials/footer.php" ?>