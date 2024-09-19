<?php 
//require "../php/project_require.php"
?>


<?php ob_start(); ?>

    <div class="container">
      <h1>Projets</h1>
        <h4>Voici ici la majorité de mes projets</h4>
    </div>

    <div class="language-buttons">
        <form action="<?= $router->generate('projects') ?>" method="post">
            <button type="submit" name="language" value="python">Python</button>
        </form>
        <form action="<?= $router->generate('projects') ?>" method="post">
            <button type="submit" name="language" value="html">HTML</button>
        </form>
        <form action="<?= $router->generate('projects') ?>" method="post">
            <button type="submit" name="language" value="javascript">JavaScript</button>
        </form>
    </div>

    <?php
      if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $language = $_POST['language'];
          
          foreach( $resultat as $keys => $values ){
            $tag = $resultat[$keys][5];
            $tab_all = explode(" ", $tag);
            if (in_array($language, $tab_all)) {
              $name_r = $resultat[$keys][1];

              $name = convertSnakeCaseToTitle($name_r);

              $description = $resultat[$keys][3];
              $project_page = $resultat[$keys][4];
              
              $download_v = $resultat[$keys][2];
              $requete = $connexion->prepare("SELECT url FROM download WHERE name_project = '$name_r' AND version = $download_v;");
              $requete->execute();
              $resultats = $requete->fetchall();
              $download = $resultats[0][0];


              $res= get_file_properties($download);
              $file_size = $res[0];
              $unit = $res[1];
              $date = $res[2];
              $heure = $res[3];
              $info = "Taille: {$file_size}{$unit} • Mis à jour le {$date} à {$heure}";
              echo"<div class='container'>";
              echo"<div class='container-section container-sect-topleft'><h2>$name</h2></div>";
              echo"<div class='container-section container-sect-topright tr-bl-rounding'><a href='$download' class='download' download=''></a></div>";
              echo"<div class='container-description'>";
              echo"<h4>$description<br>";
              echo"<center><a href='$project_page'><button>View project page</button></a></center>";      
              echo"</div>";
              echo"<div class='container-section container-sect-bottomleft tr-bl-rounding'><h6>$info</h6></div>";
              echo"<div class='container-tags'>";
              foreach( $tab_all as $key => $value ) {
                echo"<div class='container-tag' style='background-color: var(--$value)'><h6>$value</h6></div>";
              }
              echo"</div>";
              echo"</div>";
            } 
          }
      } else {
        foreach( $resultat as $keys => $values ){
          $name_r = $resultat[$keys][1];
          $name = convertSnakeCaseToTitle($name_r);
          $download_v = $resultat[$keys][2];
          $description = $resultat[$keys][3];
          $project_page = $resultat[$keys][4];
          $tag = $resultat[$keys][5];
          $tab_all = explode(" ", $tag);

          $requete = $connexion->prepare("SELECT url FROM download WHERE name_project = '$name_r' AND version = $download_v;");
          $requete->execute();
          $resultats = $requete->fetchall();

          $download = $resultats[0][0];

          $res= get_file_properties($download);
          
          $file_size = $res[0];
          $unit = $res[1];
          $date = $res[2];
          $heure = $res[3];
          $info = "Taille: {$file_size}{$unit} • Mis à jour le {$date} à {$heure}";


          echo"<div class='container'>";
          echo"<div class='container-section container-sect-topleft'><h2>$name</h2></div>";
          echo"<div class='container-section container-sect-topright tr-bl-rounding'><a href='$download' class='download' download=''></a></div>";
          echo"<div class='container-description'>";
          echo"<h4>$description<br>";
          echo"<center><a href='$project_page'><button>View project page</button></a></center>";      
          echo"</div>";
          echo"<div class='container-section container-sect-bottomleft tr-bl-rounding'><h6>$info</h6></div>";
          echo"<div class='container-tags'>";
          foreach( $tab_all as $key => $value ) {
            echo"<div class='container-tag' style='background-color: var(--$value)'><h6>$value</h6></div>";
          }
          echo"</div>";
          echo"</div>";

        }
      }
    ?>

<?php 
$content = ob_get_clean();
//require_once "../php/template.php";
?>