<?php 
require 'config.php';

$dsn = "mysql:dbhost=$dbHost;dbname=$dbName;charset=UTF8";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);

    if ($pdo) {
        echo "Verbinding is gelukt";
    } else {
        echo "interne server-error";
    }
} catch(PDOException $e) {
    $e->getMessage();
}

$sql = "DELETE FROM RichestPeople
        WHERE Id = :Id";

$statement = $pdo->prepare($sql);

$statement->bindValue(':Id', $_GET['Id'], PDO::PARAM_INT);

$result = $statement->execute();

if ($result) {
    echo "Het record is verwijderd";
    header('Refresh:3; url=read.php');
} else {
    echo "Het record is niet verwijderd";
    header('Refresh:3; url=read.php');
}
