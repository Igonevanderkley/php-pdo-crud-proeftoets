<?php

require ('config.php');
$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
    if ($pdo) {
        echo "De verbinding is gelukt";

    } else {
        echo "er is een interne server-error";
    }
    
} catch(PDOException $e) {
echo $e->$getMessage();
}

//haal gegevens uit de database
$sql = "SELECT * FROM RichestPeople";

$statement = $pdo->prepare($sql); 
$statement->execute();
$result = $statement->fetchAll(PDO::FETCH_OBJ);

var_dump($result);





