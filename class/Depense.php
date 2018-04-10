<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 09/04/2018
 * Time: 09:07
 */

class Depense
{
    private $Code_depense;
    private $DatePaiement;
    private $MontantRemboursement;
    private $EtatValidation;
    private $DateValidation;
    private $Code_frais;
    private $ID_Utilisateur;

    public function __construct($values)
    {
        $this->hydrate($values);
    }

    public function getCode_depense()
    {
        return $this->Code_depense;
    }
    public function setCode_depense($Code_depense)
    {
        $this->Code_depense = $Code_depense;
    }
    public function getDatePaiement()
    {
        return $this->DatePaiement;
    }
    public function setDatePaiement($DatePaiement)
    {
        $this->DatePaiement = $DatePaiement;
    }
    public function getMontantRemboursement()
    {
        return $this->MontantRemboursement;
    }
    public function setMontantRemboursement($MontantRemboursement)
    {
        $this->MontantRemboursement = $MontantRemboursement;
    }
    public function getEtatValidation()
    {
        return $this->EtatValidation;
    }
    public function setEtatValidation($EtatValidation)
    {
        $this->EtatValidation = $EtatValidation;
    }
    public function getDateValidation()
    {
        return $this->DateValidation;
    }
    public function setDateValidation($DateValidation)
    {
        $this->DateValidation = $DateValidation;
    }
    public function getCode_frais()
    {
        return $this->Code_frais;
    }
    public function setCode_frais($Code_frais)
    {
        $this->Code_frais = $Code_frais;
    }
    public function getID_Utilisateur()
    {
        return $this->ID_Utilisateur;
    }
    public function setID_Utilisateur($ID_Utilisateur)
    {
        $this->ID_Utilisateur = $ID_Utilisateur;
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