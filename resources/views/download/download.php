<?php 
//require "../php/download_require.php"
?>


<?php ob_start(); ?>


<?php
    echo "<div class='container'>";
    echo "<h1>Download</h1>";
    echo "<h4>Ici vous pouver télécharger tout les version de mes project</h4>";
    echo "</div>";


    $requete = $connexion->prepare("SELECT * FROM project;");
    $requete->execute();
    $resultat = $requete->fetchall();

    foreach( $resultat as $keys => $values ) {

      $name_r = $resultat[$keys][1];
      $name = convertSnakeCaseToTitle($name_r);
      
      $tag = $resultat[$keys][5];
      $tab_all = explode(" ", $tag);

      $download_v = $resultat[$keys][2];
      $requete = $connexion->prepare("SELECT url FROM download WHERE name_project = '$name_r' AND version = $download_v;");
      $requete->execute();
      $dl_r = $requete->fetchall();
      $download = $dl_r[0][0];


      echo"<div class='container'>";
      echo"<div class='container-section container-sect-topleft'><h2>$name</h2></div>";
      echo"<div class='container-section container-sect-topright tr-bl-rounding'><a href='$download' class='download' download=''></a></div>";
      echo"<div class='container-description'>";
      
      $requete = $connexion->prepare("SELECT url, version FROM download WHERE name_project = '$name_r';");
      $requete->execute();
      $dl_r_r = $requete->fetchall();

      foreach( $dl_r_r as $keys => $values ) {
        $url = $dl_r_r[$keys][0];
        $version = $dl_r_r[$keys][1];
        if($keys != 0) {

          echo'<br>';

        }
        echo"<a href=$url>$name V$version</a><br>";
      }

      echo'</div>';

      $requete = $connexion->prepare("SELECT COUNT(name_project) FROM download WHERE name_project = '$name_r';");
      $requete->execute();
      $nfile_r = $requete->fetchall();

      $nfile = $nfile_r[0][0] . ' fichier';

      echo"<div class='container-section container-sect-bottomleft tr-bl-rounding'><h6>$nfile</h6></div>";
      echo"<div class='container-tags'>";
      foreach( $tab_all as $key => $value ) {
        echo"<div class='container-tag' style='background-color: var(--$value)'><h6>$value</h6></div>";
      }
      echo"</div>";
      echo"</div>";
    }
    
    ?>

<?php 
$content = ob_get_clean();
//require_once "../php/template.php";
?>