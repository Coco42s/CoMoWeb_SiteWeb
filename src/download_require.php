<?php require_once "config/db_conf.php"; ?>

<?php
    $serveur = $databaseHost;
    $login = $databaseUser;
    $pass = $databasePass;
?>

<?php
try{
    $connexion = new PDO("mysql:host=$serveur;dbname=comoweb.fr_db", $login, $pass);
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $requete = $connexion->prepare("SELECT * FROM project;");
    $requete->execute();
    $resultat = $requete->fetchall();
}
catch(PDOException $e){
    echo 'Echec : ' .$e->getMessage();
}
?>

<?php
function convertSnakeCaseToTitle($snake_case_str) {
    $words = explode('_', $snake_case_str);
    $title_case_str = $words[0];
    for ($i = 1; $i < count($words); $i++) {
        $title_case_str .= ' ' . $words[$i];
    }
    return $title_case_str;
}
?>