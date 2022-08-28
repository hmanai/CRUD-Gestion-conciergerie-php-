

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modifier Mon Compte</title>
</head>
<body>

<?php

         //connexion à la base de donnée
         include_once "connexion.php";

          $name_user = $_GET['name_user'];

         $req =  "SELECT * FROM concierge WHERE NOM_UTILISATEUR=:name_user";
         $rep = $db->prepare($req);
         $rep->execute([':name_user' => $name_user]);
         $res = $rep->fetch(PDO::FETCH_OBJ);  
            if ( isset($_POST['confirmer']) && isset($_POST['nom_concierge']) && isset($_POST['prenom_concierge']) && (isset ($_POST['email'])  && isset($_POST['nom_utilisateur']) ) ){
                $nom=$_POST['nom_concierge'];
                $prenom=$_POST['prenom_concierge'];
                $email=$_POST['email'];
                $login=$_POST['nom_utilisateur'];

              $req =  "UPDATE concierge SET NOM_CONCIERGE = :nom_concierge, PRENOM_CONCIERGE = :prenom_concierge, EMAIL = :email, NOM_UTILISATEUR = :nom_utilisateur WHERE NOM_UTILISATEUR = :name_user";
              $rep = $db->prepare($req);
              $rep->execute([':nom_concierge' => $nom, ':prenom_concierge' =>$prenom, ':email' => $email, ':nom_utilisateur' => $login, ':name_user' => $name_user ]);
              header("location: afficher.php");
            }
    //          else{
    //              echo "<p style='color:red;'>" . "Modification echouée" . "</p> ";
    //         }
    else if ( isset($_POST['annuler'])){
        header("location: afficher.php");

    }
     ?>

<div class="form">
        <a href="afficher.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Modifier Mon Compte </h2>

        <form action="" method="POST">

            <label>Nom du concièrge</label>
            <input type="text" name="nom_concierge" value='<?= $res->NOM_CONCIERGE; ?>'>
            <label>Prénom du Concierge</label>
            <input type="text" name="prenom_concierge" value='<?= $res->PRENOM_CONCIERGE; ?>'>
            <label>email</label>
            <input type="text" name="email" value='<?= $res->EMAIL; ?>'>
            <label>Nom de L'utilisateur</label>
            <input type="text" name="nom_utilisateur" value='<?= $res->NOM_UTILISATEUR; ?>'>
            <input type="submit" value="confirmer" name="confirmer">
            <input type="submit" value="Annuler" name="annuler">

        </form>
    </div>

              

    
</body>
</html>