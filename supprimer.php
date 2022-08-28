
<?php  
require 'connexion.php';
$id = $_GET['id'];
$sql = 'DELETE FROM intervention WHERE ID_INTERV=:id';
$statement = $db->prepare($sql);
if ($statement->execute([':id' => $id])) {
  header("Location: afficher.php");
}
?>
