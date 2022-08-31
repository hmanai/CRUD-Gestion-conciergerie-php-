
<?php
                //connexion à la base de donnée
                include_once "connexion.php";
                $user = $_GET['user'];
               
                $req =  "SELECT * FROM intervention WHERE NOM_UTILISATEUR =:user";
                $rep = $db->prepare($req);
                $rep->execute([':user' => $user]);
                $res = $rep->fetch(PDO::FETCH_OBJ);     
         
  
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Intervention</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
 
    <div class="form">
        <a href="afficher.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>Ajouter une Intervention</h2>
        <p class="erreur_message">
        </p>
        <form action="" method="POST">
            <?php
            ?>

            <label>ID du concièrge</label>
            <input type="number" name="id_concierge" value="<?= $res->ID_CONCIERGE;?>" disabled >
            <label>Nom du concièrge</label>
            <input type="text" name="nom_utilisateur" value="<?= $res->NOM_UTILISATEUR; ?>"disabled >
            <label>Date de l'intervention</label>
            <input type="date" name="date_interv">
            <label>Type de l'intervention</label>
            <input type="text" name="type_interv">
            <label>étage</label>
            <input type="number" name="etage">
            <label>Immeuble</label>
            <input type="number" name="immeuble">
            <input type="submit" value="Ajouter" name="button">
        </form>
    </div>
    <?php
       //vérifier que le bouton ajouter a bien été cliqué
       if(isset($_POST['button'])){
           //extraction des informations envoyé dans des variables par la methode POST
        //   extract($_POST);
           //verifier que tous les champs ont été remplis

                //requête d'ajout
                
                $id_concierge=$res->ID_CONCIERGE; 
                $nom_utilisateur=$res->NOM_UTILISATEUR;
                $date_interv=$_POST['date_interv'];
                $type_interv=$_POST['type_interv'];
                $etage=$_POST['etage'];
                $immeuble = $_POST['immeuble'];

                $sql =  "INSERT INTO `intervention` (ID_INTERV, ID_CONCIERGE, NOM_UTILISATEUR, DATE_INTERV, TYPE_INTERV, ETAGE_INTERV, ID_IMMEUBLE) 
                         VALUES (NULL, :id_concierge, :nom_utilisateur, :date_interv, :type_interv, :etage_interv, :id_immeuble)";
                
                $db->prepare($sql)->execute([
                    ":id_concierge" => $id_concierge,
                    ":nom_utilisateur" => $nom_utilisateur,
                    ":date_interv" => $date_interv,
                    ":type_interv" => $type_interv,
                    ":etage_interv" => $etage,
                    ":id_immeuble" => $immeuble
                  ]);
                  if($sql){//si la requête a été effectuée avec succès , on fait une redirection
                    header("location: afficher.php");
                    $message = "Intervention ajoutée avec succé";
                }else {//si non
                    $message = "Intervention non ajouté";
                }

           }else {
               //si non
               $message = "Veuillez remplir tous les champs !";
           }
                
                  // $req->execute(array(":id_interv"=>$id_interv, ":id_concierge"=>$id_concierge, ":date_interv"=>$date_interv, ":type_interv"=>$type_interv, ":etage_interv"=>$etage_interv, ":id_immeuble"=>$id_immeuble));
            
    ?>
</body>
</html>