<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 06/04/2018
 * Time: 11:47
 */

class Client
{
    private $Code_client;
    private $Nom_client;
    private $Prenom_client;
    private $Adresse_client;
    private $Ville_client;
    private $Telephone_client;
    private $Mail_client;

    public function __construct($values)
    {
        $this->hydrate($values);
    }

    public function getCode_client()
    {
        return $this->Code_client;
    }
    public function setCode_client($Code_client)
    {
        $this->Code_client = intval($Code_client);
    }
    public function getNom_client()
    {
        return $this->Nom_client;
    }
    public function setNom_client($Nom_client)
    {
        $this->Nom_client = $Nom_client;
    }
    public function getPrenom_client()
    {
        return $this->Prenom_client;
    }
    public function setPrenom_client($Prenom_client)
    {
        $this->Prenom_client = $Prenom_client;
    }
    public function getAdresse_client()
    {
        return $this->Adresse_client;
    }
    public function setAdresse_client($Adresse_client)
    {
        $this->Adresse_client = $Adresse_client;
    }
    public function getVille_client()
    {
        return $this->Ville_client;
    }
    public function setVille_client($Ville_client)
    {
        $this->Ville_client = $Ville_client;
    }
    public function getTelephone_client()
    {
        return $this->Telephone_client;
    }
    public function setTelephone_client($Telephone_client)
    {
        $this->Telephone_client = $Telephone_client;
    }
    public function getMail_client()
    {
        return $this->Mail_client;
    }
    public function setMail_client($Mail_client)
    {
        $this->Mail_client = $Mail_client;
    }

    public function hydrate($array){
        if (is_array($array)){
            foreach($array as $key => $value){
                $methodName = 'set'.ucfirst($key);
                if (method_exists($this, $methodName)){
                    $this->$methodName($value);
                } else {
                    // echo "La méthode $methodName n'existe pas !";
                }
            }
        }
    }
}