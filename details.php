<?php
require_once 'functions.php';

$list_membres = getAllMembers();

foreach($list_membres as $membre){
if($_GET["id"]){
    $test = $_GET["id"];

}}

$nom = getMemberName($test);
$role = getMemberRoleByMemberId($test);
$hobbies = getHobbiesByMemberId($test);
$membreshobbies = getMembreByHobbyId($test);

echo $nom["nom_membre"]."<br>";
echo $nom["prenom_membre"]."<br>";
echo $role["nom_role"]."<br>";
echo $nom["genre"]."<br>";
echo $nom["naissance_membre"]."<br>";

//Ici on fait un foreach, vu que les resultats des hobbies sont disposés dans un tableau on les recup comme ça


foreach($hobbies as $hob){?>
    <a href="hobbies.php?id=<?php echo $hob['id_hobbie'] ?>"><?php echo $hob['nom_hobbie']."<br>" ?></a>
     <?php }?>
