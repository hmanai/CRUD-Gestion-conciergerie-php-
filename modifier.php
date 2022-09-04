<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php

         //connexion à la base de donnée
          include_once "connexion.php";
          $id = $_GET['id'];

         $req =  "SELECT * FROM intervention WHERE ID_INTERV=:id";
         $rep = $db->prepare($req);
         $rep->execute([':id' => $id]);
         $res = $rep->fetch(PDO::FETCH_OBJ);     
  
            if ( isset($_POST['button']) && isset($_POST['ID_CONCIERGE']) && isset($_POST['DATE_INTERV']) && (isset ($_POST['TYPE_INTERV'])  && isset($_POST['ETAGE_INTERV']) && isset($_POST['ID_IMMEUBLE'] ) ) ){
                $id_concierge=$_POST['ID_CONCIERGE']; 
                $nom_concierge=$_POST['NOM_UTILISATEUR']; 
                $date_interv=$_POST['DATE_INTERV'];
                $type_interv=$_POST['TYPE_INTERV'];
                $etage=$_POST['ETAGE_INTERV'];
                $immeuble = $_POST['ID_IMMEUBLE'];

              $req =  "UPDATE intervention SET ID_CONCIERGE = :id_concierge , NOM_UTILISATEUR = :nom_utilisateur , DATE_INTERV = :date_interv , TYPE_INTERV = :type_interv, ETAGE_INTERV = :etage, ID_IMMEUBLE = :immeuble WHERE ID_INTERV = :id";
              $rep = $db->prepare($req);
              $rep->execute([':id_concierge' => $id_concierge, ':nom_utilisateur' => $nom_concierge, ':date_interv' =>$date_interv, ':type_interv' => $type_interv, ':etage' => $etage, ':immeuble' => $immeuble, ':id' => $id ]);
              header("location: afficher.php");
            }
    ?>
            <h2>Modifier l'intervention : </h2>


    <div class="form">
        <a href="afficher.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <p class="erreur_message">
 
        </p>
        <form action="" method="POST">
      
            <label class="lab">ID du concierge</label>
            <input class="inp" type="number" name="ID_CONCIERGE" value='<?= $res->ID_CONCIERGE; ?>'  >
            
            <label class="lab">Nom du concierge</label>
            <input class="inp" type="text" name="NOM_UTILISATEUR" value='<?= $res->NOM_UTILISATEUR; ?>'  >
            <label class="lab">Date de l'intervention</label>
            <input class="inp" type="date" name="DATE_INTERV" value='<?= $res->DATE_INTERV; ?>'<?php ?>" />
            <label class="lab">Type de l'intervention</label>
            <input class="inp" type="text" name="TYPE_INTERV" value="<?= $res->TYPE_INTERV; ?>" />
            <label class="lab">Etage de l'intervention</label>
            <input class="inp" type="number" name="ETAGE_INTERV" value="<?= $res->ETAGE_INTERV; ?>"/>
            <label class="lab">Immeuble</label>
            <input class="inp" type="number" name="ID_IMMEUBLE" value="<?= $res->ID_IMMEUBLE; ?>" />
            <input class="inp" type="submit" value="Modifier" name="button" />


        </form>
    </div>
</body>
</html>