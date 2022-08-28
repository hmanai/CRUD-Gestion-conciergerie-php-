<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<h2>GESTION DE CONCIERGERIE</h2>

<?php

session_start();
if(ISSET($_POST['login'])){
    if($_POST['username'] != "" && $_POST['password'] != ""){
        require_once 'connexion.php';
        
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "SELECT * FROM `concierge` WHERE `NOM_UTILISATEUR`=?  ";
        $query = $db->prepare($sql);
        $query->execute(array($username));
        $row = $query->rowCount();
        $fetch = $query->fetch();
        if (($row > 0) && (password_verify($password, $fetch['MOT_DE_PASSE']))) {
            $_SESSION['username'] = $fetch['NOM_UTILISATEUR']; 
 
            header("location: afficher.php");
            echo "Bienvenue ".$_SESSION['username'];

      
                } else{
                    header("location: index.php?erreur=1");  
                    echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                  }
    }
    else
    {
        header("location: index.php?erreur=2");  

    }
}
else if(ISSET($_POST['register'])){
    header("location: register.php");  

}
?>


    <div class="form">
  
     
        <form action="" method="POST">
      
            <label>Login</label>
            <input type="text" name="username" value=''  >
            <label>Mot de passe</label>
            <input type="password" name="password" value='' />
            <input type="submit" value="Login" name="login" />
            <input type="submit" value="Register" name="register">
            <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 )
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                     else{
                        echo "<p style='color:red'>Entrer votre login et mot de passe</p>";
                     }
                }
                ?>


        </form>
    </div>
</body>
</html>