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
    <h1>GESTION DE CONCIERGERIE</h1>

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
    
        <div class="container">
            <div class="bouttons">
                <a href="ajouter.php?user=<?php echo $_SESSION['username']; ?>" class="Btn_add"> <img src="images/plus.png"> Ajouter</a>     
                <a href="rechercher.php" class="Btn_add" > <i class="fa-solid fa-magnifying-glass"> </i> Rechercher</a>     
            </div>
           
            <table>
                <tr id="items">
                    <th>ID DE L'intervention</th>
                    <th>ID du concierge</th>
                    <th>Nom du concierge</th>
                    <th>Date de l'intervention</th>
                    <th>Type de l'intervention</th> 
                    <th>étage</th>
                    <th>Immeuble</th>
                    <th><span class= "modif" >Modifier</span></th>
                    <th><span class= "modif" >Supprimer</span></th>
                </tr>
                <?php 
                //inclure la page de connexion
                include_once "connexion.php";
                //requête pour afficher la liste des interventions
                $nom_utilisateur = $_SESSION['username'];

                $req =  "SELECT * FROM intervention WHERE NOM_UTILISATEUR = '$nom_utilisateur' ";
                $rep = $db->prepare($req);
                $rep->execute();
                $res = $rep->fetchAll(PDO::FETCH_ASSOC);     
                $number_of_rows = $rep->fetchColumn(); 
                print_r($number_of_rows) ;

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
                                    <td><a href="modifier.php?id='.$value['ID_INTERV'].'"><img src="images/pen.png"></a></td>
                                    <td><a onClick="return confirm (\'voulez-vous vraiment supprimer cette intervention?\');" href="supprimer.php?id='.$value['ID_INTERV'].'"><img src="images/trash.png"></a> </td>
                                </tr>';
            
                } 
                        
                    }
                    ?>
            </table>
        </div>


    </div>

</body>
</html>