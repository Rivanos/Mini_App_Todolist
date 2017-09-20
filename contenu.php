<?php

// NOTE: création d'un tableau pour travailler en JSON
$fichier = "todolist.json";
$json = file_get_contents($fichier);

/* Les données sont récupérées sous forme de tableau (true) */
$tr = json_decode($json, true);


// NOTE: affichage du tableau des taches à faire
// NOTE: tableau de la todolist ( echo $tr['todolist'][1]; )
// NOTE: Séparation du tableau par --- lors de l'ajout d'une tache
$tableau_de_tache = explode("#", $tr['todolist'][1]);
// NOTE: faire une boucle parcourant tout le tableau des taches et voir si sa value est on après l'envoie du formulaire :
// NOTE: Calcul du nombre de taches à faire pour pouvoir faire un boucle dessus pour afficher tous les taches.
$sizeOf_tableau_de_tache = sizeof($tableau_de_tache);
// NOTE: Séparation du tableau par --- archive
$tableau_archive = explode("#", $tr['archive'][1]);
// NOTE: Calcul du nombre de taches à faire pour pouvoir faire un boucle dessus pour afficher tous les taches.
$sizeOf_tableau_archive = sizeof($tableau_archive);

    if (isset($_POST['list']) && !empty($_POST['list'])) {

      $tache = $_POST['list'];
      $tr['todolist'][1] .= "#".$tache;
      $tr['archive'][1] .= "#";
      $tache = "";
    }
    else {
        ;
      }
        if (isset($_POST['tache'])) {
          $tr['archive'][1] .= "#".$_POST['tache'];
          for ($i=0; $i < $sizeOf_tableau_de_tache ; $i++) {
            if ($tableau_de_tache[$i] == $_POST['tache']) {
              unset($tableau_de_tache[$i]);
              $tableau_de_tache = array_merge($tableau_de_tache);
              $tr['todolist'][1] = implode("#", $tableau_de_tache);
            }
          }
        }
        if (isset($_POST['archive'])) {
          $tr['todolist'][1] .= "#".$_POST['archive'];
          for ($i=0; $i < $sizeOf_tableau_archive ; $i++) {
            if ($tableau_archive[$i] == $_POST['archive']) {
              unset($tableau_archive[$i]);
              $tableau_archive = array_merge($tableau_archive);
              $tr['archive'][1] = implode("#", $tableau_archive);
            }
          }
        }
      $contenu_json = json_encode($tr);

      $fichier_open = fopen($fichier, 'w+');
      // Ecriture dans le fichier
      fwrite($fichier_open, $contenu_json);
      // Fermeture du fichier
      fclose($fichier_open);
      // NOTE: affichage du tableau des taches à faire
      // NOTE: tableau de la todolist ( echo $tr['todolist'][1]; )
      // NOTE: Séparation du tableau par --- lors de l'ajout d'une tache
      $tableau_de_tache = explode("#", $tr['todolist'][1]);
      // NOTE: faire une boucle parcourant tout le tableau des taches et voir si sa value est on après l'envoie du formulaire :
      // NOTE: Calcul du nombre de taches à faire pour pouvoir faire un boucle dessus pour afficher tous les taches.
      $sizeOf_tableau_de_tache = sizeof($tableau_de_tache);
      // NOTE: Séparation du tableau par --- archive
      $tableau_archive = explode("#", $tr['archive'][1]);
      // NOTE: Calcul du nombre de taches à faire pour pouvoir faire un boucle dessus pour afficher tous les taches.
      $sizeOf_tableau_archive = sizeof($tableau_archive);
?>
    <form id="tache" method="post">
        <label for="">Taches</label><br /><br />
      <?php

      // NOTE: faire une boucle php avec les informations venant de la todolist du fichier JSON pour les afficher sous la forme. <input type="checkbox" name="todolist" value="On"> faire les courses<br>
      // NOTE: Boucle pour afficher les élements du tableau après explosion
      for ($i=0; $i < $sizeOf_tableau_de_tache; $i++) {
          if ($tableau_de_tache[$i] != "") {
              echo '<input type="checkbox" class="tache" name="tache" value="'.$tableau_de_tache[$i].'" />'.$tableau_de_tache[$i]."<br />";
          }
      }
       ?>
       <br /><br />
    </form>
    <form id="archive" method="post">
      <label for="">Archives</label><br /><br />
      <?php

      // NOTE: faire une boucle avec les articles classées dans les archives. <del>faire les courses.</del>
      // NOTE: Boucle pour afficher les élements du tableau après explosion
      for ($i=0; $i < $sizeOf_tableau_archive; $i++) {
          if ($tableau_archive[$i] != "") {
              echo '<input class="archive" type="checkbox" name="archive"  value="'.$tableau_archive[$i].'" />'.$tableau_archive[$i]."<br />";
          }
      }
      ?>
      <br /><br />
    </form>
