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
function convert_size($size_bytes) {
    // Définition des différentes unités
    $units = ['octets', 'Ko', 'Mo', 'Go', 'To'];
    $i = 0;
    // Conversion de la taille
    while ($size_bytes >= 1024 && $i < count($units) - 1) {
        $size_bytes /= 1024.0;
        $i++;
    }
    return [round($size_bytes), $units[$i]];
}

function get_file_properties($file_path) {
    // Construire le chemin complet du fichier
    $base_dir = dirname(__DIR__, 2); // Deux niveaux au-dessus du répertoire actuel
    $full_path = $base_dir . '/pre.comoweb.fr/public' . $file_path;
    
    try {
        // Récupérer la taille du fichier en octets
        $file_size = filesize($full_path);
        
        // Convertir la taille dans l'unité appropriée
        list($file_size, $unit) = convert_size($file_size);
        
        // Récupérer la dernière date de modification du fichier
        $modification_time = filemtime($full_path);
        
        // Convertir le timestamp en une date et heure lisible
        $modification_time_formatted = date("Y-m-d H:i:s", $modification_time);
        
        // Extraire la date et l'heure
        $date = date("Y-m-d", $modification_time);
        $heure = date("H:i:s", $modification_time);
        
        return [$file_size, $unit, $date, $heure];
    } catch (Exception $e) {
        error_log("Une erreur s'est produite : " . $e->getMessage());
        return [null, null, null, null];
    }
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