<?php
/**
 * Created by PhpStorm.
 * User: utilisateur
 * Date: 09/04/2018
 * Time: 09:07
 */

class DepenseManager
{
    private $db;

    public function __construct($mode = 'prod') {
        if($mode == 'dev'){ // permet de choisir si l'on veut inclure ou pas la gestion des erreurs
            $this->db = new PDO('mysql:host=localhost;dbname=expensemanager;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        } else {
            $this->db = new PDO('mysql:host=localhost;dbname=expensemanager;charset=utf8', 'root', '');
        }
    }

    public function listDepense(){
        $listDepense = [];
        $sql = 'SELECT * FROM depense';
        $return = $this->db->query($sql);
        while ($ligne = $return->fetch()){
            $depense = new Log($ligne);
            $listDepense[] = $depense;
        }
        return json_encode($listDepense);
    }

}