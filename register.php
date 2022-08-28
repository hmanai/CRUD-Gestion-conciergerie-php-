<?php
    include_once "connexion.php";

?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>
<body>


<div class="form">
        <a href="index.php" class="back_btn"><img src="images/back.png"> Retour</a>
        <h2>S'inscrire </h2>

        <form action="" method="POST">

            <label>Nom du concièrge</label>
            <input type="text" name="nom_concierge">
            <label>Prénom du Concierge</label>
            <input type="text" name="prenom_concierge">
            <label>email</label>
            <input type="text" name="email">
            <label>Nom de L'utilisateur</label>
            <input type="text" name="nom_utilisateur">
            <label>Mot de passe</label>
            <input type="password" name="mot_de_passe">
            <input type="submit" value="confirmer" name="confirmer">
            <input type="submit" value="Annuler" name="annuler">


        </form>
    </div>

    <?php
              
if(ISSET($_POST['confirmer'])){

 $nom=$_POST['nom_concierge'];
$prenom=$_POST['prenom_concierge'];
$email=$_POST['email'];
$login=$_POST['nom_utilisateur'];
$pass=password_hash($_POST['mot_de_passe'],  PASSWORD_DEFAULT);

$sql = "INSERT INTO `concierge` (ID_CONCIERGE, NOM_CONCIERGE, PRENOM_CONCIERGE, EMAIL, NOM_UTILISATEUR, MOT_DE_PASSE )
        VALUES (NULL, :nom_concierge, :prenom_concierge, :email, :nom_utilisateur, :mot_de_passe )";
$db->prepare($sql)->execute([
    ":nom_concierge" => $nom,
    ":prenom_concierge" => $prenom,
    ":email" => $email, 
    ":nom_utilisateur" => $login,
    ":mot_de_passe" => $pass

]);

    if($sql){
        header('Location: ./index.php');   
    } 

  else {
        echo 'Error during registration';
    }
}
else if(ISSET($_POST['annuler'])){
    header('location: ./register.php');
}

?>
    
</body>
</html>