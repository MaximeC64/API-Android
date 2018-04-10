<?php
require_once(autoload.php);

function __autoload($toto){ // va automatiquement ajouter un require à chaque création d'un objet de classe
    $dir = ("class/".$toto.".php");
    if (file_exists($dir)){
        require_once($dir);
    } else {
        if (file_exists('model.txt')){
            $handle = fopen("C:\wamp64\www\Projets\PHP-POO\autoload\class\\".$toto.".php", "a+");
            $model = file_get_contents('class\model.txt');
            $modif = adaptModel($toto, $model);
            fputs($handle,$modif);
            fclose($handle);
            require_once($dir);
        }
    }
}
function adaptModel($toto, $model){
    $modif = ['{{NomClasse}}'=>$toto];
    return strtr($model,$modif);
}

