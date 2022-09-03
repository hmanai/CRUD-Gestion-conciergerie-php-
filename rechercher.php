<?php
session_start();
?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://kit.fontawesome.com/573723cbf2.js" crossorigin="anonymous"></script>

    <title>Conciergerie</title>
</head>
<body>
    <h1 class="title">GESTION DE CONCIERGERIE</h1>

    <div id="gestion"> 
      <div class="admin">
        <div class="photo"> 
            <img src="images/logo.png" alt="photo du concierge">
            <p> Bienvenue <?php echo $_SESSION['username']; ?></p>
        </div>
        <div class="operation">
            <a href="modifierCompte.php?name_user=<?php echo $_SESSION['username']?> " class="modifier"> Modifier Mon Compte </a>
            <a onClick="return confirm ('voulez-vous vraiment supprimer votre compte?');" href="supprimerCompte.php?name_user=<?php echo $_SESSION['username']?>" class="supprimer">Supprimer Mon Compte</a>
        </div>
        <div class="logout"> 
            <a href="logout.php">Se déconnecter</a>
        </div>
      </div>
    
        <div class="containerresult">
            <div class="bouttons">
                <a href="rechercher.php?user=<?php echo $_SESSION['username']; ?>" class="Btn_add" > <i class="fa-solid fa-magnifying-glass"> </i> Rechercher</a>     
                <a href="afficher.php" class="Btn_add" > <i class="fa-solid fa-arrow-left"></i> Retour</a>     

            </div>
           
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

    ?>

    <div class="formrecherch">
        <a href="afficher.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <p class="erreur_message">
 
        </p>
        <form action="" method="POST">
      
            <label>ID du concierge</label>
            <select id="id-select" name="ID_CONCIERGE">
                <option value="">Choisissez un ID_Concierge</option>
                <?php  
                                $requete2 = 'SELECT DISTINCT ID_CONCIERGE  FROM intervention';
                                $preparer2 = $db->prepare($requete2);  
                                $preparer2->execute();
                                $etages = $preparer2->fetchAll();
                            foreach ($etages as $etages ) {  ?>
                            <option
                                value="<?php echo $etages['ID_CONCIERGE']; ?>">
                                <?php echo $etages['ID_CONCIERGE']; ?>
                            </option>
                            <?php } ?>
                
            </select>
            
            <label>Nom du concierge</label>
            <select id="id-select" name="NOM_UTILISATEUR">
                <option value="">Choisissez Le Nom Du Concierge</option>
                <?php  
                                $requete2 = 'SELECT DISTINCT NOM_UTILISATEUR FROM intervention'; // remplir liste par donnée de la base de donnée
                                $preparer2 = $db->prepare($requete2); 
                                $preparer2->execute();
                                $etages = $preparer2->fetchAll();
                            foreach ($etages as $etages ) {  ?>
                            <option
                                value="<?php echo $etages['NOM_UTILISATEUR']; ?>">
                                <?php echo $etages['NOM_UTILISATEUR']; ?>
                            </option>
                            <?php } ?>
            </select>
            <label>Date de l'intervention</label>
            <input class="date" type="date" name="DATE_INTERV" value='' />
            <label>Type de l'intervention</label>
            <select id="id-select" name="TYPE_INTERV">
                <option value="">Choisissez Une Tache</option>
                <?php  
                                $requete2 = 'SELECT DISTINCT TYPE_INTERV  FROM intervention'; // remplir liste par donnée de la base de donnée
                                $preparer2 = $db->prepare($requete2);  
                                $preparer2->execute();
                                $etages = $preparer2->fetchAll();
                            foreach ($etages as $etages ) {  ?>
                            <option
                                value="<?php echo $etages['TYPE_INTERV']; ?>">
                                <?php echo $etages['TYPE_INTERV']; ?>
                            </option>
                            <?php } ?>
            </select>          
              <label>Etage de l'intervention</label>
              <select id="id-select" name="ETAGE_INTERV">
                <option value="">Choisissez un Etage</option>
                <?php  
                                $requete2 = 'SELECT DISTINCT ETAGE_INTERV  FROM intervention'; // remplir liste par donnée de la base de donnée
                                $preparer2 = $db->prepare($requete2);  
                                $preparer2->execute();
                                $etages = $preparer2->fetchAll();
                            foreach ($etages as $etages ) {  ?>
                            <option
                                value="<?php echo $etages['ETAGE_INTERV']; ?>">
                                <?php echo $etages['ETAGE_INTERV']; ?>
                            </option>
                            <?php } ?>
            </select>             
             <label>Immeuble</label>
             <select id="id-select" name="ID_IMMEUBLE">
                <option value="">Choisissez Un Immeuble</option>
                <?php  
                                $requete2 = 'SELECT DISTINCT ID_IMMEUBLE  FROM intervention'; // remplir liste par donnée de la base de donnée
                                $preparer2 = $db->prepare($requete2); 
                                $preparer2->execute();
                                $etages = $preparer2->fetchAll();
                            foreach ($etages as $etages ) {  ?>
                            <option
                                value="<?php echo $etages['ID_IMMEUBLE']; ?>">
                                <?php echo $etages['ID_IMMEUBLE']; ?>
                            </option>
                            <?php } 
                                        $id_concierge=$_POST['ID_CONCIERGE']; 
                                        $nom_concierge=$_POST['NOM_UTILISATEUR']; 
                                        $date_interv=$_POST['DATE_INTERV'];
                                        $type_interv=$_POST['TYPE_INTERV'];
                                        $etage=$_POST['ETAGE_INTERV'];
                                        $immeuble = $_POST['ID_IMMEUBLE'];
                            ?>
            </select>            <input class="search" type="submit" value="Chercher" name="button" />


        </form>
    </div>


 <!-- tableau des resultats de recherche -->


 <div class="container">

           
            <table>
                <tr id="items">
                    <th>ID DE L'intervention</th>
                    <th>ID du concierge</th>
                    <th>Nom du concierge</th>
                    <th>Date de l'intervention</th>
                    <th>Type de l'intervention</th> 
                    <th>étage</th>
                    <th>Immeuble</th>
                </tr>
                <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                if ( isset($_POST['button'])){
                 // disparaitre le formulaire de recherche
                    echo '<style type="text/css">
                    .formrecherch{
                        display: none;
                    }
                    </style>';

               // afficher resultat de recherche

                //$req =  "SELECT * FROM intervention WHERE ID_CONCIERGE = '$id_concierge' OR NOM_UTILISATEUR = '$nom_concierge' OR DATE_INTERV = '$date_interv' OR TYPE_INTERV = '$type_interv' OR ETAGE_INTERV = '$etage' OR ID_IMMEUBLE = '$immeuble'";
 
                $criteres='';
                    if( !empty($_POST['ID_CONCIERGE']) )
                    $criteres.=" AND ID_CONCIERGE LIKE '{$_POST['ID_CONCIERGE']}'";
                    if( !empty($_POST['NOM_UTILISATEUR']) )
                    $criteres.=" AND NOM_UTILISATEUR LIKE '{$_POST['NOM_UTILISATEUR']}'";
                    if( !empty($_POST['DATE_INTERV']) )
                    $criteres.=" AND DATE_INTERV LIKE '".$_POST['DATE_INTERV']."'";
                    if( !empty($_POST['TYPE_INTERV']) )
                   $criteres.=" AND TYPE_INTERV LIKE '".$_POST['TYPE_INTERV']."'";
                   if( !empty($_POST['ETAGE_INTERV']) )
                   $criteres.=" AND ETAGE_INTERV LIKE '".$_POST['ETAGE_INTERV']."'";
                   if( !empty($_POST['ID_IMMEUBLE']) )
                   $criteres.=" AND ID_IMMEUBLE LIKE '".$_POST['ID_IMMEUBLE']."'";
              
                $req='SELECT * FROM intervention 
                    WHERE true'
                    . $criteres;
               
                $rep = $db->prepare($req);
                $rep->execute();
                $res = $rep->fetchAll(PDO::FETCH_ASSOC);     
                $number_of_rows = $rep->fetchColumn(); 
                
                    for ($i=0; $i < 1 ; $i++) { 
                        foreach($res as $key => $value )
                        
                        { 
                            echo'<tr>
                                    <td>'.$value['ID_INTERV'].'</td>
                                    <td> '.$value['ID_CONCIERGE'].'  </td>
                                    <td> '.$value['NOM_UTILISATEUR'].'  </td>
                                    <td>'.$value['DATE_INTERV'].'</td>
                                    <td>'.$value['TYPE_INTERV'].'</td>
                                    <td>'.$value['ETAGE_INTERV'].'</td>
                                    <td>'.$value['ID_IMMEUBLE'].'</td>
                                    
                                </tr>';
                } 
            }
                    }
                
                
                    ?>
            </table>
        </div>


</body>
</html>
        </div>


    </div>

</body>
</html>