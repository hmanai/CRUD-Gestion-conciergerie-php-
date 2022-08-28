
<?php

$host = 'localhost';
$dbname = 'dbconciergerie';
$username = 'root';
$password = '';

try {

$db = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

//echo "Connecté à $dbname sur $host avec succès.";

return $db;
} catch (PDOException $e) {

die("Impossible de se connecter à la base de données $dbname :" . $e->getMessage());

}

