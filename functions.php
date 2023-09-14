<?php
//Normalement dessous c'etait dans index.php mais on l'a mis ici pour que ce soit plus propre et lisible
function dbConnect(){

try {
    $dbh = new PDO('mysql:host=localhost;dbname=millau_sql', 'root', ''); 
    // PDO c'est juste un objet qui sert a se connecter a la BDD
    //on cree le PDO, premiere valeur entre parenthese c'est le driver de base de données (c'est quelle BDD)
    //Ensuite host c'est le serveur sur lequel il se trouve, ici localhost
    //ensuite le nom de notre bdd (millau_sql)
    //Et ensuite les identifiants pour se co a la BDD (la en l'occurance root & pas de mot de passe)
        return $dbh;
} catch (PDOException $e) {
    //Ca display "ca marche pas" si il arrive pas a se co
    echo "ça marche pas";
}}




function getAllmembers(){
$connect = dbConnect();

$membres = $connect->query("SELECT * FROM membres");
//Avec cette syntaxe, on donne la requette qu'on veut faire sur notre variable
//On peut utiliser la meme syntaxe qu'avec MySQL
//Avec la commande si dessus on "recupere la boulette de papier"

$list_membres = $membres->fetchAll(PDO::FETCH_ASSOC);
//Et la on deplie la boulette de papier
//dans les parentheses on peut lui donner un comportement specifique, ici de recup que les données associatives

return $list_membres; //Quand tu utilises ta fonction si on a pas un return il fera rien. Il cherchera les données mais on pourra rien en faire.
}



function getMemberRoleByMemberId($id){
$connect = dbConnect();
$stmt = $connect->query("SELECT nom_role FROM roles JOIN membres ON roles.id_role = membres.role_id WHERE membres.id_membre = $id");

$role = $stmt->fetch(PDO::FETCH_ASSOC);
return $role;
}


function getHobbiesByMemberId($id){
    $connect = dbConnect();
    $hobbies = $connect->query("SELECT nom_hobbie FROM hobbies JOIN hobbies_membres ON hobbies.id_hobbie = hobbies_membres.hobbie_id JOIN membres ON hobbies_membres.membre_id = membres.id_membre WHERE membres.id_membre = $id");
//On selectionne d'abbord le from HOBBIES, et on JOIN une collonne a joindre, en lui indiquand la valeur qu'ELLE a en commun avec la col du premier FROM. ensuite on join la 3e categorie via la valeur comune avec la collone jonction
// En bref, hobbies -> hobbies_membres <-> membres
    
    $list_hobbies = $hobbies->fetchAll(PDO::FETCH_ASSOC);
    return $list_hobbies;
}


function getMemberName($id){
    $connect = dbConnect();
    $ids = $connect->query("SELECT * FROM membres WHERE membres.id_membre = $id"); // where dit que ca prend que cette colonne la, déterminée par l'ID
    
    $memberid = $ids->fetch(PDO::FETCH_ASSOC);
    return $memberid;    
    }



//fonction du formulaiure pour rentrer un nouveau membre dans la bdd
function addMember($lastname, $firstname, $birthdate, $genre, $role){
    $connect = dbConnect();
    $stmt = $connect->query("INSERT INTO membres VALUES(null, '$lastname', '$firstname', '$birthdate', '$genre', '$role')");
            }


// Fonction pour aller chercher les roles

    function getRoles(){
        $connect = dbConnect();
        $stmt = $connect->query("SELECT * FROM roles");
        
        $list_roles = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $list_roles;
        }
        

function getMembreByRoleId($id){
    $connect = dbConnect();
    $stmt = $connect->query("SELECT * FROM membres WHERE membres.role_id = $id");

    $role = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $role;
}


function getMembreByHobbyId($id){
    $connect = dbConnect();
    $stmt = $connect->query("SELECT id_membre FROM membres JOIN hobbies_membres ON hobbies_membres.membre_id = membres.id_membre JOIN hobbies ON hobbies.id_hobbie = hobbies_membres.hobbie_id WHERE hobbies_membres.membre_id = $id");
    $hobbies = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $hobbies;
}
