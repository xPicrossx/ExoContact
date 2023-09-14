<?php
require_once 'functions.php';
require_once "partials/header.php";
$roles = getRoles();
//Pour recup les données en php
if(isset($_POST) && !empty($_POST)){ 
//isset on verifie que la page recoit des données en post ET !empty post dit il faut que ce soit different de vide (avec le !)

$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$birthdate = $_POST['birthdate'];
$genre = $_POST['genre'];
$role = $_POST['role_id'];
//la fonction en dessous sert pour ecrire sur la BDD les données rentrées par l'user
addMember($lastname, $firstname, $birthdate, $genre, $role);

}
    
?>

<main class="container text-center">
<form action="" method="post">


<!-- name tres imlportant pour recuperer dans $_post -->

<label for="lastname">Nom de famille</label>
<input id="lastname" name="lastname" type="text" class="form-control">

<label for="firstname">Prenom</label>
<input id="firstname" name="firstname" type="text" class="form-control">

<label for="birthdate">Date de Naissance</label>
<input id="birthdate" name="birthdate" type="date" class="form-control">



<div class="form-check">
    <h3>Vous êtes:</h3>
    <input class="form-check-input" type="radio" name="genre" id="flexRadioDefault1" value="M" checked>
    <label class="form-check-label" for="flexRadioDefault1">
    M
    </label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" name="genre" id="flexRadioDefault2" value="F">
  <label class="form-check-label" for="flexRadioDefault2">
    F
  </label>
</div>

<select name="role_id" class="form-select" aria-label="Default select example">    
<!-- la on recupere tous les roles -->
    <?php foreach($roles as $role){?>
        <option value="<?= $role['id_role'] ?>"><?= $role['nom_role'] ?></option> <!-- est equivalent a echo -->

    <?php } ?>
   
</select>
<input type="submit" value="Ajouter" class="btn bg-primary-subtle bg-warning-subtle  ">
</form>

<!-- Tout les input au dessus sont dans la balise "form", qui fait qu'on va pouvoir recuperer les infos avec le submit-->

<!-- role -->
<!-- hobbies -->

</main>