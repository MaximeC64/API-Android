<?php

header('Content-Type: application/json');

try{
    $db = new PDO('mysql:host=localhost;dbname=expensemanager;charset=utf8', 'root', '');
    $retour["sucess"] = true;
    $retour["message"] = "Connecté à la base de données";
}catch (Exception $e){
    $retour["sucess"] = false;
    $retour["message"] = "Connexion à la base de données impossible";
}

$sql = "SELECT * FROM utilisateur";
$req = $db->query($sql);
$retour["utilisateur"] = $req->fetchAll();

echo json_encode($retour);