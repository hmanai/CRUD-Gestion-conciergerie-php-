<?php  
require 'connexion.php';
$name_user = $_GET['name_user'];
$sql = 'DELETE FROM concierge WHERE NOM_UTILISATEUR=:name_user';
$statement = $db->prepare($sql);
if ($statement->execute([':name_user' => $name_user])) {
  header("Location: index.php");
}
?>