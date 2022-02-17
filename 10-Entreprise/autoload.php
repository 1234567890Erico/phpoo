<?php

class Autoload
{
    public static function inclusionAuto($className)
    {                // $className = controller\Controller
                     // "C:\xampp\htdocs\phpoo\10-Entreprise . /controller/Controller.php"
        require_once __DIR__ . '/' . str_replace('\\', '/', $className) . '.php';
    }                                 //  controller/Controller            
        
}

spl_autoload_register(array('Autoload', 'inclusionAuto'));
/*
    spl_autoload_register() : fonction prédéfinie qui s'exécute lorsque l'interpréteur voit passer le mot clé "new"
    Lorsque l'on instancie une classe, la méthode 'inclusionAuto' de la classe 'Autoload' s'exécute automatiquement et tout ce qu'il ya après le mot clé "new" (namespace\class) est envoyé directement en argument de la méthode "inclusionAuto".
    On se sert du namespace 'controller' pour entrer dans le dossier "controller" du dossier "Entreprise" et du nom de la class 'Controller' pour inclure le fichier 
    Il faut bien respecter une convention de nommage pour les dossiers et les fichiers
*/


// TEST

// $c = new controller\Controller;

// echo __FILE__ . '<br>';
// echo __DIR__;