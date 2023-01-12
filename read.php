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
$sql = "SELECT * FROM RichestPeople
ORDER BY Networth desc";

$statement = $pdo->prepare($sql); 

$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);
//ff checken
//var_dump($result);


$rows = "";
foreach ($result as $info) {
    $rows .= "<tr>
                <td>$info->Name</td>
                <td>$info->Networth</td>
                <td>$info->Age</td>
                <td>$info->MyCompany</td>
                <tr>      
     ";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <br>
    <br>
    <table border='1'>
    <thead>
        <th>Naam</th>
        <th>Vermogen</th>
        <th>Leeftijd</th>
        <th>Bedrijf</th>
    <t/head>
    <tbody>
        <?= $rows ?>
        </tbody>
    </table> 
</body>
</html>






