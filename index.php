<?php
require_once 'functions.php'; //pour faire appel a functions.php et mettre le contenu ici
require_once "partials/header.php" ?>

<main class="container text-center">

<h1>Bienvenue à l'AFPA Millau</h1>
<a href="form.php"> Enregistrez vous </a>


<?php
$list_membres = getAllMembers();
//la on recupere donc un tableau, donc POUR AFFICHER UN TABLEAU EN PHP ON FAIT UNE BOUCLE FOREACH
?>

<section class="row">

<?php
foreach($list_membres as $membre){

    $role = getMemberRoleByMemberId($membre['id_membre']);
    $hobbies = getHobbiesByMemberId($membre['id_membre']);

  
    $nom = $membre['nom_membre'];
    $prenom = $membre['prenom_membre'];
    $naissance = $membre['naissance_membre'];
    $genre =  $membre['genre'];

    // Dessous on cree une carte bootstrap, ou on integre nos valeurs en php
    // En fait on prend la base de php, et dans les champs qu'on veut afficher 
    // on ouvre nos balises php et on fait appel a nos variable
?>
    <div class="card col-3 m-2 shadow text-center     <?php if ($genre == "F"){
                              echo "bg-danger-subtle";
                              } else {
                              echo "bg-primary-subtle";
       }?>" style="width: 18rem;">

    <div class="card-header"><?php echo $nom." ".$prenom ?></div> 
  <div class="card-body">
    <h5 class="card-title"><?php echo $naissance ?></h5>
    <p class="card-text"> <a href="roles.php?id=<?php echo $membre['role_id'] ?>"><?php echo $role['nom_role'] ?></a></p>
    <a href="details.php?id=<?php echo $membre['id_membre'] ?>" class="btn btn-dark"> En savoir plus </a>
  </div>
</div>
<?php };?>

</section>
</main>

<?php require_once "partials/footer.php" ?>