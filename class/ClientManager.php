<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 06/04/2018
 * Time: 11:57
 */

class ClientManager
{
    private $db;

    public function __construct($mode = 'prod') {
        if($mode == 'dev'){ // permet de choisir si l'on veut inclure ou pas la gestion des erreurs
            $this->db = new PDO('mysql:host=localhost;dbname=expensemanager;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } else {
            $this->db = new PDO('mysql:host=localhost;dbname=expensemanager;charset=utf8', 'root', '');
        }
    }

    public function listClient(){
        $listClient = [];
        $sql = 'SELECT * FROM client';
        $return = $this->db->query($sql);
        while ($ligne = $return->fetch()){
            $client = new Log($ligne);
            $listClient[] = $client;
        }
        return json_encode($listClient);
    }
    public function readOneClient($nomClient){
        $sql = 'SELECT * FROM client WHERE client.Nom_client = :nom';
        $req = $this->db->prepare($sql);
        $req->bindValue(':nom', $nomClient, PDO::PARAM_STR);
        $req->execute();
        $result = $req->fetch();
        $newClient = new Client($result);
        return json_encode($newClient);
    }
    public function addClient(Client $client){
        $sql = 'INSERT INTO client (Nom_client, Prenom_client, Adresse_client, Ville_client, Telephone_client, Mail_client) VALUES (:nom, :prenom, :adresse, :ville, :tel, :mail)';
        $req = $this->db->prepare($sql);
        $req->bindValue(':nom', $client->getNom_client(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $client->getPrenom_client(), PDO::PARAM_STR);
        $req->bindValue(':adresse', $client->getAdresse_client(), PDO::PARAM_STR);
        $req->bindValue(':ville', $client->getVille_client(), PDO::PARAM_STR);
        $req->bindValue(':tel', $client->getTelephone_client(), PDO::PARAM_STR);
        $req->bindValue(':mail', $client->getMail_client(), PDO::PARAM_STR);
        $req->execute();
    }
    public function update(Client $client){
        $sql = 'UPDATE client SET Nom_client = :nom, Prenom_client = :prenom, Adresse_client = :adresse, Ville_client = :ville, Telephone_client = :tel, Mail_client = :mail WHERE perso.ID = :id';
        $req = $this->db->prepare($sql);
        $req->bindValue(':nom', $client->getNom_client(), PDO::PARAM_STR);
        $req->bindValue(':prenom', $client->getPrenom_client(), PDO::PARAM_STR);
        $req->bindValue(':adresse', $client->getAdresse_client(), PDO::PARAM_STR);
        $req->bindValue(':ville', $client->getVille_client(), PDO::PARAM_STR);
        $req->bindValue(':tel', $client->getTelephone_client(), PDO::PARAM_STR);
        $req->bindValue(':mail', $client->getMail_client(), PDO::PARAM_STR);
        $req->execute();
    }
    public function delete(Client $client){
        $sql = 'DELETE FROM client WHERE client.Code_client = :code';
        $req = $this->db->prepare($sql);
        $req->bindValue(':code', $client->getCode_client(), PDO::PARAM_INT);
        $req->execute();
    }
}